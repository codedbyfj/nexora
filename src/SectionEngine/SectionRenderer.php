<?php

namespace CodedByFJ\Nexora\SectionEngine;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SectionRenderer
{
    public function render(array $layout): string
    {
        $html = '';

        foreach ($layout as $sectionData) {
            $type = $sectionData['type'] ?? null;
            $data = $sectionData['data'] ?? [];

            if (!$type) continue;

            $html .= $this->renderSection($type, $data);
        }

        return $html;
    }

    public function renderSection(string $type, array $data): string
    {
        $cacheKey = $this->getCacheKey($type, $data);

        if (config('nexora.cache.enabled')) {
            return Cache::remember($cacheKey, config('nexora.cache.ttl'), function () use ($type, $data) {
                return $this->doRender($type, $data);
            });
        }

        return $this->doRender($type, $data);
    }

    protected function doRender(string $type, array $data): string
    {
        $section = SectionRegistry::getSection($type);

        if ($section) {
            try {
                return $section->render($data);
            } catch (\Exception $e) {
                Log::error("Nexora Section Render Error ($type): " . $e->getMessage());
                return '';
            }
        }

        return '';
    }

    protected function getCacheKey(string $type, array $data): string
    {
        return 'nexora_section_' . $type . '_' . md5(json_encode($data) . core()->getCurrentChannel()->code . core()->getCurrentLocale()->code);
    }
}

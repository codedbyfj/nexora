<?php

namespace Webkul\BagistoNova\SectionEngine;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SectionRenderer
{
    /**
     * Render layout from JSON.
     */
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

    /**
     * Render a single section with caching.
     */
    public function renderSection(string $type, array $data): string
    {
        $cacheKey = $this->getCacheKey($type, $data);

        if (config('bagisto-nova.cache.enabled')) {
            return Cache::remember($cacheKey, config('bagisto-nova.cache.ttl'), function () use ($type, $data) {
                return $this->doRender($type, $data);
            });
        }

        return $this->doRender($type, $data);
    }

    /**
     * Execute actual rendering.
     */
    protected function doRender(string $type, array $data): string
    {
        $section = SectionRegistry::getSection($type);

        if ($section) {
            try {
                return $section->render($data);
            } catch (\Exception $e) {
                Log::error("Nova Section Render Error ($type): " . $e->getMessage());
                return '';
            }
        }

        return '';
    }

    /**
     * Generate cache key for section.
     */
    protected function getCacheKey(string $type, array $data): string
    {
        return 'nova_section_' . $type . '_' . md5(json_encode($data) . core()->getCurrentChannelCode() . core()->getCurrentLocaleCode());
    }
}

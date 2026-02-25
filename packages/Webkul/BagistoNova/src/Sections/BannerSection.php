<?php

namespace Webkul\BagistoNova\Sections;

use Webkul\BagistoNova\SectionEngine\SectionInterface;

class BannerSection implements SectionInterface
{
    public function schema(): array
    {
        return [
            'image_url' => ['type' => 'image', 'label' => 'Banner Image'],
            'link_url'  => ['type' => 'text', 'label' => 'Link URL'],
            'full_width' => ['type' => 'boolean', 'label' => 'Full Width', 'default' => false],
        ];
    }

    public function rules(): array
    {
        return [
            'image_url' => 'required|string',
        ];
    }

    public function render(array $data): string
    {
        return view('nova::sections.banner', compact('data'))->render();
    }
}

<?php

namespace CodedByFJ\Nexora\Sections;

use CodedByFJ\Nexora\SectionEngine\SectionInterface;

class HeroSection implements SectionInterface
{
    public function schema(): array
    {
        return [
            'title'       => ['type' => 'text', 'label' => 'Title'],
            'subtitle'    => ['type' => 'text', 'label' => 'Subtitle'],
            'button_text' => ['type' => 'text', 'label' => 'Button Text'],
            'button_url'  => ['type' => 'text', 'label' => 'Button URL'],
            'image_url'   => ['type' => 'image', 'label' => 'Background Image'],
        ];
    }

    public function rules(): array
    {
        return [
            'title'      => 'required|string',
            'image_url'  => 'required|string',
        ];
    }

    public function render(array $data): string
    {
        return view('nexora::sections.hero', compact('data'))->render();
    }
}

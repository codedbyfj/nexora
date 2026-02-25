<?php

namespace CodedByFJ\Nexora\Sections;

use CodedByFJ\Nexora\SectionEngine\SectionInterface;

class CustomHtmlSection implements SectionInterface
{
    public function schema(): array
    {
        return [
            'html' => ['type' => 'textarea', 'label' => 'Custom HTML'],
        ];
    }

    public function rules(): array
    {
        return [
            'html' => 'required|string',
        ];
    }

    public function render(array $data): string
    {
        return view('nexora::sections.custom-html', compact('data'))->render();
    }
}

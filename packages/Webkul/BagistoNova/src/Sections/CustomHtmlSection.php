<?php

namespace Webkul\BagistoNova\Sections;

use Webkul\BagistoNova\SectionEngine\SectionInterface;

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
        return view('nova::sections.custom-html', compact('data'))->render();
    }
}

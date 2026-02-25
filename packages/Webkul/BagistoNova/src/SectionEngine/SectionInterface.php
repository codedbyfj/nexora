<?php

namespace Webkul\BagistoNova\SectionEngine;

interface SectionInterface
{
    /**
     * Get section schema for admin builder.
     */
    public function schema(): array;

    /**
     * Get validation rules for section data.
     */
    public function rules(): array;

    /**
     * Render the section blade view.
     */
    public function render(array $data): string;
}

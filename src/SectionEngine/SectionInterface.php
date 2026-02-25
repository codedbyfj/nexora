<?php

namespace CodedByFJ\Nexora\SectionEngine;

interface SectionInterface
{
    public function schema(): array;
    public function rules(): array;
    public function render(array $data): string;
}

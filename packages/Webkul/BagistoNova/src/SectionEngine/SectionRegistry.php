<?php

namespace Webkul\BagistoNova\SectionEngine;

class SectionRegistry
{
    /**
     * Register sections from config.
     */
    public static function getSections(): array
    {
        return config('bagisto-nova.sections', []);
    }

    /**
     * Get a specific section instance by type.
     */
    public static function getSection(string $type): ?SectionInterface
    {
        $sections = self::getSections();

        if (isset($sections[$type])) {
            return app($sections[$type]);
        }

        return null;
    }
}

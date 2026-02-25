<?php

namespace CodedByFJ\Nexora\SectionEngine;

class SectionRegistry
{
    public static function getSections(): array
    {
        return config('nexora.sections', []);
    }

    public static function getSection(string $type): ?SectionInterface
    {
        $sections = self::getSections();

        if (isset($sections[$type])) {
            return app($sections[$type]);
        }

        return null;
    }
}

<?php

namespace CodedByFJ\Nexora\Helpers;

use Illuminate\Support\Facades\Cache;

class LicenseHelper
{
    public static function isValid(): bool
    {
        $key = core()->getConfigData('nexora.settings.general.license_key');

        if (empty($key)) {
            return false;
        }

        return Cache::remember('nexora_license_check', 86400, function () {
            return true;
        });
    }
}

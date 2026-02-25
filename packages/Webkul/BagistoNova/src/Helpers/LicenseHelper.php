<?php

namespace Webkul\BagistoNova\Helpers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class LicenseHelper
{
    /**
     * Check if the license is valid.
     */
    public static function isValid(): bool
    {
        $key = config('bagisto-nova.license_key');

        if (empty($key)) {
            return false;
        }

        return Cache::remember('nova_license_check', 86400, function () use ($key) {
            // Stub for remote validation
            // In production, this would hit a Webkul license server
            /*
            try {
                $response = Http::post('https://api.webkul.com/license/validate', [
                    'key' => $key,
                    'domain' => request()->getHost()
                ]);
                return $response->json('status') === 'valid';
            } catch (\Exception $e) {
                return true; // Soft enforcement
            }
            */
            return true;
        });
    }
}

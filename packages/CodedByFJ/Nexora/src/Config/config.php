<?php

return [
    'license_key' => env('NEXORA_LICENSE_KEY', ''),

    'cache' => [
        'enabled' => true,
        'ttl'     => 86400, // 24 hours
    ],

    'sections' => [
        'hero'              => \CodedByFJ\Nexora\Sections\HeroSection::class,
        'banner'            => \CodedByFJ\Nexora\Sections\BannerSection::class,
        'featured-products' => \CodedByFJ\Nexora\Sections\FeaturedProductsSection::class,
        'category-grid'     => \CodedByFJ\Nexora\Sections\CategoryGridSection::class,
        'custom-html'       => \CodedByFJ\Nexora\Sections\CustomHtmlSection::class,
    ]
];

<?php

return [
    'license_key' => env('BAGISTO_NOVA_LICENSE_KEY', ''),

    'cache' => [
        'enabled' => true,
        'ttl'     => 86400, // 24 hours
    ],

    'sections' => [
        'hero'              => \Webkul\BagistoNova\Sections\HeroSection::class,
        'banner'            => \Webkul\BagistoNova\Sections\BannerSection::class,
        'featured-products' => \Webkul\BagistoNova\Sections\FeaturedProductsSection::class,
        'category-grid'     => \Webkul\BagistoNova\Sections\CategoryGridSection::class,
        'custom-html'       => \Webkul\BagistoNova\Sections\CustomHtmlSection::class,
    ]
];

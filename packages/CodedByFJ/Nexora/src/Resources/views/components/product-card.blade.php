@props(['product'])

@php
    $productViewHelper = app('Webkul\Product\Helpers\View');
    $images = $productViewHelper->getGalleryImages($product);
@endphp

<div
    class="group relative bg-white rounded-xl overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
    <div class="aspect-square overflow-hidden bg-gray-100">
        <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
            <img src="{{ $images[0]['medium_image_url'] ?? asset('vendor/webkul/ui/assets/images/product/meduim-product-placeholder.png') }}"
                alt="{{ $product->name }}"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        </a>
    </div>

    <div class="p-4">
        <h3 class="text-sm font-medium text-gray-700">
            <a href="{{ route('shop.productOrCategory.index', $product->url_key) }}">
                <span aria-hidden="true" class="absolute inset-0"></span>
                {{ $product->name }}
            </a>
        </h3>

        <div class="mt-2 flex items-center justify-between">
            <p class="text-lg font-bold text-gray-900">
                {!! $product->getTypeInstance()->getPriceHtml() !!}
            </p>
        </div>
    </div>
</div>

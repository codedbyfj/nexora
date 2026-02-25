<section class="py-16 bg-white">
    <x-nexora::container>
        <div class="flex items-center justify-between mb-10">
            <x-nexora::heading level="2">
                {{ $data['title'] }}
            </x-nexora::heading>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <x-nexora::product-card :product="$product" />
            @endforeach
        </div>
    </x-nexora::container>
</section>

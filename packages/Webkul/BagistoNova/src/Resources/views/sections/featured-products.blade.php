<section class="py-16 bg-white">
    <x-nova::container>
        <div class="flex items-center justify-between mb-10">
            <x-nova::heading level="2">
                {{ $data['title'] }}
            </x-nova::heading>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <x-nova::product-card :product="$product" />
            @endforeach
        </div>
    </x-nova::container>
</section>

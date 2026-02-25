<section class="py-16 bg-gray-50">
    <x-nexora::container>
        <div class="mb-10 text-center">
            <x-nexora::heading level="2" align="center">
                {{ $data['title'] }}
            </x-nexora::heading>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categories as $category)
                <a href="{{ route('shop.productOrCategory.index', $category->slug) }}"
                    class="group block relative rounded-2xl overflow-hidden aspect-[4/5] bg-white shadow-sm hover:shadow-xl transition-all duration-300">
                    @if ($category->image_url)
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @endif
                    <div class="absolute inset-x-0 bottom-0 p-6 bg-gradient-to-t from-black/80 to-transparent">
                        <h3 class="text-xl font-bold text-white mb-1">{{ $category->name }}</h3>
                        <p
                            class="text-sm text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            Explore Collection →</p>
                    </div>
                </a>
            @endforeach
        </div>
    </x-nexora::container>
</section>

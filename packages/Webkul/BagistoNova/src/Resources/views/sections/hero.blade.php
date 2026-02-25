<section class="relative h-[500px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ $data['image_url'] }}" alt="{{ $data['title'] }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <x-nova::container class="relative z-10">
        <div class="max-w-2xl text-white">
            <h1 class="text-5xl font-extrabold mb-4 animate-fade-in-up">
                {{ $data['title'] }}
            </h1>

            @if (isset($data['subtitle']))
                <p class="text-xl text-gray-200 mb-8 animate-fade-in-up animation-delay-200">
                    {{ $data['subtitle'] }}
                </p>
            @endif

            @if (isset($data['button_text']) && isset($data['button_url']))
                <x-nova::button href="{{ $data['button_url'] }}" size="lg"
                    class="animate-fade-in-up animation-delay-400">
                    {{ $data['button_text'] }}
                </x-nova::button>
            @endif
        </div>
    </x-nova::container>
</section>

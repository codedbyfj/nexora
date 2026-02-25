<section class="py-10">
    <div @class([
        'mx-auto' => !$data['full_width'],
        'px-4 sm:px-6 lg:px-8' => !$data['full_width'],
        'max-w-7xl' => !$data['full_width'],
    ])>
        <a href="{{ $data['link_url'] ?? '#' }}"
            class="block overflow-hidden rounded-2xl shadow-lg transition-transform duration-300 hover:scale-[1.01]">
            <img src="{{ $data['image_url'] }}" alt="Banner" class="w-full h-auto object-cover">
        </a>
    </div>
</section>

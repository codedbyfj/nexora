<?php

namespace CodedByFJ\Nexora\Database\Seeders;

use Illuminate\Database\Seeder;

class NexoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel = app(\Webkul\Core\Repositories\ChannelRepository::class)->findOneByField('code', core()->getCurrentChannel()->code ?: 'default');
        $locales = app(\Webkul\Core\Repositories\LocaleRepository::class)->all();

        foreach ($locales as $locale) {
            app(\CodedByFJ\Nexora\Repositories\PageLayoutRepository::class)->updateOrCreate([
                'page_slug'  => 'home',
                'channel_id' => $channel->id,
                'locale'     => $locale->code,
            ], [
                'layout_json' => [
                    [
                        'id'   => time(),
                        'type' => 'hero',
                        'data' => [
                            'title'       => 'Experience Pure Elegance',
                            'subtitle'    => 'Discover our curated collection of artisan-crafted essentials.',
                            'button_text' => 'Shop Collection',
                            'button_url'  => '/category/new-arrivals',
                            'image_url'   => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&q=80&w=2000',
                        ]
                    ],
                    [
                        'id'   => time() + 1,
                        'type' => 'featured-products',
                        'data' => [
                            'title' => 'Best Sellers',
                            'count' => 4,
                        ]
                    ]
                ],
                'is_active' => true,
            ]);
        }
    }
}

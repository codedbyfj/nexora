<?php

namespace Webkul\BagistoNova\Http\Controllers\Shop;

use Illuminate\Routing\Controller;
use Webkul\BagistoNova\Repositories\PageLayoutRepository;
use Webkul\BagistoNova\SectionEngine\SectionRenderer;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    public function __construct(
        protected PageLayoutRepository $pageLayoutRepository,
        protected SectionRenderer $sectionRenderer
    ) {}

    /**
     * Render the dynamic homepage.
     */
    public function index()
    {
        $channelCode = core()->getCurrentChannelCode();
        $localeCode = core()->getCurrentLocaleCode();
        $cacheKey = "nova_page_home_{$channelCode}_{$localeCode}";

        $html = Cache::remember($cacheKey, config('bagisto-nova.cache.ttl'), function () use ($localeCode) {
            $layout = $this->pageLayoutRepository->findOneWhere([
                'page_slug'  => 'home',
                'channel_id' => core()->getCurrentChannel()->id,
                'locale'     => $localeCode,
                'is_active'  => 1,
            ]);

            if (!$layout) {
                return null;
            }

            return $this->sectionRenderer->render($layout->layout_json);
        });

        if (!$html) {
            // Fallback to default Bagisto homepage if no Nova layout exists
            return view('shop::home.index');
        }

        return view('nova::shop.home', ['html' => $html]);
    }
}

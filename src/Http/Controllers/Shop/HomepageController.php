<?php

namespace CodedByFJ\Nexora\Http\Controllers\Shop;

use Illuminate\Routing\Controller;
use CodedByFJ\Nexora\Repositories\PageLayoutRepository;
use CodedByFJ\Nexora\SectionEngine\SectionRenderer;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    public function __construct(
        protected PageLayoutRepository $pageLayoutRepository,
        protected SectionRenderer $sectionRenderer
    ) {}

    public function index()
    {
        $channelCode = core()->getCurrentChannel()->code;
        $localeCode = core()->getCurrentLocale()->code;
        $cacheKey = "nexora_page_home_{$channelCode}_{$localeCode}";

        $html = Cache::remember($cacheKey, config('nexora.cache.ttl'), function () use ($localeCode) {
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
            return view('shop::home.index');
        }

        return view('nexora::shop.home', ['html' => $html]);
    }
}

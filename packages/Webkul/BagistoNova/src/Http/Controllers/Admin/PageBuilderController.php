<?php

namespace Webkul\BagistoNova\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Webkul\BagistoNova\Http\Requests\PageLayoutRequest;
use Illuminate\Routing\Controller;
use Webkul\BagistoNova\Repositories\PageLayoutRepository;
use Webkul\BagistoNova\SectionEngine\SectionRegistry;
use Illuminate\Support\Facades\Cache;

class PageBuilderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\BagistoNova\Repositories\PageLayoutRepository  $pageLayoutRepository
     * @return void
     */
    public function __construct(
        protected PageLayoutRepository $pageLayoutRepository
    ) {}

    /**
     * Display the builder interface.
     */
    public function index($page_slug = 'home')
    {
        $layout = $this->pageLayoutRepository->findOneWhere([
            'page_slug'  => $page_slug,
            'channel_id' => core()->getCurrentChannel()->id,
            'locale'     => core()->getCurrentLocaleCode(),
        ]);

        return view('nova::admin.builder', [
            'layout'    => $layout,
            'page_slug' => $page_slug,
        ]);
    }

    /**
     * Save the layout data.
     */
    public function save(PageLayoutRequest $request)
    {
        $layout = $this->pageLayoutRepository->updateOrCreate([
            'page_slug'  => $request->page_slug,
            'channel_id' => core()->getCurrentChannel()->id,
            'locale'     => core()->getCurrentLocaleCode(),
        ], [
            'layout_json' => $request->layout_json,
            'is_active'   => true,
        ]);

        // Invalidate cache
        Cache::forget("nova_page_{$request->page_slug}_" . core()->getCurrentChannelCode() . "_" . core()->getCurrentLocaleCode());

        return response()->json([
            'message' => 'Layout saved successfully.',
            'layout'  => $layout
        ]);
    }

    /**
     * Get available section schemas for the builder.
     */
    public function getSchema()
    {
        $schemas = [];
        foreach (SectionRegistry::getSections() as $type => $class) {
            $section = app($class);
            $schemas[$type] = [
                'type'   => $type,
                'schema' => $section->schema(),
            ];
        }

        return response()->json($schemas);
    }
}

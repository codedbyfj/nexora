<?php

namespace CodedByFJ\Nexora\Http\Controllers\Admin;

use Illuminate\Http\Request;
use CodedByFJ\Nexora\Http\Requests\PageLayoutRequest;
use Illuminate\Routing\Controller;
use CodedByFJ\Nexora\Repositories\PageLayoutRepository;
use CodedByFJ\Nexora\SectionEngine\SectionRegistry;
use Illuminate\Support\Facades\Cache;

class PageBuilderController extends Controller
{
    public function __construct(
        protected PageLayoutRepository $pageLayoutRepository
    ) {}

    public function index($page_slug = 'home')
    {
        $layout = $this->pageLayoutRepository->findOneWhere([
            'page_slug'  => $page_slug,
            'channel_id' => core()->getCurrentChannel()->id,
            'locale'     => core()->getCurrentLocaleCode(),
        ]);

        return view('nexora::admin.builder', [
            'layout'    => $layout,
            'page_slug' => $page_slug,
        ]);
    }

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

        Cache::forget("nexora_page_{$request->page_slug}_" . core()->getCurrentChannelCode() . "_" . core()->getCurrentLocaleCode());

        return response()->json([
            'message' => 'Layout saved successfully.',
            'layout'  => $layout
        ]);
    }

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

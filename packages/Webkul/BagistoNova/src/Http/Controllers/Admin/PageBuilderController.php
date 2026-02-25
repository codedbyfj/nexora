<?php

namespace Webkul\BagistoNova\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Webkul\BagistoNova\Models\PageLayout;
use Webkul\BagistoNova\SectionEngine\SectionRegistry;
use Illuminate\Support\Facades\Cache;

class PageBuilderController extends Controller
{
    /**
     * Display the builder interface.
     */
    public function index($page_slug = 'home')
    {
        $layout = PageLayout::where('page_slug', $page_slug)
            ->where('channel_id', core()->getCurrentChannel()->id)
            ->where('locale', core()->getCurrentLocaleCode())
            ->first();

        return view('nova::admin.builder', [
            'layout'    => $layout,
            'page_slug' => $page_slug,
        ]);
    }

    /**
     * Save the layout data.
     */
    public function save(Request $request)
    {
        $request->validate([
            'page_slug'   => 'required|string',
            'layout_json' => 'required|array',
        ]);

        $layout = PageLayout::updateOrCreate([
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

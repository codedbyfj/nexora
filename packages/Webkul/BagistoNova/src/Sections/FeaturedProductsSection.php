<?php

namespace Webkul\BagistoNova\Sections;

use Webkul\BagistoNova\SectionEngine\SectionInterface;
use Webkul\Product\Repositories\ProductRepository;

class FeaturedProductsSection implements SectionInterface
{
    public function __construct(
        protected ProductRepository $productRepository
    ) {}

    public function schema(): array
    {
        return [
            'title' => ['type' => 'text', 'label' => 'Section Title'],
            'limit' => ['type' => 'number', 'label' => 'Product Limit', 'default' => 4],
        ];
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'limit' => 'nullable|integer|min:1|max:12',
        ];
    }

    public function render(array $data): string
    {
        $limit = $data['limit'] ?? 4;

        $products = $this->productRepository->scopeQuery(function ($query) {
            return $query->where('featured', 1);
        })->limit($limit)->get();

        return view('nova::sections.featured-products', [
            'data'     => $data,
            'products' => $products
        ])->render();
    }
}

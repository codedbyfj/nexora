<?php

namespace CodedByFJ\Nexora\Sections;

use CodedByFJ\Nexora\SectionEngine\SectionInterface;
use Webkul\Category\Repositories\CategoryRepository;

class CategoryGridSection implements SectionInterface
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}

    public function schema(): array
    {
        return [
            'title'        => ['type' => 'text', 'label' => 'Section Title'],
            'category_ids' => ['type' => 'text', 'label' => 'Category IDs (comma separated)'],
        ];
    }

    public function rules(): array
    {
        return [
            'title'        => 'required|string',
            'category_ids' => 'required|string',
        ];
    }

    public function render(array $data): string
    {
        $ids = array_map('trim', explode(',', $data['category_ids']));
        $categories = $this->categoryRepository->findWhereIn('id', $ids);

        return view('nexora::sections.category-grid', [
            'data'       => $data,
            'categories' => $categories
        ])->render();
    }
}

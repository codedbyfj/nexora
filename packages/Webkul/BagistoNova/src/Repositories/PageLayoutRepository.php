<?php

namespace Webkul\BagistoNova\Repositories;

use Webkul\Core\Eloquent\Repository;

class PageLayoutRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return 'Webkul\BagistoNova\Contracts\PageLayout';
    }
}

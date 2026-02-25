<?php

namespace CodedByFJ\Nexora\Repositories;

use Webkul\Core\Eloquent\Repository;

class PageLayoutRepository extends Repository
{
    public function model(): string
    {
        return 'CodedByFJ\Nexora\Contracts\PageLayout';
    }
}

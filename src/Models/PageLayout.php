<?php

namespace CodedByFJ\Nexora\Models;

use Illuminate\Database\Eloquent\Model;
use CodedByFJ\Nexora\Contracts\PageLayout as PageLayoutContract;

class PageLayout extends Model implements PageLayoutContract
{
    protected $table = 'page_layouts';

    protected $fillable = [
        'channel_id',
        'locale',
        'page_slug',
        'layout_json',
        'is_active',
    ];

    protected $casts = [
        'layout_json' => 'array',
        'is_active'   => 'boolean',
    ];
}

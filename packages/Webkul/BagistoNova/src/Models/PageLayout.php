<?php

namespace Webkul\BagistoNova\Models;

use Illuminate\Database\Eloquent\Model;

class PageLayout extends Model
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

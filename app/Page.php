<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_name', 'page_sort_order', 'page_keywords', 'page_description', 'page_url',
    ];
}

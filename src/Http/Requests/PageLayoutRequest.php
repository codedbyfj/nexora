<?php

namespace CodedByFJ\Nexora\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageLayoutRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'page_slug'   => 'required|string',
            'layout_json' => 'required|array',
        ];
    }
}

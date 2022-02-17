<?php

namespace App\Http\Requests\News;


use App\Http\Requests\AbstractFormRequest;

class IndexRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'page' => 'integer',
            'count' => 'integer',
        ];
    }
}

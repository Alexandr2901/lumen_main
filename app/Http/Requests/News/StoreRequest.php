<?php

namespace App\Http\Requests\News;


use App\Http\Requests\AbstractFormRequest;

class StoreRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required|int',
            'tags.*' => 'string',
            'users.*' => 'int',
        ];
    }

}

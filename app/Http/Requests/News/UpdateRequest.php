<?php

namespace App\Http\Requests\News;


use App\Http\Requests\AbstractFormRequest;

class UpdateRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'title' => 'string',
            'text' => 'string',
            'category_id' => 'int',
            'tags.*' => 'string',
            'users.*' => 'int',
        ];
    }

}

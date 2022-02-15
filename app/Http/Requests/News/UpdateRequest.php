<?php

namespace App\Http\Requests\News;


use App\Http\Controllers\Controller;
use App\Http\Requests\AbstractFormRequest;
use Illuminate\Http\Request;

class UpdateRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'title'=>'string',
            'text'=>'string',
            'category_id'=>'int',
            'tags.*'=>'string',
            'users.*'=>'int',
        ];
    }

}

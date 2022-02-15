<?php

namespace App\Http\Requests\News;


use App\Http\Controllers\Controller;
use App\Http\Requests\AbstractFormRequest;
use Illuminate\Http\Request;

class StoreRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'title'=>'required|string',
            'text'=>'required|string',
            'category_id'=>'required|int',
            'tags.*'=>'string',
            'users.*'=>'int',
            ];
    }

}

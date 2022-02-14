<?php

namespace App\Http\Requests\News;


use App\Http\Controllers\Controller;
use App\Http\Requests\AbstractFormRequest;
use Illuminate\Http\Request;

class StoreRequest extends AbstractFormRequest
{
//    public function __construct(Request $request)
//    {
//        $this->validate(
//            $request, [
////                'name' => 'required',
////                'email' => 'required|email|unique:users',
////                'password' => 'required|min:5',
//                'title'=>'required|string',
//                'text'=>'required|string',
//                'category_id'=>'required|int',
//                'tags.'=>'string',
//            ]
//        );
//
//        parent::__construct($request);
//    }

    public function rules()
    {
        return [
            'title'=>'required|string',
            'text'=>'required|string',
            'category_id'=>'required|int',
            'tags.*'=>'string',
            ];
    }

}

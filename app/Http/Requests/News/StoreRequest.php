<?php

namespace App\Http\Requests\News;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request, [
//                'name' => 'required',
//                'email' => 'required|email|unique:users',
//                'password' => 'required|min:5',
                'name'=>'required|string',
                'text'=>'required|string',
                'tags.'=>'string'
            ]
        );

        parent::__construct($request);
    }
}

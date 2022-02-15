<?php

namespace App\Http\Resources;

use App\Http\Resources\Min\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'tags' => TagResource::collection($this->tags),
            'users' => UserResource::collection($this->users),
            'category' => $this->category->name,
        ];
    }
}

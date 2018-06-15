<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CinemaResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'address'=>$this->address,
            'long'=>$this->long,
            'lat'=>$this->lat


        ];
        //return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http:troll.com.au')

        ];

    }
}

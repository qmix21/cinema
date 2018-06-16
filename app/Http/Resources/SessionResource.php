<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Movies;
use App\Cinemas;
use App\SessionTimes;

class SessionResource extends JsonResource
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
                'Movie_Name'=>Movies::find($this->movie_id)->title,
                'Cinema_Name'=>Cinemas::find($this->cinema_id)->name,
                'Time'=>$this->time,
                'Date'=>$this->date


        ];


        //return parent::toArray($request);
    }
}

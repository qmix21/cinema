<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinemas extends Model
{
    protected $fillable = ['name','address','long','lat'];
    
    public function getTimeAttribute($value)
{
    $time = Carbon::createFromFormat('H:i:s', $value);

    return $time->format('H:i');
}
}

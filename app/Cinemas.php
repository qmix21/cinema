<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinemas extends Model
{
    protected $fillable = ['name','address','long','lat'];
}

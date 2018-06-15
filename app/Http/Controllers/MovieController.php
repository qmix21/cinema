<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    
      public function index()
    {
    	//get cinemas
    	$movies = Movies::paginate(15);
    	return MovieResource::collection($movies);
    }

    //Get Cinema Data which is the same as $id
    public function show($id)
    {
    	$movie = Movies::findOrFail($id);
    	return new MovieResource($movie);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;
use App\Http\Resources\MovieResource;
use App\Http\Resources\SessionResource;
use App\SessionTimes;

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
    if(is_numeric($id))
        {
            $movie = Movies::find($id);

        }
        else
        {
            $column = "title";
            $movie = Movies::where($column,'=',$id)->first();
        }
        return $movie;
    }

    public function store(Request $request)
    {
        return Movies::create($request->all());
    }

    public function sessions($name)
    {
        $movieID = Movies::where('title','=',$name)->first()->id;
        $sessions = SessionTimes::where('movie_id','=',$movieID)->get();
        return SessionResource::collection($sessions);
        //$cinemas = Cinemas::where(,'=',$id)->first();

    }
}

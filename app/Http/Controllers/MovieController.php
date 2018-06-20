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
        try
        {
            if(is_numeric($id))
             {
                $movie = Movies::findOrFail($id);
                return new MovieResource($movie);

             }
            else
            {
                $column = "title";
                $movie = Movies::where($column,'=',$id)->first();
                if($movie)
                {
                    return new MovieResource($movie);

                }
                else
                {
                    return ['Errors'=>'Movie Does Not Exist'];
                }
            }

            
        }
        catch(Exception $e)
        {
            return $e;
        }
    }

    public function store(Request $request)
    {
        return Movies::create($request->all());
    }

    public function sessions($name)
    {
        if(Movies::where('title','=',$name)->first())
        {
        $movieID = Movies::where('title','=',$name)->first()->id;
        $sessions = SessionTimes::where('movie_id','=',$movieID)->get();
        return SessionResource::collection($sessions);
        }
        else
        {
            return ["Errors"=>'Movie Does not Exist'];
        }
       
        //$cinemas = Cinemas::where(,'=',$id)->first();

    }
}

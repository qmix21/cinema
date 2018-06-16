<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cinemas;
use App\Http\Resources\CinemaResource;
use App\SessionTimes;
use App\Movies;
use App\Http\Resources\SessionResource;
class CinemaController extends Controller
{
    

    //Get everything in the Cinema Database
    public function index()
    {
    	//get cinemas
    	$cinemas = Cinemas::paginate(15);
    	return CinemaResource::collection($cinemas);
    }

    //Get Cinema Data which is the same as $id
    public function show($id)
    {
    	if(is_numeric($id))
    	{
    		$cinema = Cinemas::find($id);

    	}
    	else
    	{
    		$column = "name";
    		$cinema = Cinemas::where($column,'=',$id)->first();
    	}
    	return new CinemaResource($cinema);

    }

    //Deletes the requested cinema
    public function destroy($id)
    {
    	$cinema = Cinemas::findOrFail($id);
    	if($cinema->delete())
    	{
    		return new CinemaResource($cinema);

    	}
    }

      public function sessions($name)
    {
        $cinemaID = Cinemas::where('name','=',$name)->first()->id;
        $sessions = SessionTimes::where('cinema_id','=',$cinemaID)->get();
        return SessionResource::collection($sessions);
        //$cinemas = Cinemas::where(,'=',$id)->first();

    }

    public function movie($name,$movie)
    {
        $cinemaID = Cinemas::where('name','=',$name)->first()->id;
        $movieID = Movies::where('title','=',$movie)->first()->id;
        $cinemas = SessionTimes::where('cinema_id','=',$cinemaID)->get();
        $sessions = $cinemas->where('movie_id','=',$movieID);
        return SessionResource::collection($sessions);

    }

    public function sessionTime($name,$date)
    {
        $cinemaID = Cinemas::where('name','=',$name)->first()->id;
        $sessionTimes = SessionTimes::where('cinema_id','=',$cinemaID)->get();
        if(strpos($date, '-'))
        {
            $sessions = $sessionTimes->where('date','=',$date);

        }
        else
        {
            $sessions = $sessionTimes->where('time','=',$date);

        }
        return SessionResource::collection($sessions);


    }
}

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
    	$cinemas = Cinemas::paginate(10);
    	return CinemaResource::collection($cinemas);
    }

    //Get Cinema Data which is the same as $id
    public function show($id)
    {
    	if(is_numeric($id))
    	{
            if(Cinemas::where('id','=',$id)){
                $cinema = Cinemas::findOrFail($id);
            }
            else
            {
                $cinema = ['errors'=>'ID not found'];
            }
            return new $cinema;


    	}
    	else
    	{
    		$column = "name";
            $cinema = Cinemas::where($column,'=',$id)->first();
                if($cinema)
                {
                    return new CinemaResource($cinema);

                }
            else
            {
                $cinema = ['Errors'=>'Unable to find Cinema'];
                return $cinema;
            }
    	}

    }

    public function post(Request $request)
    {
        return Cinemas::create($request->all());
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
        if (Cinemas::where("name",'=',$name)->first())
        {
         $cinemaID = Cinemas::where('name','=',$name)->first()->id;
        $sessions = SessionTimes::where('cinema_id','=',$cinemaID)->get();
        return SessionResource::collection($sessions);
        }
        else
        {
            $session =['Errors'=>'No Such Cinema'];
            return $session;
        }
        
        //$cinemas = Cinemas::where(,'=',$id)->first();

    }

    public function movie($name,$movie)
    {
        try
        {
            if(Cinemas::where('name','=',$name)->first())
            {
                $cinemaID = Cinemas::where('name','=',$name)->first()->id;
                $cinemas = SessionTimes::where('cinema_id','=',$cinemaID)->get();

            }
            if(Movies::where('title','=',$movie)->first())
            {
                $movieID = Movies::where('title','=',$movie)->first()->id;
                $sessions = $cinemas->where('movie_id','=',$movieID);
                return SessionResource::collection($sessions);
            }
            else
            {
                return ['error'=>"Movie or Cinema Not Found"];
            }
        }
        catch(Exception $e)
        {
            return ['error'=>"Movie or Cinema not found"];
        }

    }

    public function sessionTime($name,$date)
    {
        if (Cinemas::where('name','=',$name)->first())
        {
            $cinemaID = Cinemas::where('name','=',$name)->first()->id;
        
            $sessionTimes = SessionTimes::where('cinema_id','=',$cinemaID)->get();
            if(strpos($date, '-'))
            {
                $sessions = $sessionTimes->where('date','=',$date);

            }
            elseif(strpos($date,':'))
            {
                $sessions = $sessionTimes->where('time','=',$date);

            }
            else
            {
                return ['error'=>'Format is incorrect, must be XX:XX:XX or YYYY-MM-DD'];

            }
            if($sessions)
            {
            return SessionResource::collection($sessions);
            }
            else
            {
                return ['error'=>'No Sessions under this date/time'];
            }
        }
        else
        {
            return ['error'=>'Cinema Not Found'];
        }

    }


    public function movieSession($cinema,$movie,$date)
    {
        if(Cinemas::where('name','=',$cinema)->first() || Movies::where('title','=',$movie)->first())
        {
            $cinemaID = Cinemas::where('name','=',$cinema)->first()->id;
            $movieID = Movies::where('title','=',$movie)->first()->id;
            $sessions = SessionTimes::where('cinema_id','=',$cinemaID)->get();
            $movies = $sessions->where('movie_id','=',$movieID);
        

           if(strpos($date, '-'))
            {
                $response = $movies->where('date','=',$date);
                return SessionResource::collection($response);
            }
            elseif(strpos($date,':'))
            {
                $response = $movies->where('time','=',$date);
                return SessionResource::collection($response);


            }
            else
            {
                return ['error'=>'Format is incorrect, must be XX:XX:XX or YYYY-MM-DD'];

            }
        }
        else
        {
            return ['error'=>'Cinema or Movie is incorreect or does not exists'];
        }
    }
}

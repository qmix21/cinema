<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionTimes;
use App\Cinemas;
use App\Movies;
use App\Http\Resources\SessionResource;
class SessionController extends Controller
{
    


    public function index()
    {
    	$session = SessionTimes::all();

    	//$m_id = $session->movie_id;
    	//$c_id = $session->cinema_id;
    	//$time = $session->time;
    	//$date = $session->date;
    	//$arr = ['movie_id'=>$m_id,'cinema_id' =>$c_id,'date'=>$date,'time'=>$time];
    	return SessionResource::collection($session);
    }

   public function show($id)
   {
   	$session = SessionTimes::findOrFail($id);
   	$m_name = Movies::find($session->movie_id)->title;
   	$c_name = Cinemas::find($session->cinema_id	)->name;
   	$date =$session->date;
   	$time = $session->time;
$arr = ['Movie Name'=>$m_name,'Cinema Name' =>$c_name,'date'=>$date,'time'=>$time];
   	return $arr;
   }
}

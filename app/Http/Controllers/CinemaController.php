<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cinemas;
use App\Http\Resources\CinemaResource;
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
}

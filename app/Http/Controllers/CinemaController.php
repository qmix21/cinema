<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cinemas;

class CinemaController extends Controller
{
    
    public function index()
    {
    	return Cinemas::all();
    }

    public function show($id)
    {
    	return Cinemas::find($id);

    }

    public function store(Request $request)
    {
    	$cinema = Cinemas::create($request=>all());
    	return response()->json($cinema,201);
    }

    public function update(Request $request, Cinemas $cinema)
    {
    	
    	$cinema->update($request->all());

    	return response()->json($cinema,200);
    }

    public function delete(Request $request,Cinemas $cinema)
    {
    	
    	$cinema->delete();


    	return response()->json(null,204);
    }
}

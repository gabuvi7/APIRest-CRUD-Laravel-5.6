<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "HOLA!!";

        $movies =  Movie::get();
        echo json_encode($movies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Esta funcion debe guardar los nuevos usuarios.
        //print_r($request->all()); //print_r puede tomar objetos completos.
        $movie = new Movie(); //Creo un nuevo objeto, para poder acceder a los param e insertarlos en la movie.
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->year = $request->input('year');
        $movie->genre = $request->input('genre');
        $movie->duration = $request->input('duration');

        $movie->save(); //guardo el obj.

        echo json_encode($movie); // De esta forma guardo el objeto en formato json.

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id)
    {
        $movie = Movie::find($movie_id); //Con esto referencio al id que esta en la DB, de esta forma NO creo un obj nuevo. 
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->year = $request->input('year');
        $movie->genre = $request->input('genre');
        $movie->duration = $request->input('duration');

        $movie->save(); //guardo el obj.

        echo json_encode($movie); // De esta forma guardo el objeto en formato json.

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {
        $movie = Movie::find($movie_id);
        $movie->delete();
    }
}

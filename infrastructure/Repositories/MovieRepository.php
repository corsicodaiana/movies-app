<?php

namespace Infrastructure\Repositories;

use Domain\Repositories\MovieRepositoryInterface;
use Domain\Entities\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    function saveMovie(string $title, int $year, string $genre)
    {
        $movie = new Movie();
        $movie->title = $title;
        $movie->year = $year;
        $movie->genre = $genre;
        $respuesta = $movie->save();
        return $respuesta;
    }

    function getListMovie()
    {
        $movies = Movie::all();
        return $movies;
    }

    function idPeliculaValido(int $idPelicula)
    {
        $pelicula = Movie::find($idPelicula);

        if($pelicula){
            return true;
        }
        return false;
    }

    function editarPelicula(int $idPelicula,string $title, int $year,string $genre) 
    {
        $movie = Movie::find($idPelicula);

        if($title != ''){
            $movie->title = $title;
        }

        if($year != ''){
            $movie->year = $year;
        }

        if($genre != ''){
            $movie->genre = $genre;
        }

        $respuesta = $movie->save();

        return $respuesta;
    }

    function eliminarPelicula(int $idPelicula)
    {
        $movie = Movie::find($idPelicula);

        if ($movie) {
            $movie->delete();

            return "Pelicula eliminada con exito.";
        } else {
            return "Pelicula no encontrada.";
        }
    }
}
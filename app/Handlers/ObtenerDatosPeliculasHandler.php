<?php

namespace App\Handlers;

use Illuminate\Http\JsonResponse;
use Domain\Repositories\MovieRepositoryInterface;


class ObtenerDatosPeliculasHandler
{

    private $movieRepositoryInterface;

    function __construct(
        MovieRepositoryInterface $movieRepositoryInterface
    )
    {
        $this->movieRepositoryInterface = $movieRepositoryInterface;
    }

    function handle()
    {
        try {
            
            $headers = array(
                'Content-Type:application/json',
                'Authorization: Bearer '.env('MOVIES_TOKEN')
                );  
            $defaults = array(
                CURLOPT_URL => 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc',
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $headers
            );
    
            $ch = curl_init();
         
            curl_setopt_array($ch, $defaults);
            
            $respuesta = curl_exec($ch);
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            
            $respuesta = json_decode($respuesta);
            saveMovies($respuesta);

            return new JsonResponse([
                'message' => 'Proceso ejecutado correctamente',
            ], $http_code);

        } catch (\Throwable $th) {
            return new JsonResponse([
                'message' => 'Error inesperado: fallo en la conexión con la api externa'
            ], 500);
        }
    }

    function saveMovies($movies){
        foreach ($movies->results as $movie) {
            $title = $movie->title;
            list($year) = explode('-',$movie->release_date);
            $genre_id = $movie->genre_ids[0];

           $respuesta = $this->movieRepositoryInterface->saveMovie($title,$year,$genre_id);
        }
    }
}

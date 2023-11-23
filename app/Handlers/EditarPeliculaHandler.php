<?php

namespace App\Handlers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Domain\Repositories\MovieRepositoryInterface;
use App\Commands\EditarPeliculaCommand;
use App\Validators\DatosPeliculaValidator;


class EditarPeliculaHandler
{

    private $movieRepositoryInterface;
    private $validaciones;


    function __construct(
        MovieRepositoryInterface $movieRepositoryInterface,
        DatosPeliculaValidator $validaciones
    )
    {
        $this->movieRepositoryInterface = $movieRepositoryInterface;
        $this->validaciones = $validaciones;
    }

    function handle($request)
    {
        $validator = Validator::make($request->all(), [
            "idPelicula" => 'bail|required|numeric',
            "title" => 'bail|string',
            "year" => 'bail|numeric|min:1800',
            "genre" => 'bail|string'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $this->validaciones->validate($request);

        $title = $request->title;
        $year = $request->year;
        $genre = $request->genre;
        $idPelicula = $request->idPelicula;
        $respuestaEdit = $this->movieRepositoryInterface->editarPelicula($idPelicula,$title,$year,$genre);
        
        if($respuestaEdit){
            return 'Película editada con éxito';
        }else{
            return 'No se pudo editar la película';
        }
        
    }
}

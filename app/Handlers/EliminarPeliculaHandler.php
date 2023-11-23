<?php

namespace App\Handlers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Domain\Repositories\MovieRepositoryInterface;
use App\Validators\DatosPeliculaValidator;


class EliminarPeliculaHandler
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

    function handle($request):string
    {
        $validator = Validator::make($request->all(), [
            "idPelicula" => 'bail|required|numeric'
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $this->validaciones->validate($request);

        $idPelicula = $request->idPelicula;
        $respuestaDelete = $this->movieRepositoryInterface->eliminarPelicula($idPelicula);
        
        return $respuestaDelete;
        
    }
}

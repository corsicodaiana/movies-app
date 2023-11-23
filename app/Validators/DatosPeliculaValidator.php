<?php


namespace App\Validators;

use App\Exceptions\AccessDeniedException;
use Domain\Repositories\MovieRepositoryInterface;

class DatosPeliculaValidator
{
    private $movieRepositoryInterface;

    function __construct(MovieRepositoryInterface $movieRepositoryInterface)
    {
        $this->movieRepositoryInterface = $movieRepositoryInterface;
    }

    function validate($request)
    {
        if(!$this->movieRepositoryInterface->idPeliculaValido($request->idPelicula))
        {
             throw new AccessDeniedException('El id de película no existe.');
        }
    }
}
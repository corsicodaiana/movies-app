<?php

namespace App\Handlers;

use Illuminate\Http\JsonResponse;
use Domain\Repositories\MovieRepositoryInterface;


class ListaPeliculasValidasHandler
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
        return $respuesta = $this->movieRepositoryInterface->getListMovie();
    }
}

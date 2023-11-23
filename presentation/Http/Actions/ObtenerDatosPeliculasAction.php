<?php

namespace Presentation\Http\Actions;

use App\Handlers\ObtenerDatosPeliculasHandler;
use Illuminate\Http\Request;

class ObtenerDatosPeliculasAction
{
    private $handler;

    public function __construct(ObtenerDatosPeliculasHandler $obtenerDatosPeliculasHandler)
    {
        $this->handler = $obtenerDatosPeliculasHandler;
    }

    public function execute()
    {
        return $this->handler->handle();
    }
}

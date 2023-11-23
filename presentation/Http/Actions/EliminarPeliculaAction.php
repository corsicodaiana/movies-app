<?php

namespace Presentation\Http\Actions;

use App\Handlers\EliminarPeliculaHandler;
use Illuminate\Http\Request;

class EliminarPeliculaAction
{
    private $handler;

    public function __construct(EliminarPeliculaHandler $eliminarPeliculaHandler)
    {
        $this->handler = $eliminarPeliculaHandler;
    }

    public function execute(Request $request)
    {
        return $this->handler->handle($request);
    }
}

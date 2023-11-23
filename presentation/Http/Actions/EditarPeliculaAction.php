<?php

namespace Presentation\Http\Actions;

use App\Handlers\EditarPeliculaHandler;
use Illuminate\Http\Request;

class EditarPeliculaAction
{
    private $handler;

    public function __construct(EditarPeliculaHandler $editarPeliculaHandler)
    {
        $this->handler = $editarPeliculaHandler;
    }

    public function execute(Request $request)
    {
        return $this->handler->handle($request);
    }
}

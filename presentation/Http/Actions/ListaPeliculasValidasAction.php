<?php

namespace Presentation\Http\Actions;

use App\Handlers\ListaPeliculasValidasHandler;
use Illuminate\Http\Request;

class ListaPeliculasValidasAction
{
    private $handler;

    public function __construct(ListaPeliculasValidasHandler $ListaPeliculasValidasHandler)
    {
        $this->handler = $ListaPeliculasValidasHandler;
    }

    public function execute()
    {
        return $this->handler->handle();
    }
}

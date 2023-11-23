<?php
declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class AccessDeniedException extends Exception
{
    public function __construct(string $responseMessage)
    {
        parent::__construct($responseMessage);
    }
}

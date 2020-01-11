<?php

namespace App\Exceptions;

use Exception;

class UserException extends Exception
{
    public static function RoleNotFound():self
    {
        return new self('No roles found');
    }
}
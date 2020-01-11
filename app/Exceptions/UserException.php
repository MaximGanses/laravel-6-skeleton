<?php

namespace App\Exceptions;

use Exception;

class UserException extends Exception
{
    public static function RoleNotFound():self
    {
        return new self('No roles found');
    }

    public static function RoleCouldNotBeAssignedToUser ():self
    {
        return new self('Role could not bet assign to user');
    }
}
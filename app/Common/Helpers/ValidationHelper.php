<?php


namespace App\Common\Helpers;
class ValidationHelper
{
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

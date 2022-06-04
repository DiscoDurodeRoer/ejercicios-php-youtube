<?php

class Session
{

    function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    function setAttribute($attribute, $value)
    {
        if (
            session_status() === PHP_SESSION_ACTIVE
            && is_string($attribute)
        ) {
            $_SESSION[$attribute] = $value;
        }
    }


    function getAttribute($attribute)
    {
        if (
            session_status() === PHP_SESSION_ACTIVE
            && is_string($attribute)
            && isset($_SESSION[$attribute])
        ) {
            return $_SESSION[$attribute];
        }

        return null;
    }


    function deleteAttribute($attribute)
    {
        if (
            session_status() === PHP_SESSION_ACTIVE
            && is_string($attribute)
            && isset($_SESSION[$attribute])
        ) {
            unset($_SESSION[$attribute]);
        }
    }


    function destroySession()
    { 
        session_destroy();
    }
}

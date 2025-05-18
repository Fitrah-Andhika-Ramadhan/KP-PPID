<?php

namespace App\Helpers;

class ErrorHandler
{
    /**
     * Register the custom error handler
     */
    public static function register()
    {
        // Set error reporting level to exclude deprecation notices
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE & ~E_WARNING);
        
        // Disable displaying errors
        ini_set('display_errors', 0);
        
        // Custom error handler to filter out deprecation messages
        set_error_handler(function($errno, $errstr, $errfile, $errline) {
            // Only handle deprecation notices
            if ($errno === E_DEPRECATED || $errno === E_USER_DEPRECATED) {
                // Just return true to suppress the error
                return true;
            }
            
            // For other errors, use the default error handler
            return false;
        }, E_DEPRECATED | E_USER_DEPRECATED);
    }
}

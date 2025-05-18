<?php
/**
 * Custom error suppression file
 * This file is included before the application starts to suppress all PHP errors
 */

// Disable all error reporting
error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set('log_errors', 0);
ini_set('html_errors', 0);

// Override the default error handler
set_error_handler(function() {
    return true; // Suppress all errors
});

<?php

// Define your autoloader function
spl_autoload_register(function ($class) {
    // Replace namespace separator with directory separator
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    
    // Path to your project's classes directory
    $file = __DIR__ . '/classes/' . $class . '.php';
    
    // Check if the file exists
    if (file_exists($file)) {
        // Require the file
        require_once $file;
    }
});


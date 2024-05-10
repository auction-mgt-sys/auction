<?php
// autoload.php

// Define the namespace for PHPMailer classes
namespace PHPMailer\PHPMailer;

// Load PHPMailer classes dynamically
spl_autoload_register(function ($class) {
    // Convert namespace separator '\' to directory separator '/'
    $class = str_replace('\\', '/', $class);

    // Base directory where PHPMailer classes are located
    $baseDir = __DIR__ . '/';

    // File extension
    $fileExt = '.php';

    // Full path to the class file
    $filePath = $baseDir . $class . $fileExt;

    // Check if the class file exists
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

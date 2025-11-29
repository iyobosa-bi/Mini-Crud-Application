<?php


spl_autoload_register(function ($class) {
    // Convert namespace separators to directory separators
    $classPath = str_replace('\\', '/', $class) . '.php';
    
    // Prepend the base directory (current directory)
    $file = __DIR__ . '/' . $classPath;

    if (file_exists($file)) {
        require_once $file;
    }
});
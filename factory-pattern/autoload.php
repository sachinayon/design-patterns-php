<?php

function autoLoader($className) {
    // Directories where the classes are located
    $directories = array(
        'classes/',
        'interfaces/'
    );

    // Loop through each directory
    foreach ($directories as $directory) {
        // Create the file path
        $filePath = $directory . $className . '.php';

        // Check if the file exists
        if (file_exists($filePath)) {
            // Include the file
            require_once $filePath;
            return;
        }
    }
}

// Register the autoloader function
spl_autoload_register('autoLoader');
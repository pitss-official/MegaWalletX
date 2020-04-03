<?php
require_once "misc.php";

spl_autoload_register( function ($class_name) {
    $CLASSES_DIR = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR;
    $file = $CLASSES_DIR . $class_name . '.php';
    if( file_exists( $file ) )
        require_once $file;
} );

new \System\Environment();


require_once "application/routes/webRoutes.php";
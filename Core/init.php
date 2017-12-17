<?php

spl_autoload_register(function ($classes){
    $path = '../classes/'.$classes.'.class.php';
    if(file_exists($path)){
        require_once ($path);
    }else{
        die("The file {$classes}.php could not be found.");
    }
});

require_once '../classes/Connection.php';
require_once '../classes/permission.php';

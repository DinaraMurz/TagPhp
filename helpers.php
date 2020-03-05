<?php

spl_autoload_register(function ($name){
    $file = "classes" . DIRECTORY_SEPARATOR . "{$name}.php";
    if(!file_exists($file))
        die("<b>{$file}</b> dosent exist");
    include_once $file;

    if(!class_exists($name))
        die("Class <b>{$name}</b> dosent exist");

});
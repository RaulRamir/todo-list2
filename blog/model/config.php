<?php
    require_once(__DIR__ . "/database.php");
    session_start();
    
    $path = "/todo-list2/";
    
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "todo2";
    
    if(!isset($_SESSION["connection"])) {
        $connection = new Database($host, $username, $password, $database);
        $_SESSION["connection"] = $connection;
    }
    
    
<?php
    define('USER', 'prachi');
    define('PASSWORD', 'prachi@123');
    define('HOST', 'localhost');
    define('DATABASE', 'TEST');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>
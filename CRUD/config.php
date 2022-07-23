<?php
$server_name = 'localhost';
$user_name = 'prachi';
$password = 'prachi@123';
$database_name = 'TEST';

$connection = new mysqli($server_name,$user_name,$password,$database_name);

if($connection->connect_error){
    die($connection->connect_error);
}

?>
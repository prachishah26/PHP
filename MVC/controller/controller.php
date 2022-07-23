<?php

require "../model/model.php";
$database = new database();

$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$enrollment = $_POST['enrollment'];



$view = $database->select(
    "INSERT INTO `students` (`fname`, `lname`, `enrollment`) VALUES ('$firstname', '$lastname', '$enrollment');"
); 

$final = $database->select(
    "SELECT * FROM `students`;"
);

$response['data'] = $final;

echo json_encode($response);

?>

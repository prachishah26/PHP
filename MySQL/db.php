<?php
    $servername='localhost';
    $username='prachi';
    $password='prachi@123';
    $dbname = "TEST";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>
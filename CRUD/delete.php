<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `CRUD_TABLE` WHERE `ID`=$user_id";

     $result = $connection->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        // sleep(3);
        header('Location: view.php');

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>


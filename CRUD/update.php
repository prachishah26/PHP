<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </head>
  <body>

<?php

include "config.php";

if (isset($_POST['update'])) {

    $firstname = $_POST['firstname'];

    $user_id = $_POST['user_id'];

    $lastname = $_POST['lastname'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $gender = $_POST['gender'];

    $sql = "UPDATE `CRUD_TABLE` SET `First Name`='$firstname',`Last Name`='$lastname',`Email`='$email',`Password`='$password',`Gender`='$gender' WHERE `ID`='$user_id'";
    
    $result = $connection->query($sql);
    if ($result == true) {
        echo "Record updated successfully.";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `CRUD_TABLE` WHERE `ID`='$user_id'";

    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['First Name'];
            $lastname = $row['Last Name'];
            $email = $row['Email'];
            $password = $row['Password'];
            $gender = $row['Gender'];
            $id = $row['ID'];
        }

        ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>
            <legend>Personal information:</legend>
            First name:<br>
            <input type="text" name="firstname" value="<?php echo $first_name; ?>">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <br>
            Last name:<br>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
            <br>
            Email:<br>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <br>
            Password:<br>
            <input type="password" name="password" value="<?php echo $password; ?>">
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') {echo "checked";}?> >Male
            <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') {echo "checked";}?>>Female
            <br><br>
            <input type="submit" value="Update" name="update">
          </fieldset>

        </form>
    <?php
    } else {
        header('Location: view.php');
    }
}
?>
</body>
</html>


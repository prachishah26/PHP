<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Validation</title>
</head>

<body>
  <div class="container">
    <div class="col-md-12">

      <?php
      // define variables and set to empty values
      $nameErr = $emailErr = $genderErr = $websiteErr = $phonenumberErr = "";
      $name = $email = $gender = $comment = $website = $phonenumber = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }

        if (empty($_POST["email"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
        }

        if (empty($_POST["website"])) {
          $website = "";
        } else {
          $website = test_input($_POST["website"]);
          // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
          if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            $websiteErr = "Invalid URL";
          }
        }
        // $USA_number = "+1 610 245 8317";
        // $ind_number = "+919512522440";
        // $Germany_number = "+49 1711234567";
        // $HongKong_number = "+85212341234";
        // $Australia_number = "+614 1234 5678";
        if (empty($_POST["phonenumber"])) {
          $phonenumberErr = "Valid Phone number is required";
        } else {
          $phonenumber = test_input($_POST["phonenumber"]);
          // check if phonenumber only digit format
          if (preg_match("/^((\+){1}91){1}[1-9]{1}[0-9]{9}$/", $phonenumber)) {
            echo ("$phonenumber is a valid India number");
          } else {
            echo ("That is not a India valid number");
          }
          echo "<br>";
          if (preg_match("/(\+1 )?\d{3} \d{3} \d{4}/", $phonenumber)) {
            echo ("$phonenumber is a valid USA number");
          } else {
            echo ("That is not a USA valid number");
          }
          echo "<br>";
          if (preg_match("/^((\+){1}49 ){1}[1-9]{3}[1-9]{7}$/", $phonenumber)) {
            echo ("$phonenumber is a valid Germany number");
          } else {
            echo ("That is not a Germany valid number");
          }
          echo "<br>";
          if (preg_match("/^[+][8][5][0-9]{4}[0-9]{4}/", $phonenumber)) {
            echo ("$phonenumber is a valid HongKong number");
          } else {
            echo ("That is not a Hongkong valid number");
          }
          echo "<br>";
          if (preg_match("/^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$/", $phonenumber)) {
            echo ("$phonenumber is a valid Australia number");
          } else {
            echo ("That is not a Australia valid number");
          }
        }

        if (empty($_POST["comment"])) {
          $comment = "";
        } else {
          $comment = test_input($_POST["comment"]);
        }

        if (empty($_POST["gender"])) {
          $genderErr = "Gender is required";
        } else {
          $gender = test_input($_POST["gender"]);
        }
      }

      function test_input($data)
      {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      ?>

      <h2>PHP Form Validation</h2>
      <p><span class="error">* required field</span></p>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Website: <input type="text" name="website" value="<?php echo $website; ?>">
        <span class="error"><?php echo $websiteErr; ?></span>
        <br><br>
        Phone Number: <input type="tel" name="phonenumber" value="<?php echo $phonenumber; ?>">
        <span class="error">* <?php echo $phonenumberErr; ?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
      </form>

      <?php
      echo "<h2>Your Input:</h2>";
      echo $name;
      echo "<br>";
      echo $email;
      echo "<br>";
      echo $website;
      echo "<br>";
      echo $phonenumber;
      echo "<br>";
      echo $comment;
      echo "<br>";
      echo $gender;
      ?>

    </div>
  </div>
</body>

</html>

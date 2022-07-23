<!DOCTYPE html>
<html>
<body>

<?php
// Variable to check
$USA_number = "+1 610 245 8317";
$ind_number = "+919512522440";
$Germany_number = "+49 171 1234567";
$HongKong_number = "+85212341234";
$Australia_number = "+614 1234 5678";

// Validate url
if (preg_match("/^((\+){1}91){1}[1-9]{1}[0-9]{9}$/",$ind_number)) {
  echo("$ind_number is a valid India number");
} else {
  echo("$ind_number is not a India valid number");
}
echo "<br>";
if (preg_match("/(\+1 )?\d{3} \d{3} \d{4}/",$USA_number)) {
    echo("$USA_number is a valid USA number");
} else {
  echo("$USA_number is not a USA valid number");
}
echo "<br>";
if (preg_match("/(\(?([\d \-\)\–\+\/\(]+)\)?([ .\-–\/]?)([\d]+))/",$Germany_number)) {
  echo("$Germany_number is a valid Germany number");
} else {
  echo("$Germany_number is not a Germany valid number");
}
echo "<br>";
if (preg_match("/^[+][8][5][0-9]{4}[0-9]{4}/",$HongKong_number)) {
  echo("$HongKong_number is a valid HongKong number");
} else {
  echo("$HongKong_number is not a Hongkong valid number");
}
echo "<br>";
if (preg_match("/^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$/",$Australia_number)) {
  echo("$Australia_number is a valid Australia number");
} else {
  echo("$Australia_number is not a Australia valid number");
}
?>

</body>
</html>

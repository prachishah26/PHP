
<?php

//import.php
/*
include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=TEST", "prachi", "prachi@123");

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();
//   print_r($data);
  foreach($data as $row)
  {
    print_r($row);
    echo "<br>";
   $insert_data = array(
    ':0'  => $row[0],
    ':First Name'  => $row[1],
    ':Last Name'  => $row[2],
    ':Gender'  => $row[3],
    ':Country'  => $row[4],
    ':Age'  => $row[5],
    ':Date'  => $row[6],
    ':Id'  => $row[7]
   );

   $query = "
   INSERT INTO fromCsv 
   (0,fname,lname,gender,country,age,date,id) 
   VALUES (:0,:First Name,:Last Name,:Gender,:Country,:Age,:Date,:Id)
   ";

   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
*/
?>


<?php

//import.php

include 'vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=TEST", "prachi", "prachi@123");

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();

  foreach($data as $row)
  {
   $insert_data = array(
    ':id' => $row[0],
    ':name'  => $row[1],
    ':address'  => $row[2],
    ':gender'  => $row[3],
    ':designation'  => $row[4],
    ':age'  => $row[5]
   );

   $query = "
   INSERT INTO test 
   (id, name, address, gender, designation, age) 
   VALUES (:id, :name, :address, :gender, :designation, :age)
   ";

   $statement = $connect->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>

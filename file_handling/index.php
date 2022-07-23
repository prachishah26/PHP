
<?php
/*
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);
*/
?>


<?php
/*
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);
*/
?>

<?php
/*
$list = array (
  array("Peter", "Griffin" ,"Oslo", "Norway"),
  array("Glenn", "Quagmire", "Oslo", "Norway")
);

$file = fopen("contacts.csv","w");

foreach ($list as $line) {
  fputcsv($file, $line);
}

fclose($file);
*/
?>

<?php
/*
$filename = "newfile.txt";
if (touch($filename)) {
  echo $filename . " modification time has been changed to present time";
} else {
  echo "Sorry, could not change modification time of " . $filename;
}
*/
?>

<?php
/*
// Get current directory
echo getcwd() . "<br>";

// Change directory
chdir("images");

// Get current directory
echo getcwd();
*/
?>

<?php
/*
$d = dir(getcwd());

echo "Handle: " . $d->handle . "<br>";
echo "Path: " . $d->path . "<br>";

while (($file = $d->read()) !== false){
  echo "filename: " . $file . "<br>";
}
$d->close();
*/
echo __FILE__;
?>

<?php
mkdir("/articles");
echo("Directory created");
?>


<?php
$dir = "/home/woc/Prachi/Training/PHP/calender";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      echo "filename:" . $file . "<br>";
    }
    closedir($dh);
  }
}else{
    echo "no";
}
?>


<?php

$all_contents = glob("*");
print_r($all_contents);

$log_entries = glob("*log*");
print_r($log_entries);

echo getcwd();
?>

<?php
// Change root directory
// chroot("/home/woc/Prachi/");

// Get current directory
echo getcwd();
echo '<br><br>';
echo dirname(__FILE__);
echo __DIR__;
?>
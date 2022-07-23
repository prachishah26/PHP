<?php

// addcslashes() 
$str = addcslashes("Hello World!","W");
echo($str);
echo "<br>";

// addslashes() 
$str = addslashes('What does "yolo" mean?');
echo($str); 
echo "<br>";

// bin2hex()
$str = "Hello world!";
echo bin2hex($str) . "<br>";
// this string can be converted back using pack() function 
echo pack("H*",bin2hex($str)) . "<br>";

// crc32()
$str = crc32("Hello world!");
echo 'Without %u: '.$str."<br>";
echo 'With %u: ';
printf("%u",$str);

// explode() 
$str = "Hello world";
print_r(explode(" ",$str));

print_r (get_html_translation_table(HTML_ENTITIES));


parse_str("name=Peter&age=43");
echo $name."<br>";
echo $age;

$str = "Hello=0Aworld.";
echo quoted_printable_decode($str);

$number = 9;
$str = "Beijing";
$txt = vsprintf("There are %u million bicycles in %s.",array($number,$str));
echo $txt;



?>
<?php

// cal_days_in_month()
$d=cal_days_in_month(CAL_GREGORIAN,10,2005);
echo "There was $d days in October 2005";
echo "<br>";

// cal_from_jd()
$d=unixtojd(mktime(0,0,0,6,20,2007));
print_r(cal_from_jd($d,CAL_GREGORIAN));

// cal_info(0)
print_r(cal_info(0));


$mailid  = 'abc@example.com';
$user = strstr($mailid, '@', true);
echo $user;

$value1 = 65.45;
$value2 = 104.35;
echo sprintf("%1.2f", $value1+$value2)."\n";


$cha = 'A';
$next_cha = ++$cha; 
//The following if condition prevent you to go beyond 'z' or 'Z' and will reset to 'a' or 'A'.
if (strlen($next_cha) > 1) 
{
 $next_cha = $next_cha[0];
 }
echo $next_cha."\n";


















?>
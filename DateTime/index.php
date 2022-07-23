<?php

// checkdate 

var_dump(checkdate(12,31,-400));
echo "<br>";
var_dump(checkdate(2,29,2003));
echo "<br>";
var_dump(checkdate(2,29,2004));

// date_add()
$date=date_create("2013-03-15");
date_add($date,date_interval_create_from_date_string("40 days"));
echo date_format($date,"Y-m-d");

$date = date_create_from_format("j-M-Y","15-Mar-2022");
echo date_format($date,"Y/m/d");
echo "<br>";

echo date_default_timezone_get();

$date1=date_create("2013-01-01");
$date2=date_create("2013-02-10");
$diff=date_diff($date1,$date2);

// %a outputs the total number of days
echo $diff->format("Total number of days: %a.");
echo "<br>";

// %R outputs + beacause $date2 is after $date1 (a positive interval)
echo $diff->format("Total number of days: %R%a.");
echo "<br>";

// %d outputs the number of days that is not already covered by the month
echo $diff->format("Month: %m, days: %d.");

$date=date_create("2013-05-01");
date_modify($date,"+15 days");
echo date_format($date,"Y-m-d");
echo "<br>";
// date_offset_get()----------------------------


print_r(date_parse_from_format("mmddyyyy","05122013"));
echo "<br><br>";
print_r(date_parse_from_format("j.n.Y H:iP","12.5.2013 14:35+02:00"));

$date=date_create("2013-05-01");
date_time_set($date,13,24);
echo date_format($date,"Y-m-d H:i:s");

echo "<br><br>";

$date=date_create("2013-05-25",timezone_open("Indian/Kerguelen"));
echo date_format($date,"Y-m-d H:i:sP") . "<br>";

date_timezone_set($date,timezone_open("Europe/Paris"));
echo date_format($date,"Y-m-d H:i:sP");



// Prints the day
echo date("l") . "<br>";

// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A") . "<br>";

// Prints October 3, 1975 was on a Friday
echo "Oct 3,1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

// Use a constant in the format parameter
echo date(DATE_RFC822) . "<br>";

// prints something like: 1975-10-03T00:00:00+00:00
echo date(DATE_ATOM,mktime(0,0,0,10,3,1975));


// Prints the day
echo gmdate("l") . "<br>";

// Prints the day, date, month, year, time, AM or PM
echo gmdate("l jS \of F Y h:i:s A") . "<br>";

// Prints October 3, 1975 was on a Thursday
echo "Oct 3, 1975 was on a ".gmdate("l", mktime(0,0,0,10,3,1975)) . "<br>";

// Use a constant in the format parameter
echo gmdate(DATE_RFC822) . "<br>";

// prints something like: 1975-10-03T00:00:00+00:00
echo gmdate(DATE_ATOM,mktime(0,0,0,10,3,1975));


// Prints: October 3, 1975 was on a Friday
echo "Oct 3, 1975 was on a ".date("l", gmmktime(0,0,0,10,3,1975));

echo idate("B") . "<br>";
echo idate("d") . "<br>";
echo idate("h") . "<br>";
echo idate("H") . "<br>";
echo idate("i") . "<br>";
echo idate("I") . "<br>";
echo idate("L") . "<br>";
echo idate("m") . "<br>";
echo idate("s") . "<br>";
echo idate("t") . "<br>";
echo idate("U") . "<br>";
echo idate("w") . "<br>";
echo idate("W") . "<br>";
echo idate("y") . "<br>";
echo idate("Y") . "<br>";
echo idate("z") . "<br>";
echo idate("Z") . "<br>";


print_r(localtime());
echo "<br><br>";
print_r(localtime(time(),true));
echo "<br><br>";
echo "<br><br>";
echo "<br><br>";
$format="%d/%m/%Y %H:%M:%S";
$strf=strftime($format);
echo("$strf");
print_r(strptime($strf,$format));

echo "<br><br>";
print_r(timezone_identifiers_list(16));

echo "<br><br>";
echo timezone_version_get();
echo "<br><br>";


$format="%d/%m/%Y %H:%M:%S";
$strf=strftime($format);
echo("$strf");
print_r(strptime($strf,$format));
echo "<br><br>";


$timezone = new DateTimeZone("Europe/Paris");
// Procedural style
print_r(reset(timezone_transitions_get($timezone)));

echo "<br><br>";

// Object oriented style
print_r(reset($timezone->getTransitions()));

?>
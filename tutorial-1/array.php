<?php
$cars = array( 'Volvo', 'BMW', 'Toyota' );
echo 'I like ' . $cars[ 0 ] . ', ' . $cars[ 1 ] . ' and ' . $cars[ 2 ] . '.<br>';

$arrlength = count( $cars );

for ( $x = 0; $x<$arrlength; $x++ ) {
    echo $cars[ $x ];
    echo '<br>';
}

// array_change_key_case()
$age = array( 'Peter'=>'35', 'Ben'=>'37', 'Joe'=>'43' );
print_r( array_change_key_case( $age, CASE_UPPER ) );
echo '<br>';

// chunk
$cars = array( 'Volvo', 'BMW', 'Toyota', 'Honda', 'Mercedes', 'Opel' );
print_r( array_chunk( $cars, 2 ) );
echo '<br>';

// array_column()
$a = array(
    array(
        'id' => 5698,
        'first_name' => 'Peter',
        'last_name' => 'Griffin',
    ),
    array(
        'id' => 4767,
        'first_name' => 'Ben',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 3809,
        'first_name' => 'Joe',
        'last_name' => 'Doe',
    )
);

$last_names = array_column( $a, 'last_name' );
print_r( $last_names );
echo '<br>';

// array_combine()
$fname = array( 'Peter', 'Ben', 'Joe' );
$age = array( '35', '37', '43' );

$c = array_combine( $fname, $age );
print_r( $c );
echo '<br>';

// array_count_values()
$a = array( 'A', 'Cat', 'Dog', 'A', 'Dog' );
print_r( array_count_values( $a ) );
echo '<br>';

// array_diff();
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue', 'd'=>'yellow' );
$a2 = array( 'e'=>'red', 'f'=>'green', 'g'=>'blue' );

$result = array_diff( $a1, $a2 );
print_r( $result );
echo '<br>';

// array_diff_assoc()
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue', 'd'=>'yellow' );
$a2 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue' );

$result = array_diff_assoc( $a1, $a2 );
print_r( $result );
echo '<br>';

// array_diff_key()
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue' );
$a2 = array( 'a'=>'red', 'c'=>'blue', 'd'=>'pink' );

$result = array_diff_key( $a1, $a2 );
print_r( $result );
echo '<br>';

// array_fill()
$a1 = array_fill( 3, 4, 'blue' );
$b1 = array_fill( 0, 1, 'red' );
print_r( $a1 );
echo '<br>';
print_r( $b1 );
echo '<br>';
// array_fill_keys()
$keys = array( 'a', 'b', 'c', 'd' );
$a1 = array_fill_keys( $keys, 'blue' );
print_r( $a1 );
echo '<br>';

// array_filter()

function test_odd( $var ) {
    return( $var & 1 );
}

$a1 = array( 1, 3, 2, 3, 4 );
print_r( array_filter( $a1, 'test_odd' ) );
echo '<br>';

// array_flip()
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue', 'd'=>'yellow' );
$result = array_flip( $a1 );
print_r( $result );
echo '<br>';

// array_intersect()
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue', 'd'=>'yellow' );
$a2 = array( 'e'=>'red', 'f'=>'green', 'g'=>'blue' );

$result = array_intersect( $a1, $a2 );
print_r( $result );
echo '<br>';

// array_intersect_assoc()
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue', 'd'=>'yellow' );
$a2 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue' );

$result = array_intersect_assoc( $a1, $a2 );
print_r( $result );
echo '<br>';

// array_intersect_key()
$a1 = array( 'a'=>'red', 'b'=>'green', 'c'=>'blue' );
$a2 = array( 'a'=>'red', 'c'=>'blue', 'd'=>'pink' );

$result = array_intersect_key( $a1, $a2 );
print_r( $result );
echo '<br>';

// array_key_exists()
$a = array( 'Volvo'=>'XC90', 'BMW'=>'X5' );
if ( array_key_exists( 'Volvo', $a ) ) {
    echo 'Key exists!';
} else {
    echo 'Key does not exist!';
}
echo '<br>';

// array_keys()
$a = array( 'Volvo'=>'XC90', 'BMW'=>'X5', 'Toyota'=>'Highlander' );
print_r( array_keys( $a ) );
echo '<br>';

// array_map()

function myfunction( $v ) {
    return( $v*$v );
}

$a = array( 1, 2, 3, 4, 5 );
print_r( array_map( 'myfunction', $a ) );
echo '<br>';

function myfunction1( $v ) {
    if ( $v === 'Dog' ) {
        return 'Fido';
    }
    return $v;
}

$a = array( 'Horse', 'Dog', 'Cat' );
print_r( array_map( 'myfunction1', $a ) );
echo '<br>';

// array_merge() 
$a1=array("red","green");
$a2=array("blue","yellow");
print_r(array_merge($a1,$a2));
echo '<br>';

// array_merge_recursive() 
$a1=array("a"=>"red","b"=>"green");
$a2=array("c"=>"blue","b"=>"yellow");
print_r(array_merge_recursive($a1,$a2));
echo '<br>';

// array_multisort() 
$a=array("Dog","Cat","Horse","Bear","Zebra");
array_multisort($a);
print_r($a);
echo '<br>';

$a1=array("Dog","Dog","Cat");
$a2=array("Pluto","Fido","Missy");
array_multisort($a1,SORT_ASC,$a2,SORT_DESC);
print_r($a1);echo '<br>';
print_r($a2);
echo '<br>';

$a1=array(1,30,15,7,25);
$a2=array(4,30,20,41,66);
$num=array_merge($a1,$a2);
array_multisort($num,SORT_DESC,SORT_NUMERIC);
print_r($num);
echo '<br>';

// array_pad()
$a=array("red","green");
print_r(array_pad($a,5,"blue"));
echo '<br>';

// array_pop() 
$a=array("red","green","blue");
array_pop($a);
print_r($a);
echo '<br>';

// array_product()
$a=array(5,5);
echo(array_product($a));
echo '<br>';

// array_push() 
$a=array("red","green");
array_push($a,"blue","yellow");
print_r($a);
echo '<br>';

$a=array("a"=>"red","b"=>"green");
array_push($a,"blue","yellow");
print_r($a);
echo '<br>';

// array_rand() 
$a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
print_r(array_rand($a,1));
echo '<br>';

// array_reduce() 
function myfunction3($v1,$v2)
{
return $v1 . "-" . $v2;
}
$a=array("Dog","Cat","Horse");
print_r(array_reduce($a,"myfunction3"));
echo '<br>';

$a=array("red","green","blue","yellow","brown");
$random_keys=array_rand($a,3);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]];
echo '<br>';

function myfunction4($v1,$v2)
{
return $v1+$v2;
}
$a=array(10,15,20);
print_r(array_reduce($a,"myfunction4",5));
echo '<br>';

// array_replace() 
$a1=array("a"=>"red","b"=>"green");
$a2=array("a"=>"orange","burgundy");
print_r(array_replace($a1,$a2));
echo '<br>';

// array_replace_recursive() 
$a1=array("a"=>array("red"),"b"=>array("green","blue"),);
$a2=array("a"=>array("yellow"),"b"=>array("black"));
print_r(array_replace_recursive($a1,$a2));
echo '<br>';

// array_reverse() 
$a=array("a"=>"Volvo","b"=>"BMW","c"=>"Toyota");
print_r(array_reverse($a));
echo '<br>';

// array_search() 
$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_search("red",$a);
echo '<br>';

// array_shift() 
$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_shift($a);
print_r ($a);
echo '<br>';

// array_slice() 
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,2));
echo '<br>';


// array_splice()
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("a"=>"purple","b"=>"orange");
array_splice($a1,0,2,$a2);
print_r($a1);
echo '<br>';

$a1=array("0"=>"red","1"=>"green");
$a2=array("0"=>"purple","1"=>"orange");
array_splice($a1,1,0,$a2);
print_r($a1);

echo '<br>';


// array_sum() 
$a=array(5,15,25);
echo array_sum($a);
echo '<br>';

$a=array("a"=>52.2,"b"=>13.7,"c"=>0.9);
echo array_sum($a);
echo '<br>';

// compact() 
$firstname = "Peter";
$lastname = "Griffin";
$age = "41";

$result = compact("firstname", "lastname", "age");

print_r($result);


?>
<?php

// variables
echo 'My first PHP script!';
echo '<br>';
$x = 'hello';
echo $x;
echo '<br>';

// if
$t = date( 'H' );
if ( $t<20 ) {
    echo 'Have a good day';
}

// switch case
$name = 'prachi';
switch( $name ) {
    case 'prachi':
    echo 'Hii prachi';
    break;

}
echo '<br>';

// while
$number = 1;
while( $number<5 ) {
    echo "number is $number <br>";
    $number++;
}

// array
$colors = array( 'red', 'green', 'blue', 'yellow' );
foreach ( $colors as $color ) {
    echo "$color <br>";
}

// associated array
$associated_array = array( 'prachi'=>'1', 'shah'=>'2' );
arsort( $associated_array );
foreach ( $associated_array as $key=>$value ) {
    echo "$key.$value <br>";
}

// multidimension array
$cars = array (
    array( 'Volvo', 22, 18 ),
    array( 'BMW', 15, 13 ),
    array( 'Saab', 5, 2 ),
    array( 'Land Rover', 17, 15 )
);

echo $cars[ 0 ][ 0 ].': In stock: '.$cars[ 0 ][ 1 ].', sold: '.$cars[ 0 ][ 2 ].'.<br>';
echo $cars[ 1 ][ 0 ].': In stock: '.$cars[ 1 ][ 1 ].', sold: '.$cars[ 1 ][ 2 ].'.<br>';
echo $cars[ 2 ][ 0 ].': In stock: '.$cars[ 2 ][ 1 ].', sold: '.$cars[ 2 ][ 2 ].'.<br>';
echo $cars[ 3 ][ 0 ].': In stock: '.$cars[ 3 ][ 1 ].', sold: '.$cars[ 3 ][ 2 ].'.<br>';

for ( $row = 0; $row < 4; $row++ ) {
    echo "<p><b>Row number $row</b></p>";
    echo '<ul>';
    for ( $col = 0; $col < 3; $col++ ) {
        echo '<li>'.$cars[ $row ][ $col ].'</li>';
    }
    echo '</ul>';
}

// sorting
echo var_dump( $associated_array );
echo '<br>';
$x = 100;

$y = 80;

if ( $x == 100 and $y == 80 ) {
    echo 'Hello world!';
}

?>

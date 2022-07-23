<?php
$start  = 1;
$end = 10;
?>
<html>
<head>
<title>A divison table in PHP</title>
</head>
<body>
<table border = '1'>
<?php
print( '<tr>' );
print( '<th></th>' );
for ( $count = $start; $count <= $end; $count++ )
print( '<th>'.$count.'</th>' );
print( '</tr>' );

for ( $count = $start; $count <= $end; $count++ )
{
    print( '<tr><th>'.$count.'</th>' );
    for ( $count2 = $start; $count2 <= $end; $count2++ )
    {
        $result = $count / $count2;

        printf( '<td>%.3f</td>', $result );
    }
    print( '</tr> \n' );
}

?>
</table>
</body>
</html>

<?php
$count = 0;
$num = 2;
while ( $count < 15 ) {
    $div_count = 0;
    for ( $i = 1; $i <= $num; $i++ ) {
        if ( ( $num%$i ) == 0 ) {
            $div_count++;
        }
    }
    if ( $div_count<3 ) {
        echo $num.' , ';
        $count = $count+1;
    }
    $num = $num+1;
}

?>

<?php

if ( isset( $_POST[ 'date' ] ) || isset( $_POST[ 'time' ] ) ) {
    $time = '';
    $date = '';
    if ( isset( $_POST[ 'time' ] ) ) {
        $time = $_POST[ 'time' ];
    }
    if ( isset( $_POST[ 'date' ] ) ) {
        $date = $_POST[ 'date' ];
    }
        echo $time.'<br>';
        echo $date;
    }
    ?>
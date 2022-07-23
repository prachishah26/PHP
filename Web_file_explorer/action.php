<?php
$dir = dirname( __FILE__ );


if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'fetch' ) {

        $folder = scandir( $dir );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );
    }
}

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'fetch_files' ) {
        $folder = scandir( $dir );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );
    }
}

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'get_child' ) {

        $dir .= '/'.$_POST[ 'name' ];

        $folder = scandir( $dir );

        if ( count( $folder ) > 0 ) {
            foreach ( $folder as $name ) {
                $output = $name;
                if ( ! ( $output === '.' || $output === '..' ) ) {
                    if ( strpos( $output, '.' ) !== false && strlen( $output )>3 ) {
                        echo '<ul class="folder" data-name ="'.$output.'"><i class="fa fa-file" aria-hidden="true"></i><p style="display:inline;">'.$output.'</p></ul><br>';

                    } else {
                        echo '<ul class="folder" data-name ="'.$output.'"><i class="fa fa-folder" aria-hidden="true"></i><p style="display:inline;">'.$output.'</p></ul><br>';
                    }
                }
            }
        } else {
            $output = 'No Folder Found';
        }
    }
}

if ( $_POST[ 'action' ] == 'create' ) {
    if ( !file_exists( $_POST[ 'folder_name' ] ) ) {

        mkdir( $_POST[ 'folder_name' ], 0777, true );

        $folder = scandir( $dir );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );

    } else {
        $response[ 'status' ] = false;
        $response[ 'message' ] = 'Folder Already Created';
        $response[ 'data' ] = '';
        echo json_encode( $response );

    }
}

if ( $_POST[ 'action' ] == 'create_file' ) {
    if ( !file_exists( $_POST[ 'file_name' ] ) ) {

        $file = fopen( $_POST[ 'file_name' ], 'w' );
        $folder = scandir( $dir );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );

    } else {
        $response[ 'status' ] = false;
        $response[ 'message' ] = 'Folder Already Created';
        $response[ 'data' ] = '';
        echo json_encode( $response );

    }
}

if ( $_POST[ 'action' ] == 'subdirectory' ) {
    $dir .= '/'.$_POST[ 'name' ];
    $folder = scandir( $dir );
    $response[ 'status' ] = true;
    $response[ 'message' ] = 'Fetched All data';
    $response['fname'] = $dir;
    $response[ 'data' ] = $folder;
    echo json_encode( $response );

}

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'fetch_files_back' ) {
        $folder = scandir( $_POST['path'] );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );
    }
}


?>


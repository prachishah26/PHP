<?php
// $dir = dirname( __FILE__ );

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'fetch' ) {
        $current_path = $_POST[ 'path' ];
        $folder = scandir( $current_path );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );
    }
}

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'fetch_files' ) {
        // $folder = scandir( $dir );
        $current_path = $_POST[ 'path' ];
        $folder = scandir( $current_path );
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
    $current_path = $_POST[ 'path' ];
    
    if ( !file_exists($current_path.'/'.$_POST[ 'folder_name' ] ) ) {

        mkdir( $current_path.'/'.$_POST[ 'folder_name' ], 0777, true );

        $folder = scandir( $current_path );
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
    $current_path = $_POST[ 'path' ];
    if ( !file_exists( $current_path.'/'.$_POST[ 'file_name' ]  ) ) {

        $file = fopen( $current_path.'/'.$_POST[ 'file_name' ], 'w' );
        $folder = scandir( $current_path );
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
    $current_path = $_POST[ 'path' ];
    $folder = scandir( $current_path );
    $response[ 'status' ] = true;
    $response[ 'message' ] = 'Fetched All data';
    $response[ 'data' ] = $folder;
    echo json_encode( $response );
}

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'fetch_files_back' ) {
        $folder = scandir( $_POST[ 'path' ] );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;
        echo json_encode( $response );
    }
}

if ( isset( $_POST[ 'action' ] ) ) {
    if ( $_POST[ 'action' ] == 'delete' ) {
        
        $current_path = $_POST[ 'path' ];
        
        // rmdir( $current_path.'/'.$_POST[ 'name' ]);
        delete_all($current_path.'/'.$_POST[ 'name' ]);
        $folder = scandir( $current_path );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );
    }
}

if ( $_POST[ 'action' ] == 'rename' ) {
    $current_path = $_POST[ 'path' ];
    
    

        rename( $current_path.'/'.$_POST[ 'old_name' ],$current_path.'/'.$_POST[ 'new_name' ] );

        $folder = scandir( $current_path );
        $response[ 'status' ] = true;
        $response[ 'message' ] = 'Fetched all data';
        $response[ 'data' ] = $folder;

        echo json_encode( $response );

}

if ( $_POST[ 'action' ] == 'paste' ) {
    $current_path = $_POST[ 'path' ];
    mkdir( $current_path.'/'.$_POST[ 'folder_name' ], 0777, true );

    $folder = scandir( $current_path );
    $response[ 'status' ] = true;
    $response[ 'message' ] = 'Fetched all data';
    $response[ 'data' ] = $folder;

    echo json_encode( $response );
    // echo $current_path;

}




function delete_all( $item ) {
    if ( is_dir( $item ) ) {
        array_map( 'delete_all', array_diff( glob( "$item/{,.}*", GLOB_BRACE ), array( "$item/.", "$item/.." ) ) );
        rmdir( $item );
    } else {
        unlink( $item );
    }
};




?>


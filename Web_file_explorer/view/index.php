<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">

    <!-- jquery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- boxicons link  -->

    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    <title>Web file explorer</title>
</head>

<body>
    <!-- file explorer  -->
    <div class="file-explorer">
        <div class="heading text-center">
            <h3>File Explorer</h3>
        </div>
        <div class="row">
            <!-- left panel  -->
            <div class="col-4 left-panel ">
                <!-- <p class='directories btn btn-primary ms-4'>Directories</p> -->
                <div class='directory mt-3'>

                </div>
            </div>

            <!-- right panel  -->
            <div class="col-8 right-panel">

                <!-- buttons of different functionalities  -->
                <div class="buttons ">
                    <button class="btn btn-light home"><i class="fa fa-home" aria-hidden="true"></i>
                        HOME</button>
                    <button class="btn btn-light create"><i class="fa fa-folder" aria-hidden="true"></i>CREATE</button>
                    <button class="btn btn-light add-file"><i class="fa fa-plus-circle" aria-hidden="true"></i>ADD
                        FILE</button>
                    <button class="btn btn-light delete"><i class="fa fa-trash" aria-hidden="true"></i>DELETE</button>
                    <button class="btn btn-light back" data-path='/home/woc/Prachi/Training/PHP/Web_file_explorer'><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        BACK</button>
                    <button class="btn btn-light cut"><i class="fa fa-scissors" aria-hidden="true"></i>CUT</button>
                    <button class="btn btn-light copy"><i class="fa fa-clone" aria-hidden="true"></i>COPY</button>
                    <button class="btn btn-light paste"><i class="fa fa-clipboard" aria-hidden="true"></i>PASTE</button>
                    <button class="btn btn-light rename">RENAME</button>

                </div>


                <div class="content mt-5" style='display:flex;'>

                </div>

                <div id="folderModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title"><span id="change_title">Create Folder</span></h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter Folder Name
                                    <input type="text" name="folder_name" id="folder_name" class="form-control" />
                                </p>
                                <br />
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="old_name" id="old_name" />
                                <input type="button" name="folder_button" id="folder_button" class="btn btn-info"
                                    value="Create" />

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>



                <div id="fileModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                <h4 class="modal-title"><span id="change_title">Create File</span></h4>
                            </div>
                            <div class="modal-body">
                                <p>Enter File Name
                                    <input type="text" name="file_name" id="file_name" class="form-control" />
                                </p>
                                <br />
                                <input type="hidden" name="action" id="action" />
                                <input type="hidden" name="old_name" id="old_name" />
                                <input type="button" name="file_button" id="file_button" class="btn btn-info"
                                    value="Create" />


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
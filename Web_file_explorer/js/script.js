$(document).ready(function () {
    

    // left panel directories and file list getting using ajax 
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            action: 'fetch',    
        },
        success: function (data) {
            var data_obj = $.parseJSON(data);
            for (let i = 0; i <= data_obj.data.length; i++) {

                if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                    
                    if (data_obj.data[i].includes('.')) {
                        // console.log("if conditon")
                        
                        $('.directory').append(`<ul class='folder' data-name='${data_obj.data[i]}'><i class="fa fa-file" aria-hidden="true"></i><p style='display: inline;'>${data_obj.data[i]}</p></ul>`);
                    }
                    else {
                        // console.log("else")
                        $('.directory').append(`<ul class='folder' data-name='${data_obj.data[i]}'><i class="fa fa-folder" aria-hidden="true"></i><p style='display: inline;'>${data_obj.data[i]}</p></ul>`);
                    }
                }
            }
        }
    });



    // right panel folders getting using ajax 
    $(".home").on('click', function () {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'fetch_files',
            },
            success: function (data) {
                var data_obj = $.parseJSON(data);
                $('.content').html("");
                for (let i = 0; i <= data_obj.data.length; i++) {

                    if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                        
                        if (data_obj.data[i].includes('.')) {
                            $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-file d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                        else {
                            $('.content').append(`<div class="d-flex flex-colum file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-folder d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                    }
                }
            }
        });
    })

    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            action: 'fetch_files',
        },
        success: function (data) {
            var data_obj = $.parseJSON(data);
            for (let i = 0; i <= data_obj.data.length; i++) {

                if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                    if (data_obj.data[i].includes('.')) {
                        $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-file d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                    }
                    else {
                        $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-folder d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                    }
                }
            }
        }
    });

    // for subdirectories 
    $(document).on("click", ".folder", function () {
        var this_folder = $(this);

        var name = $(this).data('name');
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'get_child',
                name: name,
            },
            success: function (data) {
                this_folder.append(data);
            }
        });
    })

    // for create new folder 
    $(document).on('click', '.create', function () {
        $('#action').val("create");
        $('#folder_name').val('');
        $('#folder_button').val('Create');
        $('#folderModal').modal('show');
        $('#old_name').val('');
        $('#change_title').text("Create Folder");
    });

    // when we enter new folder's name in modal and then submit this function will call 
    $(document).on('click', '#folder_button', function () {
        var folder_name = $('#folder_name').val();
        var old_name = $('#old_name').val();
        var action = $('#action').val();
        if (folder_name != '') {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { folder_name: folder_name, old_name: old_name, action: action },
                success: function (data) {
                    $('#folderModal').modal('hide');
                    var data_obj = $.parseJSON(data);
                    
                    if(!data_obj.data == ''){
                        $('.directory,.content').html("");
                        for (let i = 0; i <= data_obj.data.length; i++) {

                            if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                                if (data_obj.data[i].includes('.')) {
                                    $('.directory').append(`<ul data-name='${data_obj.data[i]}'><i class="fa fa-file" aria-hidden="true"></i>${data_obj.data[i]}</ul>`);
                                    $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-file d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                }
                                else {
                                    $('.directory').append(`<ul data-name='${data_obj.data[i]}'><i class="fa fa-folder" aria-hidden="true"></i>${data_obj.data[i]}</ul>`);
                                    $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-folder d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                }
                            }
                        }

                    }else{
                        alert("folder already exists !!!");
                    }
                }
            });
        }
        else {
            alert("Enter Folder Name");
        }
    });


    // add file click event 
    $(document).on('click', '.add-file', function () {
        console.log("hii");
        $('#action').val("create_file");
        $('#file_name').val('');
        $('#file_button').val('Create');
        $('#fileModal').modal('show');
        $('#old_name').val('');
        $('#change_title').text("Create File");
    });

    // when we enter name of the file and submit
    $(document).on('click', '#file_button', function () {
        var file_name = $('#file_name').val();
        var old_name = $('#old_name').val();
        var action = $('#action').val();
        if (folder_name != '') {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { file_name: file_name, old_name: old_name, action: action },
                success: function (data) {
                    $('#fileModal').modal('hide');
                    var data_obj = $.parseJSON(data);
                    
                    if(!data_obj.data == ''){
                        $('.directory').html("");
                        for (let i = 0; i <= data_obj.data.length; i++) {

                            if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                                if (data_obj.data[i].includes('.')) {
                                    $('.directory').append(`<ul data-name='${data_obj.data[i]}'><i class="fa fa-file" aria-hidden="true"></i>${data_obj.data[i]}</ul>`);
                                    $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-file d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                }
                                else {
                                    $('.directory').append(`<ul data-name='${data_obj.data[i]}'><i class="fa fa-folder" aria-hidden="true"></i>${data_obj.data[i]}</ul>`);
                                    $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-folder d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                }
                            }
                        }

                    }else{
                        alert("File already exists !!!");
                    }
                }
            });
        }
        else {
            alert("Enter File Name");
        }
    });

    $(document).on('click','.close',function(){
        $('#fileModal').modal('hide');
        $('#folderModal').modal('hide');
    })

    
    $(document).on('click','.file-folder',function(){
        $('.file-folder').removeClass('background-color');
        $(this).addClass('background-color');
    })

    
    $('body').click(function(event){    
        if(!$(event.target).is('.file-folder')) {
            $('.file-folder').removeClass('background-color');
        }
    });

    $(document).on('dblclick','.file-folder',function(){
        var name = $(this).find('h6').text();
        console.log(name);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'subdirectory',   
                name: name
            },
            success: function (data) {
                var data_obj = $.parseJSON(data);
                
                console.log(data_obj.fname)
                $('.back').attr("data-path",`${data_obj.fname}`);
                $('.content').html('');

                for (let i = 0; i <= data_obj.data.length; i++) {

                    if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                        
                        if (data_obj.data[i].includes('.')) {
                            $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-file d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                        else {
                            $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-folder d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                    }
                }


                
            }
        });


    })


    $(document).on('click','.back',function(){
        current_path = $(this).data("path");
        path = current_path.substring(0, current_path.lastIndexOf("/"));
        console.log(path);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'fetch_files_back',
                path : path
            },
            success: function (data) {
                var data_obj = $.parseJSON(data);
                $('.content').html('');
                for (let i = 0; i <= data_obj.data.length; i++) {
    
                    if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                        if (data_obj.data[i].includes('.')) {
                            $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-file d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                        else {
                            $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><i class="fa-solid fa-folder d-flex justify-content-center" style="font-size: 40px;"></i></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                    }
                }
            }
        });

    })



})



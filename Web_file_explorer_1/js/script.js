$(document).ready(function () {
    $('.paste').prop('disabled', true);


    // Global variables 
    var folder_counter = 1, name_of_copied_file_folder, cut_path_, this_fname;
    var is_cut = false;
    var path = $('.back').data("path");

    // right panel folders getting using ajax 
    $(".home").on('click', function () {
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'fetch_files',
                path: path
            },
            success: function (data) {
                var data_obj = $.parseJSON(data);
                $('.content').html("");
                for (let i = 0; i <= data_obj.data.length - 1; i++) {
                    if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                        if (data_obj.data[i].includes('.')) {
                            $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                        else {
                            $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                    }
                }
            }
        });
    })

    // automatically load the file and folder for the home directory 
    $.ajax({
        url: "action.php",
        method: "POST",
        data: {
            action: 'fetch_files',
            path: path
        },
        success: function (data) {
            var data_obj = $.parseJSON(data);
            for (let i = 0; i <= data_obj.data.length - 1; i++) {
                if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                    if (data_obj.data[i].includes('.')) {
                        $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                    }
                    else {
                        $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                    }
                }
            }
        }
    });

    // for create new folder 
    $(document).on('click', '.create', function () {
        // console.log($(".back").attr("data-path"));
        $('.error').hide();
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
        if (validateFolderName(folder_name)) {
            // console.log('right')
            var old_name = $('#old_name').val();
            var action = $('#action').val();
            path = $(".back").attr('data-path');
            console.log("--------------", path)
            if (folder_name != '') {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: { folder_name: folder_name, old_name: old_name, action: action, path: path, count: folder_counter },
                    success: function (data) {
                        ++folder_counter;
                        $('#folderModal').modal('hide');
                        var data_obj = $.parseJSON(data);

                        if (!data_obj.data == '') {
                            $('.content').html("");
                            for (let i = 0; i <= data_obj.data.length - 1; i++) {

                                if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                                    if (data_obj.data[i].includes('.')) {
                                        $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                    }
                                    else {
                                       
                                        $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                    }
                                }
                            }
                        } else {
                            alert("folder already exists !!!");
                        }
                    }
                });
            }
            else {
                alert("Enter Folder Name");
            }
        }
    });

    // add file click event 
    $(document).on('click', '.add-file', function () {

        $(".error").hide();

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

        if (validateFileName(file_name)) {
            var old_name = $('#old_name').val();
            var action = $('#action').val();
            path = $(".back").attr('data-path');
            if (file_name != '') {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: { file_name: file_name, old_name: old_name, action: action, path: path },
                    success: function (data) {
                        $('#fileModal').modal('hide');
                        var data_obj = $.parseJSON(data);

                        if (!data_obj.data == '') {
                            $('.content').html("");
                            for (let i = 0; i <= data_obj.data.length; i++) {
                                if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                                    if (data_obj.data[i].includes('.')) {
                                    
                                        $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                    }
                                    else {
                                        
                                        $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                    }
                                }
                            }

                        } else {
                            alert("File already exists !!!");
                        }
                    }
                });
            }

        }
    });

    // close button for modal 
    $(document).on('click', '.close', function () {
        $('#fileModal').modal('hide');
        $('#folderModal').modal('hide');
    })

    // click event for single click Selection of folder or file 
    $(document).on('click', '.file-folder', function () {
        $('.file-folder').removeClass('background-color');
        $(this).addClass('background-color');
        name_of_file_folder = $(this).find('h6').text();
    })

    // click event for delete button 
    $(document).on('click', '.delete', function () {
        var path = $('.back').attr('data-path');

        if (confirm('Are you sure to delete ?')) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: 'delete',
                    path: path,
                    name: name_of_file_folder
                },
                success: function (data) {
                    console.log('data-----', data)
                    var data_obj = $.parseJSON(data);
                    $('.content').html('');

                    for (let i = 0; i <= data_obj.data.length - 1; i++) {
                        if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                            if (data_obj.data[i].includes('.')) {
                                $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                            }
                            else {
                                $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                            }
                        }
                    }
                }
            });
        }
    })

    // when click except file folder the background color will be removed 
    $('body').click(function (event) {
        if (!$(event.target).is('.file-folder')) {
            $('.file-folder').removeClass('background-color');
        }
    });

    // click event when rename button is pressed
    $(document).on('click', '.rename', function () {
        $(".error").hide();

        $('#action').val("rename");
        $('#new_name').val('');
        $('#new_button').val('Create');
        $('#renameModal').modal('show');
        $('#old_name').val('');
        $('#change_title').text("Create File");
    })

    // click event for rename submit button
    $(document).on('click', '#new_button', function () {
        var new_name = $('#new_name').val();

        if (validateFolderName(file_name)) {
            var old_name = $('#old_name').val();
            var action = $('#action').val();
            path = $(".back").attr('data-path');
            if (new_name != '') {
                $.ajax({
                    url: "action.php",
                    method: "POST",
                    data: { new_name: new_name, old_name: name_of_file_folder, action: action, path: path },
                    success: function (data) {
                        $('#renameModal').modal('hide');
                        var data_obj = $.parseJSON(data);

                        if (!data_obj.data == '') {
                            $('.content').html("");
                            for (let i = 0; i <= data_obj.data.length; i++) {
                                if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                                    if (data_obj.data[i].includes('.')) {
                                        
                                        $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                    }
                                    else {
                                       
                                        $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                                    }
                                }
                            }
                        } else {
                            alert("File already exists !!!");
                        }
                    }
                });
            }
        }
    });

    // to enter into subfolders 
    $(document).on('dblclick', '.file-folder', function () {
        var temp_path = $(".back").attr('data-path');
        var name = $(this).find('h6').text();
        var updated_path = temp_path + '/' + name;

        // $(".back").attr("data-path",updated_path);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                action: 'subdirectory',
                name: name,
                path: updated_path
            },
            success: function (data) {
                var data_obj = $.parseJSON(data);

                // $('.back').attr("data-path",`${data_obj.fname}`);
                $(".back").attr("data-path", updated_path);
                $('.content').html('');

                for (let i = 0; i <= data_obj.data.length - 1; i++) {

                    if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {

                        if (data_obj.data[i].includes('.')) {
                            $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                        else {
                            $('.content').append(`<div class="d-flex flex-column file-folder" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                        }
                    }
                }
            }
        });
    })

    // click event when back is clicked 
    $(document).on('click', '.back', function () {
        current_path = $(this).attr("data-path");

        if (current_path == "/home/woc/Prachi/Training/PHP/Web_file_explorer_1") {
            alert("This is the main directory !")

        }
        else {
            path = current_path.substring(0, current_path.lastIndexOf("/"));
            $('.back').attr('data-path', path);
            console.log(path);
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    action: 'fetch_files_back',
                    path: path
                },
                success: function (data) {
                    var data_obj = $.parseJSON(data);
                    $('.content').html('');
                    for (let i = 0; i <= data_obj.data.length - 1; i++) {

                        if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                            if (data_obj.data[i].includes('.')) {
                                $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                            }
                            else {
                                $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                            }
                        }
                    }
                }
            });
        }
    })
    var path_of_copied_folder;
    // click event when copy is clicked 
    $(document).on('click', '.copy', function () {
        $('.paste').prop("disabled", false);
        name_of_copied_file_folder = name_of_file_folder;
        path_of_copied_folder = $('.back').attr('data-path');
    })

    // click event when paste clicked 
    $(document).on('click', '.paste', function () {
        $('.paste').prop("disabled", true);
        path = $('.back').attr('data-path');
        // console.log("cut_path------",cut_path_)
        console.log("real path", path_of_copied_folder);
        console.log("paste path", path)

        if (name_of_file_folder != '') {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: { folder_name: name_of_copied_file_folder, action: 'paste', path: path, cut_path: cut_path_, is_cut: is_cut, path_of_copied_folder: path_of_copied_folder },
                success: function (data) {
                    is_cut = false;
                    var data_obj = $.parseJSON(data);
                    $('.content').html('');
                    for (let i = 0; i <= data_obj.data.length - 1; i++) {

                        if (!(data_obj.data[i] === '.' || data_obj.data[i] === '..')) {
                            if (data_obj.data[i].includes('.')) {
                                $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/file.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                            }
                            else {
                                $('.content').append(`<div class="d-flex flex-column file-folder p-2" style="margin-right:10px;min-width:60px;"><p><img src="images/folder.png" alt=""></p><h6 class="d-flex" style="justify-content:center;">${data_obj.data[i]}</h6></div>`);
                            }
                        }
                    }
                }
            });
        }

    })

    // click event for cut button 
    $(document).on('click', '.cut', function () {
        $('.paste').prop("disabled", false);
        name_of_copied_file_folder = name_of_file_folder;
        path_of_copied_folder = $('.back').attr('data-path');
        cut_path_ = $('.back').attr('data-path');
        is_cut = true;

    })

    // validation for folder name 
    function validateFolderName(folder_name) {
        // var re = /[^<>:"/\|?*(?:aux|con|nul|prn|com[1-9]|lpt[1-9])]/;
        var re = /^[^\s^\x00-\x1f\\?*:"";<>|\/.][^\x00-\x1f\\?*:"";<>|\/]*[^\s^\x00-\x1f\\?*:"";<>|\/.]+$/g;
        if (!re.test(folder_name)) {
            // alert("Error: Input contains invalid characters!");
            $(".error").show();
            $(".error").text("Invalid name for folder !!!");
            return false;
        }
        // validation was successful
        return true;
    }

    // validation for file name 
    function validateFileName(file_name) {

        var re = /([a-z0-9])*\.(png|txt|jpeg|jpg|xls)$/i;
        if (!re.test(file_name)) {
            // alert("Error: Input contains invalid characters!");
            $(".error").show();
            $(".error").text("Invalid name or extension for this file !!! File extension should be in txt/xls/png/jpeg/jpg");
            return false;
        }
        // validation was successful
        return true;
    }

    // right click on file or folder then the functinalities will be shown 
    $(document).on("contextmenu", '.file-folder', function (event) {
        // Avoid the real one
        event.preventDefault();
        // Show contextmenu
        $(".custom-menu").finish().toggle(100).

            // In the right position (the mouse)
            css({
                top: event.pageY + "px",
                left: event.pageX + "px"
            });
    });


    // If the document is clicked somewhere
    $(document).bind("mousedown", function (e) {
        // If the clicked element is not the menu
        if (!$(e.target).parents(".custom-menu").length > 0) {
            // Hide it
            $(".custom-menu").hide(100);
        }
    });

    // If the menu element is clicked
    $(".custom-menu li").click(function () {
        // Hide it AFTER the action was triggered
        $(".custom-menu").hide(100);
    });

    // tree view ---------------------------------

    $( '#container' ).html( '<ul class="filetree start"><li class="wait">' + 'Generating Tree...' + '<li></ul>' );
	
	getfilelist( $('#container') , '/home/woc/Prachi/Training/PHP/Web_file_explorer_1' );
	
	function getfilelist( cont, root ) {
	
		$( cont ).addClass( 'wait' );
			
		$.post( 'foldertree.php', { dir: root }, function( data ) {
	
			$( cont ).find( '.start' ).html( '' );
			$( cont ).removeClass( 'wait' ).append( data );
			if( 'Sample' == root ) 
				$( cont ).find('UL:hidden').show();
			else 
				$( cont ).find('UL:hidden').slideDown({ duration: 500, easing: null });
			
		});
	}


    $( '#container' ).on('click', 'li a', function() {
		var entry = $(this).parent();
		
		if( entry.hasClass('folder') ) {
			if( entry.hasClass('collapsed') ) {
						
				entry.find('ul').remove();
				getfilelist( entry, escape( $(this).attr('rel') ));
				entry.removeClass('collapsed').addClass('expanded');
			}
			else {
				
				entry.find('ul').slideUp({ duration: 500, easing: null });
				entry.removeClass('expanded').addClass('collapsed');
			}
		} else {
			$( '#selected_file' ).text( "File:  " + $(this).attr( 'rel' ));
		}
	return false;
	});



})


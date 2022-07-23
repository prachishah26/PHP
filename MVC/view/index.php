<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>MVC</title>
</head>

<body>
    <div class="title">
        <h2>MVC Architecture</h2>
    </div>
    <div class="subtitle">
        <h3>Personal Details :</h3>
    </div>
    <div>
        <label>First name :</label>
        <input type="text" id="fname" name="fname" placeholder="Enter your first name...">
        <label>Last name :</label>
        <input type="text" id="lname" name="lname" placeholder="Enter your last name...">
        <label>Enrollment No. :</label>
        <input type="text" id="enrollment" name="enrollment" placeholder="Enter your enrollment no....">
        <input type="submit" id="submit">
    </div>
    <div class="result">
        Result :
        <div class="tabletr">
            <table></table>
        </div>
    </div>
</body>

<script>
    $(document).on('click', "#submit", function() {
        var firstName = $("#fname").val();
        var lastName = $('#lname').val();
        var enrollment = $('#enrollment').val();
        console.log(firstName, lastName, enrollment);
        $.ajax({
            type: "POST",
            url: "../controller/controller.php",
            dataType: "json",
            data: {
                "fname": firstName,
                "lname": lastName,
                "enrollment": enrollment
            },
            success: function(response) {
                $('.tabletr table').empty();
                $.each(response.data, function(key, value) {
                    $('.tabletr table').append(`<tr><td>${value.enrollment}</td><td>${value.fname}</td><td>${value.lname}</td></tr>`);
                });
            }
        });

    });
</script>

</html>
 

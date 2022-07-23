<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Contact Us</title>
</head>

<body>
    <div class='container'>
		
		<form id="myForm">
			<h2>Contact Us</h2>

            <div class="form-group">
                <label for="name" class='mt-2'>Full Name</label>
                <input type="text" name="name" class="form-control" id="name" 
                    placeholder="Enter Your Name">
                
            </div>

			<div class="form-group">
                <label for="email" class='mt-2'>Email</label>
                <input type="email" name="email" class="form-control" id="email" 
                    placeholder="Enter Your Email">
                
            </div>

            <div class="form-group">
                <label for="subject" class='mt-2'>Subject</label>
                <input type="text" name="subject" class="form-control" id="subject" 
                    placeholder="Subject">
                
            </div>

            <div class="form-group">
                <label for="details" class='mt-2'>About Yourself</label>
                <textarea name="details" cols="30" rows="5" class="form-control" id="body" placeholder="Type message"></textarea>
            </div>

			<button type="button" onclick="sendEmail()" class="btn btn-primary text-center mt-3" value="Send An Email">Submit</button>
		</form>
        <h6 class="sent-notification text-success"></h6>
        </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.").fadeOut(5000);
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
      

</body>

</html>
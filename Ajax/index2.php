<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery get() Demo</title>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        // Get value from input element on the page
        var numValue = $("#num").val();
        
        // Send the input data to the server using get
        $.get("create-table.php", {number: numValue} , function(data){
            // Display the returned data in browser
            $("#result").html(data);
        });
    });
});
</script>
</head>
<body>
    <label>Enter a Number: <input type="text" id="num"></label>
    <button type="button">Show Multiplication Table</button>
    <div id="result"></div>
</body>
</html>
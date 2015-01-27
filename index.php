<?php

	echo count($_POST);
	var_dump($_POST);
	//exit();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
    	<form id="f" method="POST">
    	<input name="test" value="test" type="hidden">
    	<input type=submit name="submit" id="submit" value="Continue"/>
    	</form>
        <h4>Your local IP addresses:</h4>
        <ul></ul>
        <h4>Your public IP addresses:</h4>
        <ul></ul>
        <script src="webrtc.js"></script>
        <script>
			//document.getElementById("f").submit();
        </script>
    </body>
</html>
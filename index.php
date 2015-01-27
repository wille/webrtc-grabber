<?php

if (count($_POST) > 0) {
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<form id="f" method="POST">
		<input name="test" value="test" type="hidden">
	</form>

	<script src="webrtc.js"></script>
	<script>
			
			setTimeout(post, 2000)
			
			function post() {
				document.getElementById("f").submit();
			}
        </script>
</body>
</html>
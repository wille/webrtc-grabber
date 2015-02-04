<?php
if (count($_POST) > 0) {
	$file = fopen("log.txt", "a");
	fwrite($file, date('l jS \of F Y h:i:s A') . "\n");
	$remote = $_SERVER['REMOTE_ADDR'];
	fwrite($file, "Connecting from:\n\t" . $remote . " (" . gethostbyaddr($remote) . ")\n");
	fwrite($file, "Referer:\n\t" . $_SERVER['HTTP_REFERER'] . ")\n");
	fwrite($file, "User agent:\n\t" . $_SERVER['HTTP_USER_AGENT'] . "\n");
	fwrite($file, "Found addresses:\n");
	foreach ($_POST as $ip) {
		if ($ip == "none" && count($_POST) > 1) {
			continue;
		}
		
		fwrite($file, "\t" . $ip . " (" . gethostbyaddr($ip) . ")\n");
	}
	fwrite($file, "\n\n\n");
	fclose($file);
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
		<input name="0" value="none" type="hidden"></input>
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
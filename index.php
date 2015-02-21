<?php
if (count($_POST) > 0) {
	$file = fopen("log.txt", "a");
	fwrite($file, date('l jS \of F Y h:i:s A') . "\n");
	$remote = $_SERVER ['REMOTE_ADDR'];
	fwrite($file, "Connecting from:\n\t" . $remote . " (" . gethostbyaddr($remote) . ")\n");
	fwrite($file, "Referer:\n\t" . $_SERVER ['HTTP_REFERER'] . "\n");
	fwrite($file, "User agent:\n\t" . $_SERVER ['HTTP_USER_AGENT'] . "\n");
	fwrite($file, "Found addresses:\n");
	foreach ( $_POST as $ip ) {
		if ($ip == "none" && count($_POST) > 1) {
			continue;
		}
		
		$ips = explode(",", $ip);
		
		foreach ( $ips as $address ) {
			if (strlen($address) > 1) {
				fwrite($file, "\t" . $address . " ");
				fwrite($file, "(" . gethostbyaddr($address) . ")\n");
			}
		}
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

	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="webrtc.js"></script>
	<script>

	setTimeout(post, 1000);

		function post() {
			$.post("index.php",
				{
		    	   	s: ips,
		    	},
		    	function(data, status) {
		    		   	alert(data);
		    	}
		   	);  
		}
    </script>
</body>
</html>
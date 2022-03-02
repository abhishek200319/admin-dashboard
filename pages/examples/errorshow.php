<?php

if (isset($_GET['upmsg'])) {
	echo "<div style='text-align:center; background-color:green;'><h3>password changed successfully!<a href='login.php' style='display:block'>click to login</h3></a></div>";
}

if (isset($_GET['err'])) {
	echo "<div style='text-align:center; background-color:red;'><h3>Wrong code, please try again<a href='forgot-password.html' style='display:block'>Try-again</h3></a></div>";
}



?>
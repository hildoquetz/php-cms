<?php

if(isset($_POST['submit'])) {
	
	$name 	= $_POST['name'];
	$pass 	= $_POST['password'];
	
	if(md5($name) == md5($pass)) {
		echo "You are in.";
	} else {
		echo "Sorry, you are out.";
	}

} else {
	echo "Nothing to see here";
}

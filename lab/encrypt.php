<?php

	$pass = "123";
	$userPass = readline("Password: ");

	if(md5($pass) == md5($userPass)) {
		echo "\n You are login!";
	} else {
		echo "\n Password incorrect";
	}

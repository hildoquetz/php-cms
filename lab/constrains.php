<?php

// constrains

	define('DB_NAME', 'my_database');
	define('DB_USER', 'my_database_user');
	define('DB_PASS', 'my_database_pass');

	function callConstrains() {
		echo "\n" . DB_USER;
		echo "\n" . DB_PASS;
	}

	callConstrains();

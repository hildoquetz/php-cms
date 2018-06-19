<?php

// Database Connection

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'php_udemy');
	define('DB_USER', 'phpmyadmin');
	define('DB_PASS', '130293');

// String for Passwords

	define('HASH_FORMAT', "$2y$10$");
	define('HASH_SALT', 'pvteu2gwvmjy7azy2gcjw7');
	define('HASH', HASH_FORMAT . HASH_SALT);

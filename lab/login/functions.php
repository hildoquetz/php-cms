<?php

	require 'config.php';

	// DATABASE FUNCTIONS

	function db_connect() {
		$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (mysqli_connect_error($link)) {
			die("Connection failed: " . mysqli_connect_error());
		}
		return $link;
	}

	function db_insert($query = array()) {
		
		$link = db_connect();
		
		$q = "INSERT INTO " . $query['tablename']; 
		if($query['columns']){
			$q .= " (" . $query['columns'] . ") ";
		}
		$q .= " VALUES (" . $query['values'] . ");";
		
		$result = mysqli_query($link, $q);
		
		if(!$result) {
			die("Insert error: " . mysqli_error($link));
		}
		
		mysqli_close($link);

		return $q;
	}

	function db_update($query = array()) {
		
		$link = db_connect();
		
		$q = "UPDATE " . $query['tablename'] . " SET "; 
		$q .= $query['values'] . " WHERE " . $query['conditions'];

		$result = mysqli_query($link, $q);
		
		if(!$result) {
			die("Update error: " . mysqli_error($link));
		}

		mysqli_close($link);

		return $q;
	}

	function db_delete($query = array()){
		
		$link = db_connect(); 

		$q = "DELETE FROM " . $query['tablename']; 
		$q .= " WHERE " . $query['conditions'];
		
		$result = mysqli_query($link, $q);

		if(!$result) {
			die("Delete error: " . mysqli_error($link));
		}

		mysqli_close($link);

		return $q;
	}

	// PASSWORD FUNCTIONS

	function password_encrypt($pass){
		$encrypted = crypt($pass, HASH);
		return $encrypted;
	}

	function password_check($input, $user_pass) {
		if(hash_equals($user_pass, crypt($input, HASH))) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

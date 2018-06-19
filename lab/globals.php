<?php 

// global variables 

	$GLOBALS['name'] = 'Hildo Quetz';
	
	function context(){
		global $name; // call the global into the context 
		echo $name;	
	}

	context();
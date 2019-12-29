<?php  

	$con = mysqli_connect('localhost', 'root', '', 'register');

	function escape($string) {
		global $con;

		return mysqli_real_escape_string($con, $string);
	}

	function query($query) {
		global $con;
		return mysqli_query($con, $query);
	}

	function fetch_array($result) {
		global $con;
		return mysqli_fetch_array($result);
		
	}

	function confirm($result) {
		global $con;

		if (!$result) {
			die("Query Failed". mysqli_error($con));
		}
		
	}

	function row_count($result) {
		
		return mysqli_num_rows($result);
	}

?>
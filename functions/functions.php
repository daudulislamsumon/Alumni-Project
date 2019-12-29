<?php 


	/*************************						 *******************/
	/*************************	Helper Functions     *******************/
	/*************************						 *******************/


	function clean($string) {

		return htmlentities($string);
	}

	function redirect($location) {

		return header("Location: {$location}");
	}

	function set_message($message) {
		
		if (!empty($message)) {
			$_SESSION['message'] = $message;
		} else {
			$message = "";
		}
	}


	function display_message() {

		if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}

	function token_generator() {

		$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
		return $token;
	}

	function validation_error($error_message) {

$error_message = <<<DELIMITER
					
				  

	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Warning!</strong>$error_message
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
DELIMITER;

return $error_message;
				
	}


	function email_exist($email) {

		$sql = "SELECT id FROM users WHERE email = '$email'";
		$result = query($sql);

		if (row_count($result) == 1) { 
			return true;
		} else {
			return false;
		}
	}


	function studentid_exist($studentid) {

		$sql = "SELECT id FROM users WHERE studentid = '$studentid'";
		$result = query($sql);

		if (row_count($result) == 1) {
			return true;
		} else {
			return false;
		}
	}


	function send_email($email, $subject, $msg, $headers) {

		return mail($email, $subject, $msg, $headers);
	}




	/*************************						 *******************/
	/*************************	Validation Functions  *******************/
	/*************************						 *******************/





	function validate_user_registration() {

		$errors = [];

		$min = 3;
		$max = 20;

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$Name = clean($_POST['Name']);
			$Student_id = clean($_POST['Student_id']);
			$Email = clean($_POST['Email']);
			$Mobile = clean($_POST['Mobile']);
			$Gender = clean($_POST['Gender']);
			$City = clean($_POST['City']);
			$Blood_group = clean($_POST['Blood_group']);
			$Job_place = clean($_POST['Job_place']);
			$Job_designation = clean($_POST['Job_designation']);
			$Address = clean($_POST['Address']);
			$Shift = clean($_POST['Shift']);
			$Password = clean($_POST['Password']);

			

			if (strlen($Name) < $min) {
				
				$errors[] = "Your name is can not be less then {$min} charecters";
			}

			if (studentid_exist($Student_id)) {

				$errors[] = "Sorry that student id is already taken";
			}

			if (email_exist($Email)) {

				$errors[] = "Sorry that email id is already registered";
			}

			if (!empty($errors)) {
 
				foreach ($errors as $error) {

					echo validation_error($error);
				}
			} else {

					if (register_user($Name, $Student_id, $Email, $Mobile, $Gender, $City,
					 $Blood_group, $Job_place, $Job_designation, $Address, $Shift, $Password)) {
						
						// echo "<h2>USER REGISTERED</h2";
						echo '

								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<strong>USER REGISTERED</strong>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
							    </div>

						';
						
					}
			}
		}
	}




	/*************************						     *******************/
	/*************************	Register user Functions  *******************/
	/*************************						     *******************/


	function register_user($Name, $Student_id, $Email, $Mobile, $Gender, $City, $Blood_group, 
		$Job_place, $Job_designation, $Address, $Shift, $Password) {

			$Name = escape($Name);
			$Student_id = escape($Student_id);
			$Email = escape($Email);
			$Mobile = escape($Mobile);
			$Gender = escape($Gender);
			$City = escape($City);
			$Blood_group = escape($Blood_group);
			$Job_place = escape($Job_place);
			$Job_designation = escape($Job_designation);
			$Address = escape($Address);
			$Shift = escape($Shift);
			$Password = escape($Password);


		if (email_exist($Email)) {

			return false;

		} elseif (studentid_exist($Student_id)) {

			return false;
			
		} else {

			$Password = md5($Password);
			// $validation_code = md5($Student_id + microtime());
			$validation_code = md5($Student_id);

			$sql = "INSERT INTO users(name, studentid, email, mobile, gender, city, bloodgroup, jobplace, jobdesignation, address, shift, password, validation_code, active)";

			$sql.= " VALUES('$Name', '$Student_id','$Email', '$Mobile','$Gender', '$City',
			'$Blood_group', '$Job_place','$Job_designation', '$Address','$Shift', '$Password', 
			'$validation_code', 0)";

			$result = query($sql);
			confirm($result);

			$subject = "Activate Account";
			$msg = "Please click the link below to activate your account 
			http://localhost/login/activate.php?email=$email&code=$validation_code
			";
			$headers = "From: sumon@gmail.com";
			send_email($email, $subject, $msg, $headers);

			return true;
			
		}



	}


	/*************************						     *******************/
	/*************************	Activate user Functions  *******************/
	/*************************						     *******************/



	function activate_user() {
		if ($_SERVER['REQUEST_METHOD'] == "GET") {
			
			if (isset($_GET['email'])) {
				
				echo $email = clean($_GET['email']);
				echo $validation_code = clean($_GET['code']);
			}
		}
	}







?>
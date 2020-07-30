<?php
	session_start();
	$username = "";
	$email = "";
	$errors = array();

	//connecting to the database
	$db = mysqli_connect('localhost','root','Password1234','lecturer');

	//If the register button is clicked
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password1 = mysqli_real_escape_string($db, $_POST['password1']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);
		$role = mysqli_real_escape_string($db, $_POST['role']);

		//ensure all fields are filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password1)) {
			array_push($errors, "Password is required");
		}

		if ($password1 != $password2) {
			array_push($errors, "The two passwords do not match");
		}

		//if there are no errors, save user to the database
		if (count($errors) == 0) {
		
			$sql = "INSERT INTO users(username, email, password, role) VALUES('$username','$email','$password1','$role')";

			if (mysqli_query($db, $sql)) {
				$_SESSION['success'] = "New record created successfully";
			  } else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			  }
			
			$_SESSION['username'] = $username;
			$_SESSION['role'] = $role;
			// $_SESSION['success'] = "Welcome $username";

			$role1 = "lecturer";
			if ($role == $role1) {
				header('location: lecturer/index.php'); //redirect to lecturer home page					
			}else{
				header('location: index_redirect.php'); //redirect to other home page					
			}

		}

		mysqli_close($db);

	}


	//log the user in from the login page
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$role = mysqli_real_escape_string($db, $_POST['role']);

		//ensure all fields are filled properly
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0 ) {
			
            $query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='$role'";
			$result = mysqli_query($db, $query);
			
			$data = $result->fetch_assoc();
        
			if (mysqli_num_rows($result) == 1) {
				//log user in
				$_SESSION['username'] = $data['username'];
				$_SESSION['role'] = $data['role'];
				$_SESSION['success'] = "Welcome ". $data['username'];

				$role1 = "lecturer";
				if ($data['role'] == $role1) {
					header('location: lecturer/index.php'); //redirect to lecturer home page					
				}else{
					header('location: index_redirect.php'); //redirect to other home page					
				}

			} else{
				array_push($errors, "Incorrect credentials");
			}
		}

		mysqli_close($db);

	}


	//logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['role']);
		unset($_SESSION['username']);
		unset($_SESSION['success']);
		header('location: login.php');
	}

	if (isset($_POST['forgot'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		
		if (empty($email)) {
			array_push($errors, "Email is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT email FROM users WHERE email='$email'";
			$exists = mysqli_query($db,$query);
			$data = $exists->fetch_assoc();

			if(mysqli_num_rows($exists) == 1)
			{
				$_SESSION['reset-email'] = $data['email'];

				header('location: reset.php'); //redirect to other reset page					
				
			}else{
				array_push($errors, "This Email does not exist");
			}
		}

		mysqli_close($db);

	}

	if (isset($_POST['reset'])) {

		$email = $_SESSION['reset-email'];
		$password1 = mysqli_real_escape_string($db, $_POST['password1']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);

		//ensure all fields are filled properly
		// if (empty($email)) {
		// 	array_push($errors, "Email is required");
		// }
		if (empty($password1)) {
			array_push($errors, "Password is required");
		}

		if ($password1 != $password2) {
			array_push($errors, "The two passwords do not match");
		}

		//if there are no errors, update user password to the database
		if (count($errors) == 0) {
			$sql = "UPDATE users SET password='$password1' WHERE email='$email'";

			if (mysqli_query($db, $sql)) {
				$_SESSION['reset-message'] = "Login In with your new password";

				header('location: login.php'); //redirect to login page
			} else {
				echo "Error updating record: " . mysqli_error($db);
			}
		}

		mysqli_close($db);
	}


 ?>
<?php
include 'conn.php';


session_start();
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username)) {
		// code...
	echo 'Please Enter Username';
	}elseif (empty($password)) {
		// code...
		echo 'Please Enter Password';
	}else{

		$check = "SELECT id,role FROM user WHERE username = '$username' AND   password = '$password' ";
		$stmt = $conn->prepare($check);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			// code...
			foreach ($stmt->fetchALL() as $x) {
				// code...
			
				$role = $x['role'];
				$name = $x['name'];
			}
			if ($role == 'normal') {
				// code...
				$_SESSION['username'] = $username;
				header('location: page/dashboard.php');
			}else{
				$_SESSION['username'] = $username;
				header('location: page/admin.php');
			}


		}else{
			echo 'WRONG PASSWORD';
		}
	}
}
if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header('location: ../index.php');
}

?>
<?php

include 'conn.php';
$method = $_POST['method'];

if ($method == 'add') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$insert = "INSERT INTO user (`username`,`password`,`role`) 	VALUES ('$username', '$password', '$role')";
	$stmt = $conn->prepare($insert);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}




	

	if($method == 'fetch_data') {
		$c = 0;
		$username = $_POST['username'];

		$select ="SELECT * FROM user WHERE username  LIKE '$username%' AND role LIKE '$username%'";

		$stmt = $conn->prepare($select);
		$stmt->execute();
		if($stmt->rowCount() > 0){
			foreach ($stmt->fetchALL() as $j) {
				// code...

				$c++;

				echo '<tr style="cursor:pointer;" class="modal-trigger" data-target ="edit" onclick="edit_data(&quot;'.$j['id'].'~!~'.$j['username'].'~!~'.$j['password'].'~!~'.$j['role'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['username'].'</td>';
				echo '<td>'.$j['role'].'</td>';
			echo '</tr>';
			}
		}else{
		echo '<tr>';
		echo '<td colspan ="3">No Result</td>';

		echo '</tr>';
	}

	}

	if($method == 'update'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$id = $_POST['id'];

		$update ="UPDATE user SET username = '$username', password = 
		'$password', role = '$role' WHERE id = '$id'";
		$stmt = $conn->prepare($update);
		if ($stmt->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}

	}
	if($method == 'delete'){
		$id = $_POST['id'];

		$delete = "DELETE FROM user WHERE id = '$id'";
		$stmt = $conn->prepare($delete);
		if($stmt-> execute()){
			echo 'success';
		}else{
			echo 'error';
		}
	}



	



	?>
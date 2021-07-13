<?php  


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
    $email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($password) || empty($name) || empty($email)) {
		header("Location: index.html");
	}else {

		$sql = "INSERT INTO register(name,email, password) VALUES('$name', '$email', '$password')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			header('Location: signupconfirmed.html');
            exit;
            
		}else {
			header('Location: therewasaproblem.html');
            exit;
            
		}
       
	}

}else {
	header("Location: index.html");
}
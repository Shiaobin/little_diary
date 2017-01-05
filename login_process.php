<?php
	session_start();
	require_once 'dbconfig.php';

	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$password = trim($_POST['password']);

		try
		{

			$stmt = $db_con->prepare("SELECT * FROM configs WHERE config='password'");
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();

			if (password_verify($password, $row['value'])){

				echo "ok"; // log in
				$_SESSION['authed'] = true;
			}
			else{

				echo "密碼錯誤。"; // wrong details
			}

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>

<?php
	# start session
	session_start();


	require_once('./library.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
		  echo "<script>
                alert('Failed to connecto to MySQL');
                window.location.href='index.php';
                </script>";
	}

	$result = mysqli_query($db_connection,"SELECT * FROM user");

	#get the hash password
	$item=$_POST[password];
    $hash_pswd = exec("python ./hash.py $item");
	$hash_pswd = "'" . $hash_pswd . "'";
	$admin = FALSE;
	$_SESSION['login'] = FALSE;
	$_SESSION['userID'] = -1;

	#loop over user table
	while($row = mysqli_fetch_array($result)) {
		if ($row ['userFirst'] == $_POST[firstname] && $row ['userLast'] == $_POST[lastname] && strval($row['password'])==$hash_pswd){
			$_SESSION['userID'] = $row ['userID'];
			$_SESSION['type'] = $row ['type'];
			$_SESSION['login'] = TRUE;
			if ($row ['type']=="admin"){
				$admin = TRUE;
				echo "Welcome, dear admin " . $row ['userFirst'] . "! You can do anything you want :)";
				header('Location: search.php');
			}
			else{
				echo "Welcome, dear user " . $row ['userFirst'] . "! Unfortunately you are not allowed to change movie data. Feel free to add comments or your favorite movie!";
				header('Location: search.php');
			}
			break;
		}
		echo "<br>";
	}
	if ($_SESSION['login'] == FALSE){
	    echo "<script>
            alert('Please enter a valid user name and password combination');
            window.location.href='index.php';
            </script>";
	}


	// if($_SESSION["type"] === 'admin'){
	// 	echo "yayyyyyyyyyyyy";
	// 	exit;
	// }
	mysqli_close($db_connection);
?>
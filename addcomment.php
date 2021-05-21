<?php
	# start session
	session_start();
	require_once('./library.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
        echo "<script>
              alert('Connection Error!');
              window.location.href='search.php';
              </script>";
	}

	if ($_SESSION['type'] == 'user'){
		###change requires here###
		$movieid = &$_POST[movieid];

		$user = &$_SESSION['userID'];

		###change requires here###
		$comment = str_replace('"', '\"', str_replace("'", "\'", strval($_POST['comment'])));
		$result = mysqli_query($db_connection,"SELECT * FROM comment WHERE userID = $user AND id = $movieid");

		$cnt = mysqli_num_rows($result);
		if ($_POST[operation] == "delete"){
             echo "<script>
                  alert('You are not authorized to perform the action.');
                  window.location.href='search.php';
                  </script>";
		}
		if ($cnt == 0){
			$sql = "INSERT INTO comment (userID, id, comment)
			VALUES
			($user,$movieid,'$comment')";

			if (!mysqli_query($db_connection, $sql)){
				die("Error1: " . mysqli_error($db_connection));
			}
			else{
				echo "success!";
                    echo "<script>
                          alert('Add comment successfully.');
                          window.location.href='search.php';
                          </script>";
			}
		}
		else{
			$row = mysqli_fetch_array($result);
			$prev_comment = $row ['comment'];
			echo "You have already written a comment for this movie: " . $prev_comment;
			echo "<br>";
			echo "your new comment will be updated.";
			echo "<br>";

			$sql = "UPDATE comment
			SET comment = '$comment'
			WHERE userID = $user AND id = $movieid";

			if (!mysqli_query($db_connection, $sql)){
				die("Error2: " . mysqli_error($db_connection));
			}
                    echo "<script>
                          alert('You have already written a comment for this movie, your new comment will be updated.');
                          window.location.href='search.php';
                          </script>";
		}

	}

	elseif ($_SESSION['type'] == 'admin'){

		$result = mysqli_query($db_connection,"SELECT * FROM comment WHERE userID = $_POST[userid] AND id = $_POST[movieid]");
		$cnt = mysqli_num_rows($result);


		if ($_POST[operation] == "delete"){
			if ($cnt == 0){
                echo "<script>
                    alert('Data not exist!');
                    window.location.href='search.php';
                    </script>";
				break;
			}
			$sql = "DELETE FROM comment
			WHERE userID = $_POST[userid] AND id = $_POST[movieid]";

			if (!mysqli_query($db_connection, $sql)){
				echo "<script>
                          alert('Delete Error!');
                          window.location.href='search.php';
                          </script>";
			}
			else{
			    if($_POST[management] == 1){
			        echo "<script>
                        alert('Delete comment successfully!');
                        window.location.href='management.php';
                        </script>";
			    }else{
			        echo "<script>
                        alert('Delete comment successfully!');
                        window.location.href='search.php';
                        </script>";
                 }
			}
		}
		elseif ($_POST[operation] == 'update'){
			if ($cnt == 0){
			    echo "<script>
                    alert('Data not exist!');
                    window.location.href='search.php';
                    </script>";
				break;
			}
			$sql = "DELETE FROM comment
			WHERE userID = $_POST[userid] AND id = $_POST[movieid]";

			if (!mysqli_query($db_connection, $sql)){
				die("Error updating: " . mysqli_error($db_connection));
			}
			else{
                    echo "<script>
                        alert('Update comment successfully!');
                        window.location.href='search.php';
                        </script>";

			}
		}
		elseif ($_POST[operation] == 'add'){
			$movieid = &$_POST[movieid];

			$user = &$_SESSION['userID'];
	        echo $_SESSION['userID'];
			###change requires here###
			$comment = str_replace('"', '\"', str_replace("'", "\'", strval($_POST['comment'])));
	
			$result = mysqli_query($db_connection,"SELECT * FROM comment WHERE userID = $user AND id = $movieid");

			$cnt = mysqli_num_rows($result);
			if ($cnt == 0){
				$sql = "INSERT INTO comment (userID, id, comment)
				VALUES
				($user,$movieid,'$comment')";

				if (!mysqli_query($db_connection, $sql)){
				    echo "<script>
                          alert('Add Error!');
                          window.location.href='search.php';
                          </script>";
				}
				else{
					echo "success!";
                    echo "<script>
                          alert('Add comment successfully');
                          window.location.href='search.php';
                          </script>";
				}
			}
			else{
				$row = mysqli_fetch_array($result);
				$prev_comment = $row ['comment'];
				echo "You have already written a comment for this movie: " . $prev_comment;
				echo "<br>";
				echo "your new comment will be updated.";
				echo "<br>";

				$sql = "UPDATE comment
				SET comment = '$comment'
				WHERE userID = $user AND id = $movieid";

				if (!mysqli_query($db_connection, $sql)){
					echo "<script>
                          alert('Add Error!');
                          window.location.href='search.php';
                          </script>";
				}
                    echo "<script>
                          alert('You have already written a comment for this movie, your new comment will be updated.');
                          window.location.href='search.php';
                          </script>";
			}
		}
	}

	else{
        echo "<script>
              alert('Please log in first!');
              window.location.href='index.php';
              </script>";
	}


	

	// if($_SESSION["type"] === 'admin'){
	// 	echo "yayyyyyyyyyyyy";
	// 	exit;
	// }
	mysqli_close($db_connection);
?>

<?php
session_start();
include_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno()) {
    echo "<script>
          alert('Failed to connecto to MySQL');
          window.location.href='search.php';
          </script>";
}

if ($_SESSION['type'] == 'user'){
     echo "<script>
          alert('You are not authorized to perform the action.');
          window.location.href='search.php';
          </script>";
}
elseif ($_SESSION['type'] == 'admin'){
    $sql_id = "SELECT id FROM movie WHERE title='$_POST[title]'";
    $result = $con->query($sql_id);
    if ($result->num_rows > 0) {
        $num = 0;
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $sql1 = "DELETE FROM basicinfo WHERE id=$id";
            if (!mysqli_query($con, $sql1)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql2 = "DELETE FROM country WHERE id=$id";
            if (!mysqli_query($con, $sql2)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql3 = "DELETE FROM director WHERE id=$id";
            if (!mysqli_query($con, $sql3)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql4 = "DELETE FROM musicby WHERE id=$id";
            if (!mysqli_query($con, $sql4)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql5 = "DELETE FROM producedby WHERE id=$id";
            if (!mysqli_query($con, $sql5)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql6 = "DELETE FROM productioncompany WHERE id=$id";
            if (!mysqli_query($con, $sql6)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql7 = "DELETE FROM rating WHERE id=$id";
            if (!mysqli_query($con, $sql7)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql8 = "DELETE FROM starring WHERE id=$id";
            if (!mysqli_query($con, $sql8)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql9 = "DELETE FROM storyby WHERE id=$id";
            if (!mysqli_query($con, $sql9)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql10 = "DELETE FROM writtenby WHERE id=$id";
            if (!mysqli_query($con, $sql10)) {
                die('Error: ' . mysqli_error($con));
            }
            $sql11 = "DELETE FROM movie WHERE id=$id";
            if (!mysqli_query($con, $sql11)) {
                die('Error: ' . mysqli_error($con));
            }
            $num += 1;
        }
		echo "<script>
              alert('Delete data successfully.');
              window.location.href='search.php';
              </script>";
    }
    else {
          echo "<script>
              alert('Movie not exist');
              window.location.href='deleteMovie.php';
              </script>";
    }
}
else{
    echo "<script>
          alert('Please log in first!');
          window.location.href='index.php';
          </script>";
}

mysqli_close($con);
?>
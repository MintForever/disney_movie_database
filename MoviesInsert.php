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
    $title = str_replace("'", "\'", strval($_POST['title']));
    $sql_init = "INSERT INTO movie (title) VALUES ('$title')";
    if (mysqli_query($con, $sql_init)) {
        $sql_id = "SELECT id FROM movie WHERE title='$title'";
        $result = $con->query($sql_id);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];

                { // Replace ' in str with \'
                    $RunningTime = $_POST['RunningTime'];
                    $year = $_POST['year'];
        
                    $Country = str_replace("'", "\'", strval($_POST['Country']));
        
                    $DirectedbyFirst = str_replace("'", "\'", strval($_POST['DirectedbyFirst']));
                    $DirectedbyLast = str_replace("'", "\'", strval($_POST['DirectedbyLast']));
                    $DirectedbyMiddle = str_replace("'", "\'", "$_POST[DirectedbyMiddle]");
        
                    $MusicbyFirst = str_replace("'", "\'", strval($_POST['MusicbyFirst']));
                    $MusicbyLast = str_replace("'", "\'", strval($_POST['MusicbyLast']));
                    $MusicbyMiddle = str_replace("'", "\'", strval($_POST['MusicbyMiddle']));
        
                    $ProducedbyFirst = str_replace("'", "\'", strval($_POST['ProducedbyFirst']));
                    $ProducedbyLast = str_replace("'", "\'", strval($_POST['ProducedbyLast']));
                    $ProducedbyMiddle = str_replace("'", "\'", strval($_POST['ProducedbyMiddle']));
        
                    $ProductionCompany = str_replace("'", "\'", strval($_POST['ProductionCompany']));
        
                    $rotten_tomatoes = $_POST['rotten_tomatoes'];
                    $imdb = $_POST['imdb'];
        
                    $StarringFirst = str_replace("'", "\'", strval($_POST['StarringFirst']));
                    $StarringLast = str_replace("'", "\'", strval($_POST['StarringLast']));
                    $StarringMiddle = str_replace("'", "\'", strval($_POST['StarringMiddle']));
        
                    $StorybyFirst = str_replace("'", "\'", strval($_POST['StorybyFirst']));
                    $StorybyLast = str_replace("'", "\'", strval($_POST['StorybyLast']));
                    $StorybyMiddle = str_replace("'", "\'", strval($_POST['StorybyMiddle']));
        
                    $WrittenbyFirst = str_replace("'", "\'", strval($_POST['WrittenbyFirst']));
                    $WrittenbyLast = str_replace("'", "\'", strval($_POST['WrittenbyLast']));
                    $WrittenbyMiddle = str_replace("'", "\'", strval($_POST['WrittenbyMiddle']));
                }

                $sql1 = "INSERT INTO basicinfo (id, RunningTime, year) VALUES ($id, $RunningTime, $year)";
                 if (!mysqli_query($con, $sql1)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql2 = "INSERT INTO rating (id, rotten_tomatoes, imdb) VALUES ($id, $rotten_tomatoes, $imdb)";
                 if (!mysqli_query($con, $sql2)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql3 = "INSERT INTO director (id, DirectedbyFirst, DirectedbyLast, DirectedbyMiddle) VALUES ($id, '$DirectedbyFirst', '$DirectedbyLast', '$DirectedbyMiddle')";
                 if (!mysqli_query($con, $sql3)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql4 = "INSERT INTO country (id, Country) VALUES ($id, '$Country')";
                 if (!mysqli_query($con, $sql4)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql5 = "INSERT INTO musicby (id, MusicbyFirst, MusicbyLast, MusicbyMiddle) VALUES ($id, '$MusicbyFirst', '$MusicbyLast', '$MusicbyMiddle')";
                 if (!mysqli_query($con, $sql5)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql6 = "INSERT INTO producedby (id, ProducedbyFirst, ProducedbyLast, ProducedbyMiddle) VALUES ($id, '$ProducedbyFirst', '$ProducedbyLast', '$ProducedbyMiddle')";
                 if (!mysqli_query($con, $sql6)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql7 = "INSERT INTO productioncompany (id, ProductionCompany) VALUES ($id, '$ProductionCompany')";
                 if (!mysqli_query($con, $sql7)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql8 = "INSERT INTO starring (id, StarringFirst, StarringLast, StarringMiddle) VALUES ($id, '$StarringFirst', '$StarringLast', '$StarringMiddle')";
                 if (!mysqli_query($con, $sql8)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql9 = "INSERT INTO storyby (id, StorybyFirst, StorybyLast, StorybyMiddle) VALUES ($id, '$StorybyFirst', '$StorybyLast', '$StorybyMiddle')";
                 if (!mysqli_query($con, $sql9)) {
                    die('Error: ' . mysqli_error($con));
                }
                $sql10 = "INSERT INTO writtenby (id, WrittenbyFirst, WrittenbyLast, WrittenbyMiddle) VALUES ($id, '$WrittenbyFirst', '$WrittenbyLast', '$WrittenbyMiddle')";
                if (!mysqli_query($con, $sql10)) {
                    die('Error: ' . mysqli_error($con));
                }

                echo "<script>
                      alert('Add data successfully.');
                      window.location.href='search.php';
                      </script>";
            }
        }
        else {
              echo "<script>
                    alert('Movie not exist.');
                    window.location.href='search.php';
                    </script>";
        }

    }
    else {
         echo "<script>
                    alert('Movie already exists.');
                    window.location.href='addMovie.php';
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
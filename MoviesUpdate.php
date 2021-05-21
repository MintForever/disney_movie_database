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
    // Identify the movie pending update
    $id = $_POST['movieID'];
    $sql_check = "SELECT id FROM movie WHERE id=$id";
    if (mysqli_query($con, $sql_check)) {
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

            $title = str_replace("'", "\'", strval($_POST['title']));


            $sql1 = "UPDATE basicinfo SET RunningTime=$RunningTime, year=$year WHERE id=$id";
            if (!mysqli_query($con, $sql1)) {
                die('Error 1: ' . mysqli_error($con));
            }
            $sql2 = "UPDATE country SET Country='$Country' WHERE id=$id";
            if (!mysqli_query($con, $sql2)) {
                die('Error 2: ' . mysqli_error($con));
            }
            $sql3 = "UPDATE director SET DirectedbyFirst='$DirectedbyFirst', DirectedbyLast='$DirectedbyLast', DirectedbyMiddle='$DirectedbyMiddle' WHERE id=$id";
            if (!mysqli_query($con, $sql3)) {
                die('Error 3: ' . mysqli_error($con));
            }
            $sql4 = "UPDATE musicby SET MusicbyFirst='$MusicbyFirst', MusicbyLast='$MusicbyLast', MusicbyMiddle='$MusicbyMiddle' WHERE id=$id";
            if (!mysqli_query($con, $sql4)) {
                die('Error 4: ' . mysqli_error($con));
            }
            $sql5 = "UPDATE producedby SET ProducedbyFirst='$ProducedbyFirst', ProducedbyLast='$ProducedbyLast', ProducedbyMiddle='$ProducedbyMiddle' WHERE id=$id";
            if (!mysqli_query($con, $sql5)) {
                die('Error 5: ' . mysqli_error($con));
            }
            $sql6 = "UPDATE productioncompany SET ProductionCompany='$ProductionCompany' WHERE id=$id";
            if (!mysqli_query($con, $sql6)) {
                die('Error 6: ' . mysqli_error($con));
            }
            $sql7 = "UPDATE rating SET rotten_tomatoes=$rotten_tomatoes, imdb=$imdb WHERE id=$id";
            if (!mysqli_query($con, $sql7)) {
                die('Error 7: ' . mysqli_error($con));
            }
            $sql8 = "UPDATE starring SET StarringFirst='$StarringFirst', StarringLast='$StarringLast', StarringMiddle='$StarringMiddle' WHERE id=$id";
            if (!mysqli_query($con, $sql8)) {
                die('Error 8: ' . mysqli_error($con));
            }
            $sql9 = "UPDATE storyby SET StorybyFirst='$StorybyFirst', StorybyLast='$StorybyLast', StorybyMiddle='$StorybyMiddle' WHERE id=$id";
            if (!mysqli_query($con, $sql9)) {
                die('Error 9: ' . mysqli_error($con));
            }
            $sql10 = "UPDATE writtenby SET WrittenbyFirst='$WrittenbyFirst', WrittenbyLast='$WrittenbyLast', WrittenbyMiddle='$WrittenbyMiddle' WHERE id=$id";
            if (!mysqli_query($con, $sql10)) {
                die('Error 10: ' . mysqli_error($con));
            }
            $sql11 = "UPDATE movie SET title='$title' WHERE id=$id";
            if (!mysqli_query($con, $sql11)) {
                die('Error 11: ' . mysqli_error($con));
            }

            $sql_rmdup_country = "SELECT DISTINCT * FROM country";
            $resultnodp_country = $con->query($sql_rmdup_country);

            $sql_rmdup_director = "SELECT DISTINCT * FROM director";
            $resultnodp_director = $con->query($sql_rmdup_director);

            $sql_rmdup_musicby = "SELECT DISTINCT * FROM musicby";
            $resultnodp_musicby = $con->query($sql_rmdup_musicby);

            $sql_rmdup_productioncompany = "SELECT DISTINCT * FROM productioncompany";
            $resultnodp_productioncompany = $con->query($sql_rmdup_productioncompany);

            $sql_rmdup_producedby = "SELECT DISTINCT * FROM producedby";
            $resultnodp_producedby = $con->query($sql_rmdup_producedby);

            $sql_rmdup_starring = "SELECT DISTINCT * FROM starring";
            $resultnodp_starring = $con->query($sql_rmdup_starring);

            $sql_rmdup_storyby = "SELECT DISTINCT * FROM storyby";
            $resultnodp_storyby = $con->query($sql_rmdup_storyby);

            $sql_rmdup_writtenby = "SELECT DISTINCT * FROM writtenby";
            $resultnodp_writtenby = $con->query($sql_rmdup_writtenby);

            $sql91 = "DELETE FROM director WHERE 1";
            if (!mysqli_query($con, $sql91)) {
                die('Error 91: ' . mysqli_error($con));
            }
            $sql92 = "DELETE FROM musicby WHERE 1";
            if (!mysqli_query($con, $sql92)) {
                die('Error 92: ' . mysqli_error($con));
            }
            $sql93 = "DELETE FROM productioncompany WHERE 1";
            if (!mysqli_query($con, $sql93)) {
                die('Error 93: ' . mysqli_error($con));
            }
            $sql94 = "DELETE FROM producedby WHERE 1";
            if (!mysqli_query($con, $sql94)) {
                die('Error 94: ' . mysqli_error($con));
            }
            $sql95 = "DELETE FROM starring WHERE 1";
            if (!mysqli_query($con, $sql95)) {
                die('Error 95: ' . mysqli_error($con));
            }
            $sql96 = "DELETE FROM storyby WHERE 1";
            if (!mysqli_query($con, $sql96)) {
                die('Error 96: ' . mysqli_error($con));
            }
            $sql97 = "DELETE FROM writtenby WHERE 1";
            if (!mysqli_query($con, $sql97)) {
                die('Error 97: ' . mysqli_error($con));
            }
            $sql98 = "DELETE FROM country WHERE 1";
            if (!mysqli_query($con, $sql98)) {
                die('Error 98: ' . mysqli_error($con));
            }

            while ($row_country = $resultnodp_country->fetch_assoc()) {
                $tempID = $row_country['id'];
                $tempCountry = $row_country['Country'];
                $sql_ins = "INSERT INTO country (id, Country) VALUES ($tempID,'$tempCountry')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 1: ' . mysqli_error($con));
                }
            }
            while ($row_director = $resultnodp_director->fetch_assoc()) {
                $tempID = $row_director['id'];
                $tempFirst = str_replace("'", "\'", strval($row_director['DirectedbyFirst']));
                $tempLast = str_replace("'", "\'", strval($row_director['DirectedbyLast']));
                $tempMiddle = str_replace("'", "\'", strval($row_director['DirectedbyMiddle']));
                $sql_ins = "INSERT INTO director (id, DirectedbyFirst, DirectedbyLast, DirectedbyMiddle) VALUES ($tempID,'$tempFirst','$tempLast','$tempMiddle')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 2: ' . mysqli_error($con));
                }
            }
            while ($row_musicby = $resultnodp_musicby->fetch_assoc()) {
                $tempID = $row_musicby['id'];
                $tempFirst = str_replace("'", "\'", strval($row_musicby['MusicbyFirst']));
                $tempLast = str_replace("'", "\'", strval($row_musicby['MusicbyLast']));
                $tempMiddle = str_replace("'", "\'", strval($row_musicby['MusicbyMiddle']));
                $sql_ins = "INSERT INTO musicby (id, MusicbyFirst, MusicbyLast, MusicbyMiddle) VALUES ($tempID,'$tempFirst','$tempLast','$tempMiddle')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 3: ' . mysqli_error($con));
                }
            }
            while ($row_productioncompany = $resultnodp_productioncompany->fetch_assoc()) {
                $tempID = $row_productioncompany['id'];
                $tempCompany = $row_productioncompany['ProductionCompany'];
                $sql_ins = "INSERT INTO productioncompany (id, ProductionCompany) VALUES ($tempID,'$tempCompany')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 4: ' . mysqli_error($con));
                }
            }
            while ($row_producedby = $resultnodp_producedby->fetch_assoc()) {
                $tempID = $row_producedby['id'];
                $tempFirst = str_replace("'", "\'", strval($row_producedby['ProducedbyFirst']));
                $tempLast = str_replace("'", "\'", strval($row_producedby['ProducedbyLast']));
                $tempMiddle = str_replace("'", "\'", strval($row_producedby['ProducedbyMiddle']));
                $sql_ins = "INSERT INTO producedby (id, ProducedbyFirst, ProducedbyLast, ProducedbyMiddle) VALUES ($tempID,'$tempFirst','$tempLast','$tempMiddle')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 5: ' . mysqli_error($con));
                }
            }
            while ($row_starring = $resultnodp_starring->fetch_assoc()) {
                $tempID = $row_starring['id'];
                $tempFirst = str_replace("'", "\'", strval($row_starring['StarringFirst']));
                $tempLast = str_replace("'", "\'", strval($row_starring['StarringLast']));
                $tempMiddle = str_replace("'", "\'", strval($row_starring['StarringMiddle']));
                $sql_ins = "INSERT INTO starring (id, StarringFirst, StarringLast, StarringMiddle) VALUES ($tempID,'$tempFirst','$tempLast','$tempMiddle')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 6: ' . mysqli_error($con));
                }
            }
            while ($row_storyby = $resultnodp_storyby->fetch_assoc()) {
                $tempID = $row_storyby['id'];
                $tempFirst = str_replace("'", "\'", strval($row_storyby['StorybyFirst']));
                $tempLast = str_replace("'", "\'", strval($row_storyby['StorybyLast']));
                $tempMiddle = str_replace("'", "\'", strval($row_storyby['StorybyMiddle']));
                $sql_ins = "INSERT INTO storyby (id, StorybyFirst, StorybyLast, StorybyMiddle) VALUES ($tempID,'$tempFirst','$tempLast','$tempMiddle')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 7: ' . mysqli_error($con));
                }
            }
            while ($row_writtenby = $resultnodp_writtenby->fetch_assoc()) {
                $tempID = $row_writtenby['id'];
                $tempFirst = str_replace("'", "\'", strval($row_writtenby['WrittenbyFirst']));
                $tempLast = str_replace("'", "\'", strval($row_writtenby['WrittenbyLast']));
                $tempMiddle = str_replace("'", "\'", strval($row_writtenby['WrittenbyMiddle']));
                $sql_ins = "INSERT INTO writtenby (id, WrittenbyFirst, WrittenbyLast, WrittenbyMiddle) VALUES ($tempID,'$tempFirst','$tempLast','$tempMiddle')";
                if (!mysqli_query($con, $sql_ins)) {
                    die('Error ins 8: ' . mysqli_error($con));
                }
            }
            echo "<script>
                  alert('Add data successfully.');
                  window.location.href='search.php';
                  </script>";
    }
    else {
         echo "<script>
                alert('Movie doesn't exist');
                window.location.href='updateSearch.php';
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
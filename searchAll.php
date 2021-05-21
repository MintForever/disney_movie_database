<html lang="en">
<head>
  <title>Search All</title>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design for Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  font-family: 'Josefin Sans', sans-serif;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>

</head>
<?php include('head.php');
      session_start();
      ini_set('default_charset', 'windows-1252');?>
  <body>
    <div id="page-container">
        <form method="post" class="example" action="searchAll.php">
            <input type="text" placeholder="Search all.." name="searchAll">
            <button type="submit">search</button>
        </form>
       <a href = "search.php"><button class="btn tempting-azure-gradient float-right">Bock to home</button></a>
        <h2>Search <?php echo $_POST["searchALL"]; ?> from all data</h2>
    <div id="result">
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr class ="juicy-peach-gradient ">
            <th>ID</th>
            <th>Title</th>
            <th>RunningTime</th>
            <th>year</th>
            <th>company_name</th>
            <th>rotten_tomatoes</th>
            <th>imdb</th>
            <th>director_name</th>
            <th>starring_name</th>
            <th>musicby_name</th>
            <th>storyby_name</th>
            <th>writtenby_name</th>
            <th>detail</th>
            </tr>
        </thead>
            <tbody>
            <?php
                require_once('./library.php');
                $string = $_POST["searchAll"];
                $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                mysqli_query("SET CHARACTER_SET_CLIENT='utf8'",$db_connection);
                mysqli_query("SET CHARACTER_SET_RESULTS='utf8'",$db_connection);
                mysqli_query("SET CHARACTER_SET_CONNECTION='utf8'",$db_connection);
                $result = mysqli_query($db_connection,"SELECT movie.id, title, RunningTime, year, country, director_name, musicby_name, producedby_name, company_name, rotten_tomatoes, imdb, starring_name, storyby_name, writtenby_name
                                                        FROM movie LEFT JOIN basicinfo ON movie.id=basicinfo.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(Country SEPARATOR ', ') AS country FROM country GROUP BY id) AS countries ON movie.id=countries.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(name SEPARATOR ', ') AS director_name FROM (SELECT id, CONCAT_WS(' ', DirectedbyFirst, DirectedbyLast) AS name FROM director) AS Directedby_Name GROUP BY id) AS director_names ON movie.id=director_names.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(name SEPARATOR ', ') AS musicby_name FROM (SELECT id, CONCAT_WS(' ', MusicbyFirst, MusicbyLast) AS name FROM musicby) AS Musicby_Name GROUP BY id) AS musicby_names ON movie.id=musicby_names.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(name SEPARATOR ', ') AS producedby_name FROM (SELECT id, CONCAT_WS(' ', ProducedbyFirst, ProducedbyLast) AS name FROM producedby) AS Producedby_Name GROUP BY id) AS producedby_names ON movie.id=producedby_names.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(ProductionCompany SEPARATOR ', ') AS company_name FROM productioncompany GROUP BY id) AS company_names ON movie.id=company_names.id
                                                        LEFT JOIN rating ON movie.id=rating.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(name SEPARATOR ', ') AS starring_name FROM (SELECT id, CONCAT_WS(' ', StarringFirst, StarringLast) AS name FROM starring) AS Starring_Name GROUP BY id) AS starring_names ON movie.id=starring_names.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(name SEPARATOR ', ') AS storyby_name FROM (SELECT id, CONCAT_WS(' ', StorybyFirst, StorybyLast) AS name FROM storyby) AS Storyby_Name GROUP BY id) AS storyby_names ON movie.id=storyby_names.id
                                                        LEFT JOIN (SELECT id, GROUP_CONCAT(name SEPARATOR ', ') AS writtenby_name FROM (SELECT id, CONCAT_WS(' ', WrittenbyFirst, WrittenbyLast) AS name FROM writtenby) AS Writtenby_Name GROUP BY id) AS writtenby_names ON movie.id=writtenby_names.id
                                                        WHERE (title LIKE '%$string%') OR
                                                        (country LIKE '%$string%') OR
                                                        (director_name LIKE '%$string%') OR
                                                        (musicby_name LIKE '%$string%') OR
                                                        (producedby_name LIKE '%$string%') OR
                                                        (company_name LIKE '%$string%') OR
                                                        (starring_name LIKE '%$string%') OR
                                                        (storyby_name LIKE '%$string%') OR
                                                        (writtenby_name LIKE '%$string%')
                ");
                while($row = mysqli_fetch_array($result)) {
                ?><tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['RunningTime']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['rotten_tomatoes']; ?></td>
                    <td><?php echo $row['imdb']; ?></td>
                    <td><?php echo $row['director_name']; ?></td>
                    <td><?php echo $row['starring_name']; ?></td>
                    <td><?php echo $row['musicby_name']; ?></td>
                    <td><?php echo $row['storyby_name']; ?></td>
                    <td><?php echo $row['writtenby_name']; ?></td>
                    <td>
                    <form method="post" action="comment.php">
                        <input type="hidden" name="detail" value="<?php echo $row['id']; ?>">
                        <button class="btn night-fade-gradient" type="submit">MORE</button>
                    </form></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </div>
    </div>
  </body>


</html>









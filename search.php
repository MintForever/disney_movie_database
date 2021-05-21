<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
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


/* Dropdown Button */
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
</head>
<?php include('head.php');
      ini_set('default_charset', 'windows-1252');
      session_start();?>

  <body>
    <div id="page-container">
    <div id="content-wrap">
    <div class="container text-dark mt-5">
        <div class="row justify-content-md-center">
          <div class="col-md-12 bg-grey p-3">

                    <div class="jumbotron border shadow">
                        <div class="row">
                            <div class="col-md-8 offset-2">

                                    <div class="mb-3">
                                        <form method=POST action="searchAll.php" class="form-inline mr-auto">
                                        <input class="form-control form-control-lg" type="text" placeholder="Search" name="searchAll" size="52">
                                        <button class="btn tempting-azure-gradient my-2 my-sm-0" type="submit">Search ALL</button>
                                        </form>
                                        <div class="dropdown float-right">
                                            <p>Or show all data by:
                                            <button class="btn dusty-grass-gradient">menu</button>
                                            <div class="dropdown-content">
                                                <a href="sortByAlpASC.php">Title in ASC</a>
                                                <a href="sortByAlpDESC.php">Title in DESC</a>
                                                <a href="sortByIMDB_ASC.php">IMDB in ASC</a>
                                                <a href="sortByIMDB_DESC.php">IMDB in DESC</a>
                                                <a href="sortByRT_ASC.php">Rotten tomatoes in ASC</a>
                                                <a href="sortByRT_DESC.php">Rotten tomatoes in DESC</a>
                                                <a href="sortByYear_ASC.php">Year in ASC</a>
                                                <a href="sortByYear_DESC.php">Year in DESC</a>
                                            </div></p>
                                        </div>
                                    </div>
                                    <?php session_start();
                                          if($_SESSION['type']=="admin" && $_SESSION['login']== TRUE){?>
                                          <a href="addMovie.php"><button class="btn aqua-gradient">Add</button></a>
                                          <a href="deleteMovie.php"><button class="btn young-passion-gradient">Delete</button></a>
                                          <a href="updateSearch.php"><button class="btn peach-gradient">Update</button></a>
                                    <?php }?>
                            </div>
                        </div>
                    </div>
          </div>
        </div>
    </div>
    <div id="Nameresult">
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr class ="juicy-peach-gradient ">
            <th>ID</th>
            <th>Title</th>
            <th>Length</th>
            <th>Staring</th>
            <th>Year</th>
            <th>Rotten tomatoes</th>
            <th>IMDB</th>
            <th>Avg rating</th>
            <th>Detail</th>
            </tr>
        </thead>
            <tbody>
            <?php
                global $db;
                require_once('./library.php');
                $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                $result = mysqli_query($db_connection,"SELECT movie.id, title, RunningTime, year, country, director_name, musicby_name, producedby_name, company_name, rotten_tomatoes, imdb, rating.avgRating, starring_name, storyby_name, writtenby_name
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
                ");
                while($row = mysqli_fetch_array($result)) {
                ?><tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['RunningTime']; ?></td>
                    <td><?php echo $row['starring_name']; ?> </td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['rotten_tomatoes']; ?></td>
                    <td><?php echo $row['imdb']; ?></td>
                    <td><?php echo $row['avgRating']; ?></td>
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








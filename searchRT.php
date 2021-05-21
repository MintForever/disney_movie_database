<html lang="en">
<head>
  <title>Search Title</title>
  <meta charset="utf-8">
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
      session_start();?>
  <body>
    <div id="page-container">
        <form method="post" class="example" action="searchRT.php">
            <input type="text" placeholder="Search by rotten tomatoes score(example: 7.8, 6.0).." name="search">
            <button type="submit">search</button>
        </form>
        <a href = "search.php"><button class="btn tempting-azure-gradient float-right">Bock to home</button></a>
        <h2>Search <?php echo $_POST["search"]; ?> by title</h2>
    <div id="result">
        <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr class ="juicy-peach-gradient ">
            <th>ID</th>
            <th>Title</th>
            <th>Rotten tomatoes</th>
            <th>Detail</th>
            </tr>
        </thead>
            <tbody>
            <?php
                require_once('./library.php');
                $string = $_POST["search"];
                $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                $result = mysqli_query($db_connection,"SELECT rating.id, rating.rotten_tomatoes, movie.title FROM rating LEFT JOIN movie ON rating.id = movie.id WHERE rotten_tomatoes LIKE '%$string%'");
                while($row = mysqli_fetch_array($result)) {
                ?><tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['rotten_tomatoes']; ?></td>
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









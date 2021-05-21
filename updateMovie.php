<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Movie</title>
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
          user-select: none;
          font-family: 'Josefin Sans', sans-serif;
        }

         body {
            background-image: url('image/AUD.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .wrapper {
          margin: 0px auto 0;
          width: 100%;
          max-width: 1000px;
          padding: 20px;
          box-sizing: border-box;
        }

        /* content */
        .content {
          text-align: center;
        }

        .content h1 {
          letter-spacing: 1px;
        }


        /* form */

        .top-form,
        .middle-form,
        .bottom-form {
          width: 100%;
          min-height: 65px;
          margin: 10px 0;
        }

        .form input[type="text"],
        .form textarea {
          border: 2px solid #fff;
          padding: 10px 5px;
          outline: none;
          border-radius: 2px;
          width: 100%;
          transition: all 0.2s ease;
        }

        .form input:focus,
        .form textarea:focus {
          border-color: #4ca1af;
          outline: none;
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.0125),
            0 0 8px rgba(76, 161, 175, 0.5);
        }

        .form .label {
          margin-bottom: 5px;
          text-transform: capitalize;
        }

        /* top-contact */
        .top-form .inner-form {
          width: 29.9%;
          float: left;
          margin-right: 5%;
        }

        .top-form .inner-form:last-child {
          margin-right: 0;
        }


        /* middle-form */
        .middle-form {
          clear: both;
        }

        /* bottom-form */
        .bottom-form textarea {
          height: 80px;
        }

        ::-webkit-input-placeholder {

        }
        ::-moz-placeholder {

        }
        :-ms-input-placeholder {

        }

        @media screen and (max-width: 460px) {
          .top-form .inner-form {
            width: 100%;
            margin: 5px 0;
          }
          .top-form,
          .middle-form,
          .bottom-form {
            margin: 5px 0;
          }
          .form {
            margin-top: 10px;
          }
        }
 </style>

</head>
<?php include('head.php');
      session_start();
      if($_SESSION['type']=="user"){
          echo "<script>
              alert('You are not authorized to perform the action.');
              window.location.href='search.php';
              </script>";
      }else if($_SESSION['login']== FALSE){
          echo "<script>
              alert('You are not authorized to perform the action.');
              window.location.href='index.php';
              </script>";
      }?>
<body>
  <div class="wrapper">
    <div class="content">
        <h1>Update Movie</h1>
        <p>Please FILL the information of the movie to update, title, length ,IMDB, Rotten tomatoes and year are required</p>
        <p>For IMDB and Rotten tomatoes, leave 0.0 if unknow</p>
    </div>

    <?php
        require_once('./library.php');
        $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
        $string = $_POST["titleToUpdate"];
        $exist = mysqli_query($db_connection, "SELECT id FROM movie WHERE title='$string'");
        if (!mysqli_fetch_array($exist)) {
            echo "<script>
              alert('Movie not exist!');
              window.location.href='updateSearch.php';
              </script>";
        }

        $result = mysqli_query($db_connection,"SELECT movie.id, title, RunningTime, year, Country, director_first, director_last, director_middle, musicby_first, musicby_last, musicby_middle, producedby_first, producedby_last, producedby_middle, company_name, rotten_tomatoes, imdb, starring_first, starring_last, starring_middle, storyby_first, storyby_last, storyby_middle, writtenby_first, writtenby_last, writtenby_middle
                                                FROM movie LEFT JOIN basicinfo ON movie.id=basicinfo.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(Country SEPARATOR ', ') AS country FROM country GROUP BY id) AS countries ON movie.id=countries.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(DirectedbyFirst SEPARATOR ', ') AS director_first, GROUP_CONCAT(DirectedbyLast SEPARATOR ', ') AS director_last, GROUP_CONCAT(DirectedbyMiddle SEPARATOR ', ') AS director_middle FROM (SELECT id, DirectedbyFirst, DirectedbyLast, DirectedbyMiddle FROM director) AS Directedby_Name GROUP BY id) AS director_names ON movie.id=director_names.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(MusicbyFirst SEPARATOR ', ') AS musicby_first, GROUP_CONCAT(MusicbyLast SEPARATOR ', ') AS musicby_last, GROUP_CONCAT(MusicbyMiddle SEPARATOR ', ') AS musicby_middle FROM (SELECT id, MusicbyFirst, MusicbyLast, MusicbyMiddle FROM musicby) AS Musicby_Name GROUP BY id) AS musicby_names ON movie.id=musicby_names.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(ProducedbyFirst SEPARATOR ', ') AS producedby_first, GROUP_CONCAT(ProducedbyLast SEPARATOR ', ') AS producedby_last, GROUP_CONCAT(ProducedbyMiddle SEPARATOR ', ') AS producedby_middle FROM (SELECT id, ProducedbyFirst, ProducedbyLast, ProducedbyMiddle FROM producedby) AS Producedby_Name GROUP BY id) AS producedby_names ON movie.id=producedby_names.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(ProductionCompany SEPARATOR ', ') AS company_name FROM productioncompany GROUP BY id) AS company_names ON movie.id=company_names.id
                                                LEFT JOIN rating ON movie.id=rating.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(StarringFirst SEPARATOR ', ') AS starring_first, GROUP_CONCAT(StarringLast SEPARATOR ', ') AS starring_last, GROUP_CONCAT(StarringMiddle SEPARATOR ', ') AS starring_middle FROM (SELECT id, StarringFirst, StarringLast, StarringMiddle FROM starring) AS Starring_Name GROUP BY id) AS starring_names ON movie.id=starring_names.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(StorybyFirst SEPARATOR ', ') AS storyby_first, GROUP_CONCAT(StorybyLast SEPARATOR ', ') AS storyby_last, GROUP_CONCAT(StorybyMiddle SEPARATOR ', ') AS storyby_middle FROM (SELECT id, StorybyFirst, StorybyLast, StorybyMiddle FROM storyby) AS Storyby_Name GROUP BY id) AS storyby_names ON movie.id=storyby_names.id
                                                LEFT JOIN (SELECT id, GROUP_CONCAT(WrittenbyFirst SEPARATOR ', ') AS writtenby_first, GROUP_CONCAT(WrittenbyLast SEPARATOR ', ') AS writtenby_last, GROUP_CONCAT(WrittenbyMiddle SEPARATOR ', ') AS writtenby_middle FROM (SELECT id, WrittenbyFirst, WrittenbyLast, WrittenbyMiddle FROM writtenby) AS Writtenby_Name GROUP BY id) AS writtenby_names ON movie.id=writtenby_names.id
                                                WHERE movie.id=(SELECT id FROM movie WHERE title='$string')
                                                ");
        $row = mysqli_fetch_array($result);
    ?>

    <div class="form">
      <form action = 'MoviesUpdate.php' method='post'>
        <input type="hidden" name="movieID" value ="<?php echo $row['id'];?>">
        <div class="middle-form">
          <div class="inner-form">
            <div class="label">Title</div>
            <input type="text" placeholder="..." value = "<?php echo $row['title'];?>" name = 'title' required>
          </div>
        </div></br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Rotten tomatoes</div>
            <input type="text" placeholder="8.0" pattern="[0-9]+([\.][0-9]{0,2})?"  name = 'rotten_tomatoes' value = "<?php echo $row['rotten_tomatoes'];?>"required>
          </div>
          <div class="inner-form">
            <div class="label">IMDB</div>
            <input type="text" placeholder="8.0" pattern="[0-9]+([\.][0-9]{0,2})?"  name = 'imdb' value = "<?php echo $row['imdb'];?>"required>
          </div>
          <div class="inner-form">
            <div class="label">Country</div>
            <input type="text" placeholder="U.S." name = 'Country' value = "<?php echo $row['Country'];?>">
          </div>
        </div></br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Length(mins)</div>
            <input type="text" placeholder=" 112" pattern="[0-9]+" name = 'RunningTime'  value = "<?php echo $row['RunningTime'];?>"required>
          </div>
          <div class="inner-form">
            <div class="label">year</div>
            <input type="text" placeholder="2012" pattern="[0-9]+" name = 'year' value = "<?php echo $row['year'];?>" required>
          </div>
          <div class="inner-form">
            <div class="label">Production Company</div>
            <input type="text" placeholder="Walt Disney Pictures" name = 'ProductionCompany' value = "<?php echo $row['company_name'];?>">
          </div>
        </div>
        </br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Directed by First</div>
            <input type="text" placeholder=" Jonathan"name = 'DirectedbyFirst' value = "<?php echo $row['director_first'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Directed by Last</div>
            <input type="text" placeholder="Jostar" name = 'DirectedbyLast' value = "<?php echo $row['director_last'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Directed by Middle</div>
            <input type="text" placeholder="Dio" name = 'DirectedbyMiddle' value = "<?php echo $row['director_middle'];?>">
          </div>
        </div>
        </br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Starring First</div>
            <input type="text" placeholder=" Jonathan" name = 'StarringFirst' value = "<?php echo $row['starring_first'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Starring Last</div>
            <input type="text" placeholder="Jostar" name = 'StarringLast' value = "<?php echo $row['starring_last'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Starring Middle</div>
            <input type="text" placeholder="Dio" name = 'StarringMiddle' value = "<?php echo $row['starring_middle'];?>">
          </div>
        </div>
        </br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Music by First</div>
            <input type="text" placeholder=" Jonathan" name = 'MusicbyFirst' value = "<?php echo $row['musicby_first'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Music by Last</div>
            <input type="text" placeholder="Jostar" name = 'MusicbyLast' value = "<?php echo $row['musicby_last'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Music by Middle</div>
            <input type="text" placeholder="Dio" name = 'MusicbyMiddle' value = "<?php echo $row['musicby_middle'];?>">
          </div>
        </div>
        </br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Produced by First</div>
            <input type="text" placeholder=" Jonathan" name = 'ProducedbyFirst' value = "<?php echo $row['producedby_first'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Produced by Last</div>
            <input type="text" placeholder="Jostar" name = 'ProducedbyLast' value = "<?php echo $row['producedby_last'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Produced by Middle</div>
            <input type="text" placeholder="Dio" name = 'ProducedbyMiddle' value = "<?php echo $row['producedby_middle'];?>">
          </div>
        </div>
        </br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Story by First</div>
            <input type="text" placeholder=" Jonathan" name = 'StorybyFirst' value = "<?php echo $row['storyby_first'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Story by Last</div>
            <input type="text" placeholder="Jostar" name = 'StorybyLast' value = "<?php echo $row['storyby_last'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Story by Middle</div>
            <input type="text" placeholder="Dio" name = 'StorybyMiddle' value = "<?php echo $row['storyby_middle'];?>">
          </div>
        </div>
        </br>

        <div class="top-form">
          <div class="inner-form">
            <div class="label">Written by First</div>
            <input type="text" placeholder=" Jonathan" name = 'WrittenbyFirst' value = "<?php echo $row['writtenby_first'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Written by Last</div>
            <input type="text" placeholder="Jostar" name = 'WrittenbyLast' value = "<?php echo $row['writtenby_last'];?>">
          </div>
          <div class="inner-form">
            <div class="label">Written by Middle</div>
            <input type="text" placeholder="Dio" name = 'WrittenbyMiddle' value = "<?php echo $row['writtenby_middle'];?>">
          </div>
        </div>
        <button class="btn peach-gradient btn-lg float-right" type="submit">Add</button>
      </form>
      </br></br>
       <a href = "search.php"><button class="btn tempting-azure-gradient btn-sm float-left">Bock to home</button></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
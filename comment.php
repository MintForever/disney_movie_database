<html lang="en">
<head>
  <title>Movie Detail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf8mb4" />
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

body {
            background-image: url('image/detail.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: bottom;
}

.wrapper{
  position: absolute;
  top: 1500%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 950px;
  display: flex;
  box-shadow: 0 1px 20px 0 rgba(69,90,100,.08);
}

.wrapper .left{
  width: 35%;
  background: linear-gradient(to right,#01a9ac,#01dbdf);
  padding: 30px 25px;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  text-align: center;
  color: #fff;
}

.wrapper .left img{
  border-radius: 5px;
  margin-bottom: 10px;
}

.wrapper .left h4{
  margin-bottom: 10px;
}

.wrapper .left p{
  font-size: 12px;
}

.wrapper .right{
  width: 100%;
  background: #fff;
  padding: 30px 25px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}

.wrapper .right .info,
.wrapper .right .projects{
  margin-bottom: 25px;
}

.wrapper .right .info h3,
.wrapper .right .projects h3{
    margin-bottom: 15px;
    padding-bottom: 5px;
    border-bottom: 1px solid #e0e0e0;
    color: #353c4e;
  text-transform: uppercase;
  letter-spacing: 5px;
}

.wrapper .right .info_data,
.wrapper .right .projects_data{
  display: flex;
  justify-content: space-between;
}

.wrapper .right .info_data .data,
.wrapper .right .projects_data .data{
  width: 45%;
}

.wrapper .right .info_data .data h4,
.wrapper .right .projects_data .data h4{
    color: #353c4e;
    margin-bottom: 5px;
}

.wrapper .right .info_data .data p,
.wrapper .right .projects_data .data p{
  font-size: 13px;
  margin-bottom: 10px;
  color: #919aa3;
}

.wrapper .social_media ul{
  display: flex;
}

.wrapper .social_media ul li{
  width: 100px;
  height: 45px;
  background: linear-gradient(to right,#01a9ac,#01dbdf);
  margin-right: 10px;
  border-radius: 5px;
  text-align: center;
  line-height: 45px;
}

.wrapper .social_media ul li a{
  color :#fff;
  display: block;
  font-size: 18px;
}
 </style>

</head>
<?php include('head.php');
      session_start();
      //ini_set('default_charset', 'windows-1252');
      ini_set('default_charset', 'utf8mb4');?>
  <body>
    <div id="page-container">
        <div id="content-wrap">
            <div class="container text-dark mt-5">
                <div class="row justify-content-md-center">
                    <div class="col-md-12 bg-grey p-3">
                        <?php

                            session_start();
                            require_once('./library.php');
                            $string = $_POST["detail"];
                            $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
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
                                                                    WHERE movie.id='$string'
                                                                    ");
                            $row = mysqli_fetch_array($result);
                            ?>

                            <div class="wrapper">
                                <div class="left">
                                    <br/><br/>
                                    <h1><?php echo $row['title'];?></h1>
                                    <br/><br/>
                                    <h4><?php echo $row['RunningTime']; ?> mins</h4>
                                    <br/>
                                    <h4>Director: <?php echo $row['director_name'];?></h4>
                                    <h4>Published year: <?php echo $row['year']; ?></h4>
                                    <h4><?php echo $row['country']; ?></h4>
                                </div>
                                <div class="right">
                                    <div class="info">
                                        <h3>Production company: <?php echo $row['company_name'];?></h3>
                                        <div class="info_data">
                                            <div class="data">
                                                <h4>Rotten tomatoes</h4>
                                                <h5><?php echo $row['rotten_tomatoes'];?><h5>
                                            </div>
                                            <div class="data">
                                                <h4>IMDB</h4>
                                                <h5><?php echo $row['imdb'];?><h5>
                                            </div>
                                        </div>
                                    </div>
                                <div class="projects">
                                    <h3>Staring: </h3>
                                    <div class="projects_data">
                                        <div class="data">
                                            <h5><?php
                                            echo $row['starring_name'];?><h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="projects">
                                    <div class="projects_data">
                                        <div class="data">
                                            <h4>Music by</h4>
                                            <h5><?php echo $row['musicby_name'];?><h5>
                                        </div>
                                    <div class="data">
                                        <h4>Story by</h4>
                                        <h5><?php echo $row['storyby_name'];?><h5>
                                    </div>
                                    <div class="data">
                                        <h4>Produced by</h4>
                                        <h5><?php echo $row['producedby_name'];?><h5>
                                    </div>
                                    <div class="data">
                                        <h4>Written by</h4>
                                        <h5><?php echo $row['writtenby_name'];?><h5>
                                    </div>
                                </div>


                            </div>
                            <div class="social_media">
                                <form action = 'addfavorite.php' method='post'>
                                        <input type='hidden' name='operation' value='add' />
                                        <input type='hidden' name='movieid' value='<?php echo $string; ?>' />
                                        <button class="btn lady-lips-gradient" type = 'submit'>Love it!</button>
                                </form>

                                <div class="form-group purple-border">
                                    <form action = 'addcomment.php' method='post' id="confirmationText">
                                    <input type='hidden' name='operation' value='add'/>
                                    <input type = 'hidden'  name = 'movieid' value='<?php echo $_POST["detail"]; ?>'  />
                                    <textarea class="form-control" type = 'text' rows="4" cols="50" name="comment" placeholder="leave a comment" id="confirmationText"></textarea>
                                    <div class="col-md-12 text-center"><button class="btn tempting-azure-gradient" type = 'submit'>submit</button></div>
                                    </form></div>

                                <ul><?php
                                    $comment = mysqli_query($db_connection,"SELECT userFirst, userLast, comment FROM user NATURAL JOIN comment WHERE id= '$string'");
                                    while($c = mysqli_fetch_array($comment)) {
                                ?>
		                                <div class="card">
			                                <div class="card-body">
				                                <h3><?php echo $c['userFirst'];?>  <?php echo $c['userLast'];?></h3>
				                                <h5>Says: <?php echo $c['comment'];?></h5>
			                                </div>
		                                </div>
                            <?php }?></ul>
                            <?php if ($_SESSION['type'] == 'admin'){?>
                            <div class="form-group">
                                    <form class="float-right" action = 'addcomment.php' method='post'>
                                        <input type="hidden" name='operation' value='delete' />
                                        <p>User id to delete: <input type = 'text'  name = 'userid' /></p>
                                        <input type = 'hidden'  name = 'movieid' value='<?php echo $_POST["detail"]; ?>' /></p>
                                        <button class="btn young-passion-gradient btn-lg float-right" type="submit">delete comment</button>
                                    </form>


                            </div>
                            <?php }?>
                            </br>
                            <a href = "search.php"><button class="btn tempting-azure-gradient btn-sm float-left">Bock to home</button></a>
                         </div>
                    </div>
                </div>
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
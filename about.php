<html lang="en">
<head>
  <title>MATA</title>
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
        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
          float: left;
          width: 25%;
          padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {margin: 0 -5px;}

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* Style the counter cards */
        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
          padding: 16px;
          text-align: center;
          background-color: #f1f1f1;
        }

        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 600px) {
          .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
          }
        }
        .avatar img {
            border-radius: 50%;
            width: 160px;
            height: 160px;
            margin-top: 5%;
            object-fit: cover;
            object-position: 0 0px;
        }
</style>
</head>
<body>

<br>
<div class="jumbotron heavy-rain-gradient">
  <div class="container">
      <h3>Welcome, here is</h3>
        <h1 class="display-4">Database of 21st Century Disney Movies</h1>
            <div class="card">
                <div class="card-body">
The purpose of this database is to introduce all Disney feature-length films, including works that were shown in theaters, premiered on television, directly released audio-visual products, or launched on digital platforms. The movies introduced in this database are all released under the Disney brand names. The content is widely used in Disney-related fields (such as the works of Marvel and Lucasfilm). Since Disney has produced movies for decades, the total number of movies are astronomical. We will only include Disney movies after the 21st century and it will continue to be updated.
</div><div class="card-body">All the movies in this database are arranged by the first letter of the English title. Some Disney movies have titles in different languages when they are aired in different places. The library will only consider English titles released in the United States.
</div><div class="card-body">In the database, we will provide a variety of different query methods to provide users with sufficient information. For each movie, users can find out the movie name, duration, release time, and which countries and regions the movie is available in. Secondly, we will also collect the ratings of this film in different professional film rating agencies, including Rotten Tomatoes and IMDB. In addition, this database will also contain a lot of personnel information, such as movie starring information, director information, movie music producer information, screenwriter information and producer information. Finally, we will provide our database users with the opportunity to register as a member and choose their own favorite movie. At the same time, they can also leave a comment under the movie and share it publicly so that other users can see it.
                </div>
            </div>
                <?php session_start();
                    if($_SESSION['login']){
                ?>
                    <a href="search.php">
                        <button class="btn peach-gradient" type="submit">Back to home</button></a>
                <?php }else{?>
                    <a href="index.php">
                        <button class="btn peach-gradient" type="submit">Go to login</button></a>
                    <a href="search.php">
                        <button class="btn aqua-gradient" type="submit">Back to home</button></a>
                <?php }?>
                </h1>
                <hr class="my-4">
                <div class="card ">
                <h1>Contributors</h1>
                <div class="row">
                  <div class="column">
                    <div class="card">
                        <div class="avatar">
                            <img src="image/mint.jpg"
                                alt="face">
                        </div>
                      <h2>Mint Lin</h2>
                      <h4>xl9yr@virginia.edu</h4>
                      </div>
                  </div>
                  <div class="column">
                    <div class="card">
                        <div class="avatar">
                            <img src="image/RTC.jpg"
                                alt="face">
                        </div>
                      <h2>Tiancheng Ren</h2>
                      <h4>tr6cz@virginia.edu</h4>
                      </div>
                  </div>
                  <div class="column">
                    <div class="card">
                        <div class="avatar">
                            <img src="image/Kevin.jpg"
                                alt="face">
                        </div>
                      <h2>Yuchen Sun</h2>
                      <h4>ys4aj@virginia.edu</h4>
                      </div>
                  </div>
                  <div class="column">
                    <div class="card">
                        <div class="avatar">
                            <img src="image/gusi.jpg"
                                alt="face">
                        </div>
                      <h2>Zetao Wang</h2>
                      <h4>zw3hk@virginia.edu</h4>
                      </div>
                  </div>
                </div>
                </div>
  </div>
</div>
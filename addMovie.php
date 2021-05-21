<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Movie</title>
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
            background-position: bottom;
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
      session_start();?>
<body>
  <div class="wrapper">
    <div class="content">
        <h1>Add Movie</h1>
        <p>Please FILL the information of the new movie to insert, title, length IMDB, Rotten tomatoes and year are required</p>
        <p>For IMDB and Rotten tomatoes, leave 0.0 if unknow</p>
    </div>
<div class="form">
  <form action = 'MoviesInsert.php' method='post'>
    <div class="middle-form">
      <div class="inner-form">
        <div class="label">Title</div>
        <input type="text" placeholder="..." name = 'title' required>
      </div>
    </div></br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Rotten tomatoes</div>
        <input type="text" placeholder="8.0" pattern="[0-9]+([\.][0-9]{0,2})?"  name = 'rotten_tomatoes' required>
      </div>
      <div class="inner-form">
        <div class="label">IMDB</div>
        <input type="text" placeholder="8.0" pattern="[0-9]+([\.][0-9]{0,2})?"  name = 'imdb'required>
      </div>
      <div class="inner-form">
        <div class="label">Country</div>
        <input type="text" placeholder="U.S." name = 'Country'>
      </div>
    </div></br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Length(mins)</div>
        <input type="text" placeholder=" 112" pattern="[0-9]+" name = 'RunningTime' required>
      </div>
      <div class="inner-form">
        <div class="label">year</div>
        <input type="text" placeholder="2012" pattern="[0-9]+" name = 'year' required>
      </div>
      <div class="inner-form">
        <div class="label">Production Company</div>
        <input type="text" placeholder="Walt Disney Pictures" name = 'ProductionCompany'>
      </div>
    </div>
    </br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Directed by First</div>
        <input type="text" placeholder=" Jonathan"name = 'DirectedbyFirst'>
      </div>
      <div class="inner-form">
        <div class="label">Directed by Last</div>
        <input type="text" placeholder="Jostar" name = 'DirectedbyLast'>
      </div>
      <div class="inner-form">
        <div class="label">Directed by Middle</div>
        <input type="text" placeholder="Dio" name = 'DirectedbyMiddle'>
      </div>
    </div>
    </br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Starring First</div>
        <input type="text" placeholder=" Jonathan" name = 'StarringFirst'>
      </div>
      <div class="inner-form">
        <div class="label">Starring Last</div>
        <input type="text" placeholder="Jostar" name = 'StarringLast'>
      </div>
      <div class="inner-form">
        <div class="label">Starring Middle</div>
        <input type="text" placeholder="Dio" name = 'StarringMiddle'>
      </div>
    </div>
    </br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Music by First</div>
        <input type="text" placeholder=" Jonathan" name = 'MusicbyFirst'>
      </div>
      <div class="inner-form">
        <div class="label">Music by Last</div>
        <input type="text" placeholder="Jostar" name = 'MusicbyLast'>
      </div>
      <div class="inner-form">
        <div class="label">Music by Middle</div>
        <input type="text" placeholder="Dio" name = 'MusicbyMiddle'>
      </div>
    </div>
    </br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Produced by First</div>
        <input type="text" placeholder=" Jonathan" name = 'ProducedbyFirst'>
      </div>
      <div class="inner-form">
        <div class="label">Produced by Last</div>
        <input type="text" placeholder="Jostar" name = 'ProducedbyLast'>
      </div>
      <div class="inner-form">
        <div class="label">Produced by Middle</div>
        <input type="text" placeholder="Dio" name = 'ProducedbyMiddle'>
      </div>
    </div>
    </br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Story by First</div>
        <input type="text" placeholder=" Jonathan" name = 'StorybyFirst'>
      </div>
      <div class="inner-form">
        <div class="label">Story by Last</div>
        <input type="text" placeholder="Jostar" name = 'StorybyLast'>
      </div>
      <div class="inner-form">
        <div class="label">Story by Middle</div>
        <input type="text" placeholder="Dio" name = 'StorybyMiddle'>
      </div>
    </div>
    </br>

    <div class="top-form">
      <div class="inner-form">
        <div class="label">Written by First</div>
        <input type="text" placeholder=" Jonathan" name = 'WrittenbyFirst'>
      </div>
      <div class="inner-form">
        <div class="label">Written by Last</div>
        <input type="text" placeholder="Jostar" name = 'WrittenbyLast'>
      </div>
      <div class="inner-form">
        <div class="label">Written by Middle</div>
        <input type="text" placeholder="Dio" name = 'WrittenbyMiddle'>
      </div>
    </div>
    <button class="btn aqua-gradient btn-lg float-right" type="submit">Add</button>
  </form>
  </br></br>
       <a href = "search.php"><button class="btn tempting-azure-gradient btn-sm float-left">Bock to home</button></a>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
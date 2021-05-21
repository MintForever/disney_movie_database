<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Movie</title>
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
      session_start();?>
<body>
  <div class="wrapper">
    <div class="content">
        <h1>Delete Movie</h1>
        <p>Please give a movie title to delete</p>
    </div>
<div class="form">
  <form action = 'MoviesDelete.php' method='post'>
    <div class="middle-form">
      <div class="inner-form">
        <div class="label">Title</div>
        <input type="text" placeholder="..." name = 'title'>
      </div>
    </div></br>
    <button class="btn young-passion-gradient btn-lg float-right" type="submit">delete</button>
  </form>
  </br></br>
       <a href = "search.php"><button class="btn tempting-azure-gradient btn-sm float-left">Bock to home</button></a>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
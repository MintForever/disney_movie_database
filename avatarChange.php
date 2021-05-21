<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uesr Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design for Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Profile</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
            background-image: url('image/index.png');
            background-size: cover;
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
          box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
          padding: 20px;
          text-align: center;
          background-color: #f1f1f1;
        }

        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 800px) {
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
<?php include('head.php');
      session_start();?>

<body>

<div class="container">
    </br>
    </br>
    </br>
    <div class="card ">
        <h1>Select Your Avatar</h1>
        <div class="row">
           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='0' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user0.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='1' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user1.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='2' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user2.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='3' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user3.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

        </div>

        <div class="row">
           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='4' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user4.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='5' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user5.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='6' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user6.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='7' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user7.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>
        </div>

        <div class="row">
           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='8' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user8.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='9' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user9.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='10' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user10.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

           <div class="column">
              <form method="post" action="avatar.php">
                <input type="hidden" name='avatarID' value='11' />
                        <button class = "btn" type = "submit"><div class="card">
                            <div class="avatar">
                                <img src="image/avatar/user11.png"
                                    alt="face"/>
                            </div>
                        </div></button>
              </form>
           </div>

        </div>


    </div>
    </br></br>
       <a href = "search.php"><button class="btn tempting-azure-gradient btn-sm float-left">Bock to home</button></a>
</div>

</body>

</html>
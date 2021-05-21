
<html lang="en">
<head>
  <title>CS4750 Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design for Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
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
}
.login-box{
  width: 780px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  color: white;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #FFFFFF;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #FFFFFF;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}
</style>
<body>
<video autoplay muted loop id="myVideo">
  <source src="index.mp4" type="video/mp4">
</video>
<?php require('library.php');
      session_start();  ?>
<br>
        <div class="login-box">
            <?php session_start();
                if($_SESSION['login']== TRUE){?>
                    <div class="container">
                        <h3>Here is the index page, you may want to:</h3>
                        <li class="nav-item"><a href="logout.php"><button class="btn heavy-rain-gradient">logout</button></a></li>
                    </div>
                <?php }else{?>
                <div class="jumbotron winter-neva-gradient">
                    <div class="container">
                        <h3>Welcome, here is</h3>
                        <h1 class="display-4">Our CS4750 Project</h1>
                    </div>
                <div>
                <form action = 'PersonsVerification.php' method='post'>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                        <input type="text" placeholder="First name" name = 'firstname'>
                </div>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                        <input type="text" placeholder="Last name" name = 'lastname'>
                </div>
                <div class="textbox">
                    <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name = 'password'>
                </div>
                <button class="btn peach-gradient" type="submit">login</button>
                </form>
                 <hr class="my-4">
                 <p><h5><a href="about.php">Learn more about this project</a> </h5></p>
                 <a href = "search.php"><button class="btn amy-crisp-gradient btn-sm float-right">view data with out login</button></a>
            <?php }?>
        </div>
</body>



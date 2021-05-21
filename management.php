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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
             font-family: 'Josefin Sans', sans-serif;
        }
        body{
            background-image: url('image/index.png');
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
        }


        .wrapper{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }

        .wrapper .p_wrap{
            padding: 25px;
        }


        .wrapper .p_wrap h2{
            color: #ffffff;
            margin-bottom: 15px;
        }

        .p_wrap .lradio_container{
            display:block;
            position:relative;
            width:100%;
            height:auto;
            margin-bottom:15px;
        }

        .p_wrap .lradio_container .input_radio{
            position:absolute;
            top:0;
            left:0;
            z-index:1;
            opacity:0;
        }

        .p_wrap .lradio_container .radio_inner{
            display:flex;
            align-items:center;
            padding:12px 10px;
            background:#fff;
            border-radius: 5px;
            padding: 30px;
        }

        .p_wrap .lradio_container .info{
            font-size: 32px;
            font-weight: 700;
            color: #e6edfd;
        }
        .lradio_container .input_radio:checked ~ .radio_inner .info{
            color: #7690da;
        }

        .lradio_container .input_radio:checked ~ .radio_inner{
            box-shadow: 0 0 20px rgba(118,144,218,0.5);
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
	<div class="p_wrap">
		<h2>Please Select Your Operation</h2>
		<div class="container">
			<label class="lradio_container">
                <input type="radio" class="input_radio" name="gender">
                    <div class="radio_inner">
                                <form class="float-right" action = 'addfavorite.php' method='post'>
                                    <input type = "hidden" name = 'operation' value='delete' />
                                    <input type = "hidden" name = 'management' value='1' />
                                    <p>User ID: <input type = 'text'  name = 'userID' /></p>
                                    <button class="btn young-passion-gradient btn-lg float-right" type="submit">Remove Fevorite</button>
                                </form>
                        <div class="info">
                            favorite
                        </div>
                    </div>
            </label>
		</div>
		<div class="container">
			<label class="lradio_container">
                <input type="radio" class="input_radio" name="gender">
                    <div class="radio_inner">
                        <div class="form-group">
                                    <form class="float-right" action = 'addcomment.php' method='post'>
                                        <input type = "hidden" name = 'operation' value='delete' />
                                        <input type = "hidden" name = 'management' value='1' />
                                        <p>User ID: <input type = 'text'  name = 'userid' /></p>
                                        <p>Movie ID: <input type = 'text'  name = 'movieid' /></p>
                                        <button class="btn young-passion-gradient btn-lg float-right" type="submit">delete comment</button>
                                    </form>

                            </div>
                        <div class="info">
                           	comment
                        </div>
                    </div>
            </label>
		</div>
		<a href = "search.php"><button class="btn tempting-azure-gradient btn-sm float-left">Bock to home</button></a>

	</div>
</div>

</body>

</html>
<nav class="navbar navbar-expand-lg navbar-light winter-neva-gradient">
  <a class="navbar-brand" href="#">CS4750</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="search.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
    </ul>


  </div>
   <ul class="nav justify-content-center">
      <?php session_start();
            if($_SESSION['type']=="admin"){?>
                <li class="nav-item"><a href="management.php"><button class="btn warm-flame-gradient">management</button></a></li>
      <?php }?>
      <?php session_start();
            if($_SESSION['login']== TRUE){?>
                  <li class="nav-item"><a href="profile.php"><button class="btn purple-gradient">profile</button></a></li>
                  <li class="nav-item"><a href="logout.php"><button class="btn heavy-rain-gradient">logout</button></a></li>
      <?php }else{?>
            <li class="nav-item"><a href="index.php"><button class="btn peach-gradient">login</button></a></li>
      <?php }?>
    </ul>
</nav>
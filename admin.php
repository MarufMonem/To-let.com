
<?php
session_start();
include('connection.php');

  if($_SESSION["username"]=="anik"){
  
}else{
  die("<p style='background-color: #ce1834;
  color: white;
  font-size: 40px;
  text-align: center;  
  padding:15%;
  margin:2% 15%;
' >Your not allowed here
<br><a href='index.php'>Go Back</a>
</p>

");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin-MAIN | To-Let.Com</title>

<!-- LINKS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="admin.css">

  <!-- links\\ -->
</head>


<body>

  <!-- navbar -->


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img id="logo" src="https://cdn4.iconfinder.com/data/icons/real-estate-2-2/256/Rent_Home-512.png">To-Let.Com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="admin.php"><i class="fas fa-home"></i>

      Admin <span class="sr-only">(current)</span></a>
        </li>
        
      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-user-plus"></i>Sign-Up</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="admin.php"><i class="fas fa-user-circle"></i>Admin- <?php echo $_SESSION["username"];?> </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- navbar -->


<div class="container">
  
  <div class="ui centered link cards">

    <!-- <div class="card">
          <div class="image">
            <img src="http://osclassfa.ir/wp-content/uploads/2017/12/users.png">
          </div>
        <div class="content">
          <div class="header"><a href="admin1.html">Adding User to database</a></div>
        
          <div class="description">
            After authentication add user
          </div>
        </div>
        <div class="extra content">
          
          <span>
            <i class="user icon"></i>
            75 members
          </span>
        </div>
    </div> -->

  <div class="card">
    <div class="image">
      <img src="http://icons.iconarchive.com/icons/webalys/kameleon.pics/512/Database-Cloud-icon.png">
    </div>
    <div class="content">
      <div class="header"><a href="dbPage.php">Check Database(Update/delete)</a></div>
 
      <div class="description">
        Easy addition and deletion of users
      </div>
    </div>
    <div class="extra content">
      
      <!-- <span>
        <i class="user icon"></i>
        35 users
      </span> -->
    </div>
  </div>

  <div class="card">
    <div class="image">
      <img src="https://conceptdraw.com/a1703c3/p7/preview/640/pict--online-advertising-advertising---vector-stencils-library.png--diagram-flowchart-example.png">
    </div>
    <div class="content">
      <div class="header"><a href="dbPage2.php">Advertisement management</a></div>
      <div class="meta">
        <a>Coworker</a>
      </div>
      <div class="description">
       Manage both website and product ad.
      </div>
    </div>
    <div class="extra content">
      
      <!-- <span>
        <i class="user icon"></i>
        151 ads
      </span> -->
    </div>
  </div>
</div>

</div>


</body>
</html><!-- Footer -->



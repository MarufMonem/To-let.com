<?php
  session_start();
  if($_SESSION["username"]){
  die("<p style='background-color: #ce1834;
  color: white;
  font-size: 40px;
  text-align: center;  
  padding:15%;
  margin:2% 15%;
' >Your Already logged in!
<br><a href='index.php'>Go Back</a>
</p>

");
}
  include 'connection.php';

  if(isset($_POST["submit"] ) ){
      

    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    if(!$_POST["username"]){
        $nameError = "please put your name here <br>";
    }else{
        $name = validateFormData($_POST["username"]);
//        echo $name;
    }


    if(!$_POST["password"]){
        $passwordError = "please put your password here<br>";
    }else{
        $password = validateFormData($_POST["password"]);
//        echo $password;
    }



$query="SELECT * FROM user_info WHERE name='$name' and password='$password'";
$result = mysqli_query($conn, $query);


    while($row = mysqli_fetch_assoc($result)){
//        die("reached");
//        echo $row;
       $_SESSION["username"] = $row['name'];
        $_SESSION["user_id"] = $row['id'];
        header('Location: profile.php?id='.$_SESSION["user_id"]);
        //die("PASSED");
    }
      echo "<p style='background-color: #ce1834;
  color: white;
  font-size: 18px;
  text-align: center;
  width: 100%;
  padding:7px;
  margin:0px;' >Sorry login wasnt succesful. Please try again. Thank you!</p>
";
    mysqli_close($conn);
}

  ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login| To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>


 <!-- ****************************NAV BAR START*************************************** -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="index.php">To-Let.Com</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
       <li class="nav-item ">
         <a class="nav-link" href="index.php"><i class="fas fa-home"></i>

           Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="browseRent.php"><i class="far fa-compass"></i> Browse Rent</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="browseSale.php"><i class="far fa-compass"></i> Browse Sale</a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="buddy.php"><i class="fas fa-user-friends"></i> Buddy</a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="movers.php"><i class="fas fa-truck"></i></i> Movers</a>
         </li>
      <!--   <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-wallet"></i>Pricing</a>
        </li> -->
        <li class="nav-item">
         <a class="nav-link" href="contact.html"><i class="fas fa-phone"></i> Contact Us</a>
       </li>
     </ul>
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="signUp.php"><i class="fas fa-user-plus"></i> Sign-Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="login.php"><i class="fas fa-user-circle"></i> Login</a>
      </li>
    </ul>
   </div>
 </nav>


 <!-- ****************************NAV BAR END*************************************** -->


  <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://cdn4.iconfinder.com/data/icons/real-estate-2-2/256/Rent_Home-512.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
      <small>*<?php echo $nameError;?></small>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <br>
      <small>*<?php echo $passwordError; ?></small>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input name="submit" type="submit" class="fadeIn fourth" value="Log In">
    </form>

  </div>
</div>

</body>
</html>
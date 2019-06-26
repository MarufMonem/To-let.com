<?php
session_start();
if($_SESSION["username"]){
  die("<p style='background-color: #ce1834;
  color: white;
  font-size: 40px;
  text-align: center;  
  padding:15%;
  margin:2% 15%;
' >Your Already logged in!You cant sign Up again
<br><a href='index.php'>Go Back</a>
</p>

");
}
include('connection.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up | To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="signUp.css">
</head>
<body>



  <?php
  if(isset($_POST["add"] ) ){

    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }



    if(!$_POST["username"]){
        $nameError = "please put your name here <br>";
    }else{
        $name = validateFormData($_POST["username"]);

    }
    if($_POST["address"]){
        $address = validateFormData($_POST["address"]);
    }else{
      $addressError = "please put your name here<br>";
    }


    if($_POST["email"]){
        $email = validateFormData($_POST["email"]);
    }

    if(!$_POST["phone"]){
        $phoneError = "please put your phone number <br>";
    }else{
        $phone = validateFormData($_POST["phone"]);
    }

    if($_POST["phone2"]){       
        $phone2 = validateFormData($_POST["phone2"]);
    }

    if(!$_POST["password"]){
        $passwordError = "please put your cars registration number<br>";
    }else{
        $password = validateFormData($_POST["password"]);
    }

    $mover=validateFormData($_POST["mover"]);



$queryName="SELECT name,phone FROM user_info";
$userNames = mysqli_query($conn, $queryName);


    while($row = mysqli_fetch_assoc($userNames)){
        $user= $row["name"];
        $phoneUser=$row["phone"];
        if($name == $user && $phoneUser==$phone){
            echo "<script type='text/javascript'>alert('YOU ALREADY HAVE AN ACCOUNT ');</script>";
            $name="";
            $phone="";
            $email="";
            $password="";
        }
    }


    if($name && $phone && $password && $address){
        $query = "INSERT INTO `user_info` (`id`, `name`, `address`, `phone`, `phone2`, `email`, `password`, `ad_id`, `buddy_id`, `mover_id`) VALUES (NULL, '$name', '$address', $phone, $phone2, '$email', '$password', NULL, NULL, $mover);";

        if( mysqli_query( $conn, $query ) ) {
            echo "New record in database!";
        //      $_SESSION["username"] = $row['name'];
        // $_SESSION["user_id"] = $row['id'];
        header('Location: login.php');
        } else {
            echo "Please Fill up the necessaary information". $query . "<br>" . mysqli_error($conn);
        }

    }

    mysqli_close($conn);

}

  ?>


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
        <a class="nav-link active" href="signUp.php"><i class="fas fa-user-plus"></i> Sign-Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="login.php"><i class="fas fa-user-circle"></i> Login</a>
      </li>
    </ul>
   </div>
 </nav>


 <!-- ****************************NAV BAR END*************************************** -->


<!-- ****************************FORM START*************************************** -->


<div class="container">


  <h1>Sign up</h1>
  <p>Sign up to post advertisements, find room mates and connect to clients</p>
  <hr>
  
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
    <small>*Required</small>
    <br>
    <br>


    <div class="form-row">


      <div class="form-group col-md-6">  
      <small>* <?php echo $nameError; ?></small>      
        <label for="inputCity">Name</label>
        <input name="username" type="text" class="form-control" id="inputCity" placeholder="your name">
      </div>

      <div class="form-group col-md-6">
        <small>* <?php echo $phoneError; ?></small>
        <label for="inputState">Phone</label>
        <input name="phone" type="number" class="form-control" id="inputCity" placeholder="Phone number">        
      </div>

    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <small>* <?php echo $passwordError; ?></small>
        <label for="inputPassword4">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <small>* <?php echo $addressError; ?></small>
        <label for="inputEmail4">Address</label>
        <input name="address" type="text" class="form-control" id="inputEmail4" placeholder="Address">
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Phone Number 2</label>
        <input name="phone2" type="number" class="form-control" id="inputEmail4" placeholder="2nd Phone Number">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Are you a mover?</label>
    <select class="form-control" id="exampleFormControlSelect1" name="mover">
      <option value="1">Yes</option>
      <option value="0">No</option>
    </select>
      </div>
    </div>

    <p class="text-muted">We dont share your information</p>
    <button name="add" type="submit" class="btn btn-primary btn-lg ">Sign in</button>
  </form>
</div>


<!-- ****************************FORM END*************************************** -->


<?php
include ('footer.php');
?>
</body>
</html><!-- Footer -->



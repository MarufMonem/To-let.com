<?php
session_start();

if(!$_SESSION["username"]){
	die("Not authorized");
}

$userID= $_SESSION["user_id"];

include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buddy Sign-up| To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="buddySignUp.css">
</head>
<body>

	<?php
	if(isset($_POST["add"] ) ){

		function validateFormData( $formData ) {
			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;
		}



		if(!$_POST["area"]){
			$areaError = "please put your prefered area here <br>";
		}else{
			$area = validateFormData($_POST["area"]);

		}
		if($_POST["occupation"]){
			$occupation = validateFormData($_POST["occupation"]);
		}else{
			$occupationError = "please put your occcupation here<br>";
		}


		if($_POST["extra"]){
			$extra = validateFormData($_POST["extra"]);
		}else{
			$extraError = "Please put the necessary information here<br>";
		}

		if(!$_POST["institution"]){
			$institutionError = "please put your phone number <br>";
		}else{
			$institution = validateFormData($_POST["institution"]);
		}


		if($institution && $extra && $occupation && $area) {
//        die("reached");
			$query = "INSERT INTO `buddy` (`buddy_id`, `preferedArea`, `occupation`, `institution`, `message`) VALUES (NULL, '$area', '$occupation', '$institution', '$extra');";

			if (mysqli_query($conn, $query)) {
            //echo "New record in database!";
			} else {
				echo "Please Fill up the necessaary information" . $query . "<br>" . mysqli_error($conn);
			}


        //getting the recently added buddy id

			$query2 = "SELECT buddy_id FROM `buddy` WHERE occupation= '$occupation' AND institution='$institution' AND preferedArea='$area'";
			$buddy = mysqli_query($conn, $query2);

			while ($row = mysqli_fetch_assoc($buddy)) {
				$buddyID = $row["buddy_id"];
            //echo "buddy ID is $buddyID <br>";
            //putting buddy id to user id
				$query3 = "UPDATE `user_info` SET `buddy_id`= $buddyID WHERE id=$userID";
				if (mysqli_query($conn, $query3)) {
					echo "New buddy id added in database!";
				} else {
					echo "Please Fill up the necessaary information" . $query3 . "<br>" . mysqli_error($conn);
				}
			}


		}

		mysqli_close($conn);

	}

	?>






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
  <?php
  include ('session.php');
  ?>
</div>
</nav>



<!-- 
		 get user id from session variable
		 then after putting the data of the buddy list get its id
		 and put that id inside the users buddy_id -->


		 <div class="container">
		 	

		 	<h2>Want to look for room-mates without leaving your room? &#128521;</h2>
		 	<p class="text-muted">Just put in some extra information then you would be good to go.</p>
		 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
		 		<div class="form-group">
		 			<div class="row">
		 				<div class="col-md-8">

		 					<label for="exampleInputEmail1"><small>* <?php echo $areaError; ?></small>Prefered Area</label>
		 					<input name="area" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the area your looking a place/ you have a place">
		 				</div>
		 			</div>
		 			<div class="row">

		 				<div class="col-md-8">
		 					<label for="exampleInputEmail1"><small>* <?php echo $occupationError; ?></small>Occupation</label>
		 					<input name="occupation" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="what do you  do?">
		 				</div>
		 			</div>
		 			<div class="row">
		 				<div class="col-md-8">
		 					<label for="exampleInputEmail1"><small>* <?php echo $institutionError; ?></small>Institution</label>
		 					<input name="institution" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="what do work?">
		 				</div>
		 			</div>
		 			<div class="row">
		 				<div class="col-md-8">
		 					<label for="exampleInputEmail1"><small>* <?php echo $extraError; ?></small>Extra Information</label>
		 					<input name="extra" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="How many people are you looking for? Male/Female?">
		 				</div>


		 			</div>				
		 			
		 		</div>
		 		<input type="submit" name="add" value="Submit" class="btn btn-lg btn-primary">
		 	</form>
		 </div>
		 <?php
		 include ('footer.php');
		 ?>
		</body>
		</html>
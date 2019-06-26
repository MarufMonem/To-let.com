<?php

include ('connection.php');

session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home| To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="index.css">
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
         <a class="nav-link active" href="index.php"><i class="fas fa-home"></i>

           Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="browseRent.php"><i class="far fa-compass"></i> Browse Rent</a>
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


 <!-- ****************************NAV BAR END*************************************** -->


		<div class="container">
			<div class="jumbotron jumbotron-fluid">
				<div class="container">
					<h1 class="display-3"><img id="logo2" src="https://cdn4.iconfinder.com/data/icons/real-estate-2-2/256/Rent_Home-512.png">To-Let.Com</h1>
					<p class="lead">Here you can buy sell or even rent apartments of your liking!</p>
				</div>
			</div>

		</div>

		
		<div class="container2">

			
			<div id="options">
				<div class="card d-inline-flex " style="width: 20rem;  ">
					<img class="card-img-top titleImg" src="https://thumbs.dreamstime.com/b/house-rent-vector-illustration-52179744.jpg" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Rent An Apartment</h4>
						<p class="card-text">Looking for a house to rent? We have a greate collection waiting...</p>
						<a href="browseRent.php" class="btn btn-outline-primary">Start Hunting</a>
					</div>

				</div>
				<div class="card d-inline-flex " style="width: 20rem;  ">
					<img class="card-img-top titleImg" src="https://myrepublic.net/sg/content/uploads/2016/07/friendship.png" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title">Find your Buddy</h4>
						<p class="card-text">Find people who are also looking for places to live</p>
						<a href="buddy.php" class="btn btn-outline-primary">Find room-mates</a>
					</div>

				</div>
				<div class="card d-inline-flex " style="width: 20rem;">
					<img class="card-img-top titleImg" src="https://shared.leadpropeller.com/images/image_packs/buying/rocket/game/sold-house.png">
					<div class="card-body">
						<h4 class="card-title">Buy/Sell An Apartment</h4>
						<p class="card-text">No more putting sign boards to sell a house</p>
						<a href="browseSale.php" class="btn btn-outline-primary">Look for house of your dreams</a>
					</div>


				</div>

				<div class="card d-inline-flex " style="width: 20rem;">
					<img class="card-img-top titleImg" src="https://static1.squarespace.com/static/52b2a00ae4b07a518c7e3af1/t/573f139bf8baf30b525ad908/1463751580901/workers.png?format=300w">
					<div class="card-body">
						<h4 class="card-title"> Movers</h4>
						<p class="card-text">Easily hire movers/packers through us</p>
						<a href="movers.php" class="btn btn-outline-primary" style="margin-top: 22px; ">Hire packers</a>
					</div>

				</div>
			</div>

		</div>



	<!-- <div class="container container2">
		<table>
			<tr>
				<td><img class="titleImg" src="https://shared.leadpropeller.com/images/image_packs/buying/rocket/game/sold-house.png"></td>
				<td><img class="titleImg" src="https://thumbs.dreamstime.com/b/house-rent-vector-illustration-52179744.jpg" alt="Card image cap"></td>
				<td><img class="titleImg" src="https://myrepublic.net/sg/content/uploads/2016/07/friendship.png" alt="Card image cap"></td>
				<td><img class="titleImg1" src="http://www.clipartroo.com/images/2/happy-workers-clipart-2630.png"></td>
			</tr>
			<tr>
				
				<td class="title">Buy/Sell</td>
				<td class="title">Rent</td>			
				<td class="title">Find Roommates</td>			
				<td class="title">Movers</td>
			

			</tr>

		</table>

	</div>	 -->

<?php
include ('footer.php');
?>

	</body>
	</html>
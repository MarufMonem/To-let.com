<?php
include ('connection.php');
session_start();

$adID= $_GET['id'];
// getting all the images of that ad
$query = "SELECT * FROM images WHERE ad_id=$adID";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM user_ad WHERE ad_id=$adID";
$result2 = mysqli_query($conn, $query2);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Page Advertisement| To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="ad.css">
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
     <?php
     include ('session.php');
     ?>
   </div>
 </nav>


 <!-- ****************************NAV BAR END*************************************** -->

<div class="container">
  
<?php 

if(mysqli_num_rows($result2)>0){
    while($row = mysqli_fetch_assoc($result2)){
      //echo $row['image'];
?>

<h1><?php echo strtoupper($row["title"])?></h1>
  <p><span>Data posted: </span>     <?php echo strtoupper($row["date"])?>  </p>
  <p><span>Info: </span>            <?php echo strtoupper($row["info"])?></p>
  <p><span>Type: </span>            <?php echo strtoupper($row["type"])?></p>
  <p><span>Owner: </span>           <?php echo strtoupper($row["owner"])?></p>
  <p><span>Contact Info: </span>    <?php echo strtoupper($row["contact"])?></p>


  <div id="detail">


<!--   <h2>image here </h2>

  <img src="uploads/ad1.jpg"> -->
  <hr>
  <h2>Detailed Information</h2>
  <table class="table">
    <tr>
      <th>Area</th>
      <th>Price</th>
      <th>Bedroom</th>
      <th>Washroom</th>
      <th>Drawing</th>
      <th>Dining</th>
      <th>Living</th>
      <th>Kitchen</th>
      <th>Bachelor</th>
      <th>Parking</th>
      <th>Address</th>
    </tr>
    <tr>
      <td><?php echo $row["area"]?></td>
      <td><?php echo $row["price"]?></td>
      <td><?php echo $row["bedroom"]?></td>
      <td><?php echo $row["washroom"]?></td>
      <td><?php echo $row["drawing"]?></td>
      <td><?php echo $row["dining"]?></td>
      <td><?php echo $row["living"]?></td>
      <td><?php echo $row["kitchen"]?></td>

      <td><?php 

      if($row["bachelor"] == 1){
        echo "yes";
      }else{
        echo "no";
      }
      ?></td>

      <td><?php 
       if($row["parking"] == 1){
        echo "yes";
      }else{
        echo "no";
      }


      ?></td>

      <td><?php echo $row["address"]?></td>
    </tr>
  </table>
</div>
      
<?php
    }
}else{
    echo "The owner hasnt uploaded any images for this ad!!!";
}
?>


<!-- images -->


   
<h2>Have a virtual look at the place</h2>
<hr>

    <div class="row"> 

<?php 

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
      //echo $row['image'];
?>
      <div class='col-md-4'>
        <div class='card'>
          <img class='myImg card-img-top' src="uploads/<?php echo $row["image"]; ?>">
        </div>
      </div>
<?php
    }
}else{
    echo "The owner hasnt uploaded any images for this ad!!!";
}
?>
      
    </div>

<br>
<br>
  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>


<script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = $('.myImg');
var modalImg = $("#img01");
var captionText = document.getElementById("caption");
$('.myImg').click(function(){
  modal.style.display = "block";
  var newSrc = this.src;
  modalImg.attr('src', newSrc);
  captionText.innerHTML = this.alt;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<?php
include ('footer.php');
?>
</body>
</html
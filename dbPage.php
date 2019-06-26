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


if(isset($_POST["delete"] ) ){
  $adID= $_GET['id'];
    // die($adID);

    $query1 = "DELETE FROM `user_ad` WHERE ad_id='$adID'";
    $query2 = "DELETE FROM `images` WHERE image_id='$adID'";


    // delete ad
    if( mysqli_query( $conn, $query1 ) ) {
      echo "DELETED all ads";
    } else {
     echo "Please Fill up the necessaary information". $query1 . "<br>" . mysqli_error($conn);
   }

    //delete images
   if( mysqli_query( $conn, $query2 ) ) {
    echo "DELETED all images";
  } else {
   echo "Please Fill up the necessaary information". $query2 . "<br>" . mysqli_error($conn);
 }


 header('Location: dbPage.php');


}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin-User Addition| To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="dbPage.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php"><img id="logo" src="https://cdn4.iconfinder.com/data/icons/real-estate-2-2/256/Rent_Home-512.png">To-Let.Com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="admin.html"><i class="fas fa-home"></i>

      Admin <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="dbPage.php"><i class="fas fa-plus"></i>all advertisements</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="dbpage2.php"><i class="fas fa-users"></i>All user</a>
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

<div>

  <h1>All the advertisement data</h1>
  
  <table class="table">
    <tr>
      <th>Title</th>
      <th>Type</th>
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
      <th>Info</th>
      <th>Owner</th>
      <th>Contact</th>
      <th>mail</th>
      <th>Address</th>
      <th>image</th>
      <th>Delete</th>
    </tr>



     <?php
$query="SELECT * FROM user_ad";
$results = mysqli_query($conn, $query);
    //     echo "<table>
    //         <th>ID</th>
    //   <th>Name</th>
    //   <th>Phone Number</th>
    //   <th>Registration</th>
    //   <th>Date</th>
    //         <th>Mechanic Name</th>
    //   <th>Edit/Delete</th>
      
    // ";

if(mysqli_num_rows($results)>0){//are there any rows?
   // echo "found values";
     while($row = mysqli_fetch_assoc($results)){
         
//            <a href="edit-record.php?id='.$row['id'].'">edit</a>
         $adId = $row["ad_id"];
         //echo "Value is: " .$userNum;
         echo "<tr>
            <td>".$row["title"]."</td>
            <td>".$row["type"]."</td>
            <td>".$row["area"]."</td>
            <td>".$row["price"]."</td>
            <td>".$row["bedroom"]."</td>
            <td>".$row["washroom"]."</td>
            <td>".$row["drawing"]."</td>
            <td>".$row["dining"]."</td>
            <td>".$row["living"]."</td>
            <td>".$row["kitchen"]."</td>
            <td>".$row["bachelor"]."</td>
            <td>".$row["parking"]."</td>
            <td>".$row["info"]."</td>
            <td>".$row["owner"]."</td>
            <td>".$row["contact"]."</td>
            <td>".$row["mail"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["image"]."</td>"

            ?>
            <td>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $adId; ?>" method="post">
              <input type='submit' name='delete' value='Delete'>
            </form>
</td>
            <?php

               echo "</tr>"  ;                            
         
         
         
     }
}else{
    echo "Problem";
}
     
?>


  </table>
</div>




</body>
</html><!-- Footer -->

<?php
include('connection.php');
session_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Movers | To-Let.Com</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="movers.css">
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
           <a class="nav-link " href="browseRent.php"><i class="far fa-compass"></i> Browse Rent</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="browseSale.php"><i class="far fa-compass"></i> Browse Sale</a>
         </li>
         <li class="nav-item">
           <a class="nav-link " href="buddy.php"><i class="fas fa-user-friends"></i> Buddy</a>
         </li>
         <li class="nav-item">
           <a class="nav-link active" href="movers.php"><i class="fas fa-truck"></i></i> Movers</a>
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



  <h1>All the movers</h1>
  <p class="text-muted">These people will help you move from your old house to the new one. Just call them up and they would be ready to serve you</p>
  
  <table class="table">
    <tr>
      <th>Name</th>
      <th>Phone Number</th>
      <th>Phone Number 2</th>
      <th>email</th>
    </tr>



    <?php
    $query="SELECT * FROM user_info WHERE mover_id=1";
    $results = mysqli_query($conn, $query);


if(mysqli_num_rows($results)>0){//are there any rows?
   // echo "found values";
 while($row = mysqli_fetch_assoc($results)){

//            <a href="edit-record.php?id='.$row['id'].'">edit</a>
   $userNum = $row["id"];
         //echo "Value is: " .$userNum;
   echo "<tr>
   <td>".$row["name"]."</td>
   <td>".$row["phone"]."</td>
   <td>".$row["phone2"]."</td>
   <td>".$row["email"]."</td>                                 
   </tr>";


 }
}else{
  echo "Problem";
}


mysqli_close($conn);
?>


</table>
</div>
<br>
<br>
<?php
include ('footer.php');
?>

</body>
</html><!-- Footer -->

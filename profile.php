<?php
session_start();
if(!$_SESSION["username"]){
  die("Not authorized");
}
include ('connection.php');
$userID= $_SESSION["user_id"];

$query = "SELECT * FROM user_info WHERE id=$userID";
$result = mysqli_query($conn, $query);

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
    $passwordError = "please put your password here<br>";
  }else{
    $password = validateFormData($_POST["password"]);
  }
  $mover=validateFormData($_POST["mover"]);

  $queryName="SELECT name,phone FROM user_info";
  $userNames = mysqli_query($conn, $queryName);


  while($row = mysqli_fetch_assoc($userNames)){
    $userChanged= $row["name"];
    $phoneUserChanged=$row["phone"];
    $phoneUser2Changed=$row["phone2"];
    $emailUserChanged=$row["email"];
    $passwordUserChanged=$row["password"];
    $addressUserChanged=$row["address"];
    $moverUserChanged=$row["mover_id"];

    if($name == $userChanged && $phoneUserChanged==$phone && $email==$emailUserChanged && $address== $addressUserChanged && $password== $passwordUserChanged && $phone2==$phoneUser2Changed && $mover == $moverUserChanged){
      echo "<script type='text/javascript'>alert('YOU ALREADY HAVE AN ACCOUNT ');</script>";
    }
  }


  if($name && $phone && $password && $address){
    $query3 = "UPDATE  `user_info` SET 
    `name`='$name', 
    `address`='$address', 
    `phone`=$phone, 
    `phone2`=$phone2, 
    `email`='$email', 
    `password`='$password',
    `mover_id`=$mover
    WHERE id=$userID;";

    if( mysqli_query( $conn, $query3 ) ) {
     echo "<script type='text/javascript'>alert('Your account has been updated');</script>";
     header('Location: profile.php?id='.$userID);

   } else {
    echo "Please Fill up the necessaary information". $query . "<br>" . mysqli_error($conn);
  }

}

mysqli_close($conn);

}


if(isset($_POST["delete"] ) ){


    $adID= $GLOBALS['userNum'];
    //die("reached".$adID);

    $query1 = "DELETE FROM `user_ad` WHERE id='$adID'";
    $query2 = "DELETE FROM `images` WHERE id='$adID'";
    $query3 = "DELETE FROM `user_info` WHERE id='$userID'";


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

    //delete the account
 if( mysqli_query( $conn, $query3 ) ) {
  echo "DELETED the account";
} else {
 echo "Please Fill up the necessaary information". $query3 . "<br>" . mysqli_error($conn);
}


session_destroy();

header('Location: index.php');


}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile| To-Let.Com</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="profile.css">
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

         <?php 
         if($_SESSION["username"]=="anik"){
          ?>
          <li class="nav-item">
           <a class="nav-link" href="admin.php">Admin</a>
         </li>
         <?php
         }
         ?>
         
       </ul>
       <ul class="navbar-nav ml-auto">
        <li class="nav-item">
         <a class="nav-link active" href="profile.php?id=<?php echo $userID;?>"><i class="fas fa-user"></i> your profile</a>
       </li>
    <!--  <li class="nav-item">
       <a class="nav-link " href="signIn.html"><i class="fas fa-user-circle"></i> Sign-In</a>
     </li> -->
     <li class="nav-item">
       <a class="nav-link " href="logout.php"> Logout</a>
     </li>
   </ul>
 </div>
</nav>


<!-- ****************************NAV BAR END*************************************** -->
<?php 

if(mysqli_num_rows($result)>0){
  while($row = mysqli_fetch_assoc($result)){
      //echo $row['image'];

    ?>
    <div class="container">
     <h1>Hello, <?php echo strtoupper($row["name"]);?> </h1>
     <hr>
     <div class="row">
       <div class="col-md-6">
        <button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          Edit Account info
        </button>
      </p>
      <div class="collapse" id="collapseExample">
        <div class=" card-body">
          <div >
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $userID; ?>" method="post">
              <small>*Required</small>
              <br>
              <br>
              <div class="form-row">
                <div class="form-group col-md-6">  
                  <small>* <?php echo $nameError; ?></small>      
                  <label for="inputCity">Name</label>
                  <input name="username" type="text" class="form-control" id="inputCity" value="<?php echo $row["name"];?>">
                </div>

                <div class="form-group col-md-6">
                  <small>* <?php echo $phoneError; ?></small>
                  <label for="inputState">Phone</label>
                  <input name="phone" type="number" class="form-control" id="inputCity" value="<?php echo $row["phone"];?>">        
                </div>

              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input name="email" type="email" class="form-control" id="inputEmail4" value="<?php echo $row["email"];?>">
                </div>
                <div class="form-group col-md-6">
                  <small>* <?php echo $passwordError; ?></small>
                  <label for="inputPassword4">Password</label>
                  <input name="password" type="text" class="form-control" id="inputPassword4" value="<?php echo $row["password"];?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <small>* <?php echo $addressError; ?></small>
                  <label for="inputEmail4">Address</label>
                  <input name="address" type="text" class="form-control" id="inputEmail4" value="<?php echo $row["address"];?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Phone Number 2</label>
                  <input name="phone2" type="number" class="form-control" id="inputEmail4" value="<?php echo $row["phone2"];?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Are you a mover?</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="mover">
                    <option 
                    <?php if($row["mover_id"]==1){
                      echo "selected='selected'";
                    } ?>
                    value="1">Yes
                  </option>
                  <option <?php if($row["mover_id"]==NULL){
                    echo "selected='selected'";
                  } ?>value=NULL>No</option>
                </select>
              </div>
            </div>

            <p class="text-muted">We dont share your information</p>
            <button name="add" type="submit" class="btn btn-primary btn-lg ">Change</button>
          </form>

        </div>
      </div>
    </div>

    <?php
  }
}else{
  echo "Problem";
}
?>





</div>
<div class="col-md-6">
 <!-- <button class="btn btn-danger btn-block">Delete Account</button>	 -->
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $userID; ?>" method="post">
  <input class="btn btn-danger btn-block" type="submit" name="delete" value="Delete account" >
 </form>
 
</div>


</div>

<div class="row">


    <?php

    $queryCheck = "SELECT ad_id FROM user_info WHERE id= $userID";
    $ad = mysqli_query($conn, $queryCheck);


    while ($row = mysqli_fetch_assoc($ad)) {
        $adIDCheck = $row["ad_id"];
        //echo "buddy ID is $buddyID <br>";
        if (!$adIDCheck) {
            ?>

            <!-- <input name="occupation" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="what do you  do?">
              <a href="" class="btn btn-md btn-primary btn-block">Remove Buddy</a> -->
            <div class="col-md-6">
                <a href="postAd.php" class="btn btn-md btn-primary btn-block">Post an advertisement</a>
            </div>

            <?php

        }
    }
    ?>


  <?php

  $query = "SELECT buddy_id FROM user_info WHERE id= $userID";
  $buddy = mysqli_query($conn, $query);


  while ($row = mysqli_fetch_assoc($buddy)) {
    $buddyID = $row["buddy_id"];
            //echo "buddy ID is $buddyID <br>";
    if($buddyID){
      ?>

                <!-- <input name="occupation" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="what do you  do?">
                  <a href="" class="btn btn-md btn-primary btn-block">Remove Buddy</a> -->
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $userID; ?>" method="post">
                    <div class="col-md-4">
                      <button class="btn btn-md btn-primary" name="remove" type="submit">Remove Buddy</button>
                    </div>
                  </form>

                  <?php
                  if(isset($_POST["remove"] ) ){
                    $query3 = "UPDATE `user_info` SET `buddy_id`= NULL WHERE id=$userID";
                    if (mysqli_query($conn, $query3)) {
                      echo "<p>Sucessfully Removed buddy</p>";
                      header('Location: profile.php?id='.$userID);
                    } else {
                      echo "Please Fill up the necessaary information" . $query3 . "<br>" . mysqli_error($conn);
                    }
                  }
                  
                }
                else{
                  ?>

                  <div class="col-md-6">
                    <a href="buddySignUp.php" class="btn btn-md btn-primary btn-block">Find Roommates</a>
                  </div>

                  <?php
                }


              }


              ?>

            </div>

          </div>

          <!-- this table depends on the user if he signed up for buddy account or ad post or movers -->
          <br>

<!-- <p>


  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Your Ads
  </button>
</p> -->
<!-- <div class="collapse" id="collapseExample">
  <div class=" card-body"> -->


    <?php

    $query = "SELECT ad_id FROM user_info WHERE id= $userID";
    $ad = mysqli_query($conn, $query);


    while ($row = mysqli_fetch_assoc($ad)) {
      $adID = $row["ad_id"];
        $GLOBALS['userNum']= $row["ad_id"];
            //echo "buddy ID is $buddyID <br>";
      if($adID){
        ?>
        <div>
          <table class="table" >
            <h2>Your Ads</h2>
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
              <th>Delete</th>
            </tr>

            <?php

            $query2="SELECT * FROM user_ad WHERE ad_id= $adID";
            $results = mysqli_query($conn, $query2);
    //     echo "<table>
    //         <th>ID</th>
    //   <th>Name</th>
    //   <th>Phone Number</th>
    //   <th>Registration</th>
    //   <th>Date</th>
    //         <th>Mechanic Name</th>
    //   <th>Edit/Delete</th>

    // ";


            if(isset($_POST["removeAD"] ) ){

              $adId=$GLOBALS["userNum"];
              echo $adID;

              $query = "DELETE FROM `user_ad` WHERE `user_ad`.`ad_id` = $adId;";
              $query2 = "UPDATE `user_info` SET `ad_id` = NULL WHERE `user_info`.`id` = $userID;";




              if( mysqli_query( $conn, $query ) ) {
                echo "DELETED From ad db";
              } else {
               echo "DELETED From ad db prob". $query . "<br>" . mysqli_error($conn);
             }


             if( mysqli_query( $conn, $query2 ) ) {
              echo "DELETED from user table";
              header(`Location:profile.php`);
            } else {
             echo "DELETED user table prob". $query2 . "<br>" . mysqli_error($conn);
           }

         }

if(mysqli_num_rows($results)>0){//are there any rows?
   // echo "found values";
 while($row = mysqli_fetch_assoc($results)){

  if($row["bachelor"]==1){
    $bach="yes";
  }else{
    $bach="No";
  }

  if($row["parking"]==1){
    $park="yes";
  }else{
    $park="No";
  }

//            <a href="edit-record.php?id='.$row['id'].'">edit</a>
  $GLOBALS['userNum']= $row["ad_id"];
         //echo "Value is: " .$userNum;
  ?>
        <!--  echo "<tr>
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
            <td>".$bach."</td>
            <td>".$park."</td>
            <td>".$row["info"]."</td>
            <td>".$row["owner"]."</td>
            <td>".$row["contact"]."</td>
            <td>".$row["mail"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["image"]."</td>
            <td>

            <input type='submit' name='delete' value='Delete'>

            </td>                                  
          </tr>"; -->

          <tr>
           <td><?php echo $row["title"]; ?></td>
           <td><?php echo $row["type"]; ?></td>
           <td><?php echo $row["area"]; ?></td>
           <td><?php echo $row["price"]; ?></td>
           <td><?php echo $row["bedroom"]; ?></td>
           <td><?php echo $row["washroom"]; ?></td>
           <td><?php echo $row["drawing"]; ?></td>
           <td><?php echo $row["dining"]; ?></td>
           <td><?php echo $row["living"]; ?></td>
           <td><?php echo $row["kitchen"]; ?></td>
           <td><?php echo $bach; ?></td>
           <td><?php echo $park; ?></td>
           <td><?php echo $row["info"]; ?></td>
           <td><?php echo $row["owner"]; ?></td>
           <td><?php echo $row["contact"]; ?></td>
           <td><?php echo $row["mail"]; ?></td>
           <td><?php echo $row["address"]; ?></td>
           <td><?php echo $row["image"]; ?></td>
           <td>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $userID; ?>" method="post">
              <input type='submit' name='removeAD' value='Delete'>
            </form>
          </td>      
        </tr>



        <?php

      }
    }else{
      echo "Problem";
    }
  }else{
    ?>

    <div class="container">
      <h3>You havent posted any ads</h3>
      <p>After posting an ad it will show up here</p>
    </div>


    <?php
  }
}

?>

</table>

</div>


<!-- ad edit -->
<div>

 <?php

 $queryCheck2 = "SELECT ad_id FROM user_info WHERE id= $userID";
 $ad2 = mysqli_query($conn, $queryCheck2);


 while ($row = mysqli_fetch_assoc($ad2)) {
  $adIDCheck2 = $row["ad_id"];
        //echo "buddy ID is $buddyID <br>";
  if (!$adIDCheck) {
    ?>

            <!-- <input name="occupation" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="what do you  do?">
              <a href="" class="btn btn-md btn-primary btn-block">Remove Buddy</a> -->
              
              

              <?php

            }else{

              $query="SELECT * FROM user_ad WHERE ad_id= $adIDCheck2";
              $result = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_assoc($result)) {

                $existinginfo = $row["info"];
                $existingtype = $row["type"];
                $existingowner = $row["owner"];
                $existingcontact = $row["contact"];
                $existingarea = $row["area"];
                $existingprice = $row["price"];
                $existingbedroom = $row["bedroom"];            
                $existingwashroom = $row["washroom"];           
                $existingdrawing = $row["drawing"];             
                $existingdining = $row["dining"];              
                $existingliving = $row["living"];              
                $existingkitchen = $row["kitchen"];
                $existingtitle = $row["title"];
                $existingmail = $row["mail"];
                $existingaddress = $row["address"];             
// echo "bed is".$existingbedroom."<br>";
//                 echo "owner is".$existingowner."<br>";
//                 echo "contact is".$existingcontact."<br>";
//                 echo "price is".$existingprice."<br>";



// **************************************************************
                if(isset($_POST["update"] ) ){

                  function validateFormData( $formData ) {
                    $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
                    return $formData;
                  }

                
                    $existingtitle = validateFormData($_POST["title"]);

                  

                 
                    $existingtype = validateFormData($_POST["type"]);

                 

               
                    $existingarea = validateFormData($_POST["area"]);

              
                 
                    $existingprice = validateFormData($_POST["price"]);
                  
                  
                    $existingbedroom = validateFormData($_POST["bed"]);

                 
                 
                    $existingwash = validateFormData($_POST["wash"]);

                    $existingdrawing = validateFormData($_POST["drawing"]);


                    $existingdining = validateFormData($_POST["dining"]);

                    $existingliving = validateFormData($_POST["living"]);


                    $existingkitchen = validateFormData($_POST["kitchen"]);

                    $existingbachelor = validateFormData($_POST["bachelor"]);

                    $existingparking = validateFormData($_POST["parking"]);

                    $existingowner = validateFormData($_POST["owner"]);

                
                    $existingcontact = validateFormData($_POST["contact"]);
                  

                    $existingaddress = validateFormData($_POST["address"]);
                 


                    $existingemail = validateFormData($_POST["email"]);

                    $existinginfo = validateFormData($_POST["info"]);
                // echo "bed is".$existingbedroom;
                // echo "owner is".$existingowner;
                // echo "contact is".$existingcontact;
                // echo "price is".$existingprice;

                  // if($existingbedroom && $existingowner && $existingcontact && $existingprice){
                    // die("reached");
                    $query = "UPDATE `user_ad` SET `title` = '$existingtitle', 
                    `type` = '$existingtype', 
                    `area` = '$existingarea', 
                    `price` = $existingprice, 
                    `bedroom` = $existingbedroom, 
                    `washroom` = $existingwash, 
                    `drawing` = $existingdrawing, 
                    `dining` = $existingdining,
                     `living` = $existingliving, 
                     `kitchen`=$existingkitchen, 
                     `bachelor` = $existingbachelor,
                      `parking` = $existingparking,
                       `info` = '$existinginfo', 
                       `owner` = '$existingowner', 
                       `contact` = $existingcontact, 
                       `mail` = '$existingemail', 
                       `address` = '$existingaddress' WHERE `user_ad`.`ad_id` = $adIDCheck2;";
                    // die $query;



                    if( mysqli_query( $conn, $query ) ) {
                      echo "Updated AD database!". "<br>";
                      header('Location:profile.php');
                    } else {
                      echo "Couldnt submit ad ". $query . "<br>" . mysqli_error($conn);
                    }

                  // }


      // img********************************************************************************

//       $target_dir = "uploads/";
//       $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//       $uploadOk = 1;
//       $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//       // Check if image file is a actual image or fake image
//       // die($_POST["hideme"]);
//       $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//       // var_dump($_FILES);
//       // die ();
//       if($check !== false) {
//           echo "File is an image - " . $check["mime"] . ".";
//           $uploadOk = 1;
//       } else {
//           echo "File is not an image.";
//           $uploadOk = 0;
//       }

// // Check if file already exists
//       if (file_exists($target_file)) {
//           echo "Sorry, file already exists. Please change the name of the file. Suggested: Your name number";
//           $uploadOk = 0;
//       }
// // Check file size
//       if ($_FILES["fileToUpload"]["size"] > 1200*1024) {
//           echo "Sorry, your file is too large.";
//           $uploadOk = 0;
//       }
// // Allow certain file formats
//       if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//           && $imageFileType != "gif" ) {
//           echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//           $uploadOk = 0;
//       }
// // Check if $uploadOk is set to 0 by an error
//       if ($uploadOk == 0) {
//           echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
//       } else {
//           if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//               $namePic=basename( $_FILES["fileToUpload"]["name"]);
//               $query4 = "INSERT INTO `images` (`image_id`, `image`, `ad_id`) VALUES (NULL, '$namePic', $adID);";

//               if( mysqli_query( $conn, $query4 ) ) {
//                   echo "New image added to the image database!";
//               } else {
//                   echo "Couldnt add img id to user_ad". $query . "<br>" . mysqli_error($conn);
//               }



//               echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//           } else {
//               echo "Sorry, there was an error uploading your file.";
//           }
//       }





                }

// ********************************************************************************


              }?>

<div class="container">
            
          <h1>Update your ad</h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

            <p>* Required</p>

            <div class="form-group">
              <small>* <?php echo $titleError; ?></small>
              <label for="exampleFormControlTextarea1">Title Of your Advertisement</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title" value="<?php echo $existingtitle; ?>" ><?php echo $existingtitle; ?></textarea>
            </div>

            <div class="form-group">
              <small>* <?php echo $typeError; ?></small>
              <label for="exampleFormControlSelect1">Type of Advertisment</label>
              <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option <?php if($existingtype=="rent"){
                  echo "selected='selected'";
                } ?>value="rent">Rent</option>
                <option <?php if($existingtype=="sale"){
                  echo "selected='selected'";
                } ?>value="sale">Sale</option>
              </select>
            </div>

            <div class="form-group">
              <small>* <?php echo $areaError; ?></small>
              <label for="exampleFormControlInput1">Area</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" value=<?php echo $existingarea;?> name="area">
            </div>

            <div class="form-group">
              <small>* <?php echo $priceError; ?></small>
              <label for="exampleFormControlInput1">Price</label>
              <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $existingprice ;?>"" name="price">
            </div>

            <div class="form-group">
              <small>* <?php echo $bedError; ?></small>
              <label for="exampleFormControlSelect1">Bedroom</label>
              <select class="form-control" id="exampleFormControlSelect1" name="bed">
                <option <?php  echo "selected='selected' value='$existingbedroom'"; ?>><?php echo $existingbedroom; ?> </option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class="form-group">
              <small>* <?php echo $washError; ?></small>
              <label for="exampleFormControlSelect1">Washroom</label>
              <select class="form-control" id="exampleFormControlSelect1" name="wash">
               <option <?php  "selected='selected' value='$existingwashroom'"; ?> ><?php echo $existingwashroom; ?></option>
               <option value="1">1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>
             </select>
           </div>
           <div class="form-group">
            <small>* <?php echo $drawingError; ?></small>
            <label for="exampleFormControlSelect1">Drawing</label>
            <select class="form-control" id="exampleFormControlSelect1" name="drawing">
              <option <?php  "selected='selected' value='$existingdrawing'"; ?>><?php echo $existingdrawing; ?> </option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>

          <div class="form-group">
            <small>* <?php echo $diningError; ?></small>
            <label for="exampleFormControlSelect1">Dining</label>
            <select class="form-control" id="exampleFormControlSelect1" name="dining">
              <option <?php  "selected='selected' value='$existingdining'"; ?> ><?php echo $existingdining; ?></option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>

            </select>
          </div>
          <div class="form-group">
            <small>* <?php echo $livingError; ?></small>
            <label for="exampleFormControlSelect1">Living</label>
            <select class="form-control" id="exampleFormControlSelect1" name="living">
              <option <?php  "selected='selected' value='$existingliving'"; ?>><?php echo $existingliving; ?> </option>
              <option value=NULL>0</option>
              <option value="1">1</option>
              <option value="2">2</option>
            </select>
          </div>

          <div class="form-group">
            <small>* <?php echo $kitchenError; ?></small>
            <label for="exampleFormControlSelect1">Kitchen</label>
            <select class="form-control" id="exampleFormControlSelect1" name="kitchen">
              <option <?php  "selected='selected' value='$existingkitchen'"; ?>><?php echo $existingkitchen; ?> </option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </div>

          <div class="form-group">
            <small>* <?php echo $bachelorError; ?></small>
            <label for="exampleFormControlSelect1">Bachelor Allowed?</label>
            <select class="form-control" id="exampleFormControlSelect1" name="bachelor">
              <option <?php if($row["bachelor"]==1){
                echo "selected='selected'";
              } ?>value="1">Yes</option>
              <option <?php if($row["bachelor"]==2){
                echo "selected='selected'";
              } ?> value="2">No</option>

            </select>
          </div>

          <div class="form-group">
            <small>* <?php echo $parkingError; ?></small>
            <label for="exampleFormControlSelect2">Parking</label>
            <select class="form-control" id="exampleFormControlSelect2" name="parking">
             <option <?php if($row["parking"]==1){
              echo "selected='selected'";
            } ?>value="1">Yes</option>
            <option <?php if($row["parking"]==2){
              echo "selected='selected'";
            } ?> value="2">No</option>
          </select>
        </div>

        <div class="form-group">
          <small>* <?php echo $ownerError; ?></small>
          <label for="exampleFormControlInput1">Owner</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $existingowner;?>" name="owner">
        </div>

        <div class="form-group">
          <small>* <?php echo $contactError; ?></small>
          <label for="exampleFormControlInput1">Contact</label>
          <input type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $existingcontact;?>" name="contact">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" value="<?php echo $existingmail;?>" name="email">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Extra Info</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info" value="<?php echo $existinginfo;?>"><?php echo $existinginfo;?></textarea>
        </div>

        <div class="form-group">
          <small>* <?php echo $addressError; ?></small>
          <label for="exampleFormControlTextarea1">Address</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" value="<?php echo $existingaddress;?>"><?php echo $existingaddress;?></textarea>
        </div>

        <input type="submit" name="update" value="Submit" class="btn btn-lg btn-primary btn-block">


      </form>
      </div>

<?php
            }
          }
          ?>
          
    </div>



</body>
</html>
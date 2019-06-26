<?php
 session_start();

 if(!$_SESSION["username"]){
  die("Not authorized");
 }

 include ('connection.php');

 $userID= $_SESSION["user_id"];

  if(isset($_POST["add"] ) ){

    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    if(!$_POST["title"]){
        $titleError = "please put your title here <br>";
    }else{
        $title = validateFormData($_POST["title"]);

    }

    if(!$_POST["type"]){
        $typeError = "please put your type here <br>";
    }else{
        $type = validateFormData($_POST["type"]);

    }

    if(!$_POST["area"]){
        $areaError = "please put your area here <br>";
    }else{
        $area = validateFormData($_POST["area"]);

    }

    if(!$_POST["price"]){
        $priceError = "please put your price here <br>";
    }else{
        $price = validateFormData($_POST["price"]);
    }

    if(!$_POST["bed"]){
        $bedError = "please put your number of bed here <br>";
    }else{
        $bed = validateFormData($_POST["bed"]);

    }

    if(!$_POST["wash"]){
        $washError = "please put your number of washroom here <br>";
    }else{
        $wash = validateFormData($_POST["wash"]);

    }

    if(!$_POST["drawing"]){
        $drawingError = "please put your number of drawing here <br>";
    }else{
        $drawing = validateFormData($_POST["drawing"]);

    }

    if(!$_POST["dining"]){
        $diningError = "please put your number of dining here <br>";
    }else{
        $dining = validateFormData($_POST["dining"]);

    }

    if(!$_POST["living"]){
        $livingError = "please put your number of living here <br>";
    }else{
        $living = validateFormData($_POST["living"]);

    }

    if(!$_POST["kitchen"]){
        $kitchenError = "please put your number of kitchen here <br>";
    }else{
        $kitchen = validateFormData($_POST["kitchen"]);

    }

    if(!$_POST["bachelor"]){
        $bachelorError = "Can bachelors stay? <br>";
    }else{
        $bachelor = validateFormData($_POST["bachelor"]);

    }

    if(!$_POST["parking"]){
        $parkingError = "Is there parking here <br>";
    }else{
        $parking = validateFormData($_POST["parking"]);

    }

    if(!$_POST["owner"]){
        $ownerError = "please put The owners name here <br>";
    }else{
        $owner = validateFormData($_POST["owner"]);

    }

    if(!$_POST["contact"]){
        $contactError = "please put your contact number here <br>";
    }else{
        $contact = validateFormData($_POST["contact"]);
    echo ($contact);
    }

    if($_POST["address"]){
        $address = validateFormData($_POST["address"]);
    }else{
      $addressError = "please put your address here<br>";
    }


    if($_POST["email"]){
        $email = validateFormData($_POST["email"]);
    }

    if($_POST["info"]){
        $info = validateFormData($_POST["info"]);
    }

    if($bed && $owner && $contact && $price){
        $query = "INSERT INTO `user_ad` (`ad_id`, `title`, `date`, `type`, `area`, `price`, `bedroom`, `washroom`, `drawing`, `dining`, `living`, `kitchen`, `bachelor`, `parking`, `info`, `owner`, `contact`, `mail`, `address`) VALUES (NULL, '$title', CURRENT_TIMESTAMP, '$type', '$area', $price, $bed, $wash, $drawing, $dining, $living, $kitchen, $bachelor, $parking, '$info', '$owner', $contact, '$email', '$address');";

        if( mysqli_query( $conn, $query ) ) {
            echo "New record in AD database!". "<br>";
        } else {
            echo "Couldnt submit ad ". $query . "<br>" . mysqli_error($conn);
        }

    }
        //getting the newly insterted ad_id

    $query2= "SELECT ad_id FROM `user_ad` WHERE contact=$contact";
      //die ("THE contact  IS ".$query2. "<br>");
    $ad = mysqli_query($conn, $query2);

        while($row = mysqli_fetch_assoc($ad)){
        $adID= $row["ad_id"];
        echo ("THE ADID IS".$adID. "<br>");

        //putting ad_id to logged in users account
        $query3 = "UPDATE `user_info` SET `ad_id`= $adID WHERE `user_info`.`id`= $userID;";
//            UPDATE `user_info` SET `ad_id` = '7' WHERE `user_info`.`id` = 5;

        if( mysqli_query( $conn, $query3 ) ) {
            echo "New record in User database!". "<br>";
        } else {
            echo "Couldnt add ad id to users account". $query3 . "<br>" . mysqli_error($conn);
        }


    }

      // img********************************************************************************

      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Check if image file is a actual image or fake image
      // die($_POST["hideme"]);
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      // var_dump($_FILES);
      // die ();
      if($check !== false) {
          //echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }

// Check if file already exists
      if (file_exists($target_file)) {
          echo "Sorry, file already exists. Please change the name of the file. Suggested: Your name number";
          $uploadOk = 0;
      }
// Check file size
      if ($_FILES["fileToUpload"]["size"] > 1200*1024) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
// Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
// Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $namePic=basename( $_FILES["fileToUpload"]["name"]);
              $query4 = "INSERT INTO `images` (`image_id`, `image`, `ad_id`) VALUES (NULL, '$namePic', $adID);";

              if( mysqli_query( $conn, $query4 ) ) {
                  //echo "New image added to the image database!";
              } else {
                  echo "Couldnt add img id to user_ad". $query . "<br>" . mysqli_error($conn);
              }



              echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }





  }



?>

<!DOCTYPE html>
<html>
<head>
	<title>Post Ad| To-Let.Com</title>
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
   <a class="navbar-brand" href="index.html">To-Let.Com</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNav">
     <ul class="navbar-nav">
       <li class="nav-item ">
         <a class="nav-link" href="index.html"><i class="fas fa-home"></i>

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
         <li class="nav-item">
           <a class="nav-link" href="contact.html"><i class="fas fa-phone"></i> Contact Us</a>
         </li>
       </ul>
     <ul class="navbar-nav ml-auto">
      <li class="nav-item">
       <a class="nav-link" href="profile.php?id=<?php echo $userID;?>"><i class="fas fa-user"></i> your profile</a>
     </li>
     <li class="nav-item">
       <a class="nav-link " href="logout.php"> Log-out</a>
     </li>
   </ul>
 </div>
</nav>

<div class="container">
  
<h2>Hello, <?php echo (strtoupper($_SESSION["username"]))?> </h2>

<h1>Post your Advertisement</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post"  enctype="multipart/form-data">

  <p>* Required</p>

  <div class="form-group">
    <small>* <?php echo $titleError; ?></small>
    <label for="exampleFormControlTextarea1">Title Of your Advertisement</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="title"></textarea>
  </div>

  <div class="form-group">
    <small>* <?php echo $typeError; ?></small>
    <label for="exampleFormControlSelect1">Type of Advertisment</label>
    <select class="form-control" id="exampleFormControlSelect1" name="type">
      <option value="rent">Rent</option>
      <option value="sale">Sale</option>
    </select>
  </div>

  <div class="form-group">
    <small>* <?php echo $areaError; ?></small>
    <label for="exampleFormControlInput1">Area</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Gulshan" name="area">
  </div>

  <div class="form-group">
    <small>* <?php echo $priceError; ?></small>
    <label for="exampleFormControlInput1">Price</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="15000" name="price">
  </div>

  <div class="form-group">
    <small>* <?php echo $bedError; ?></small>
    <label for="exampleFormControlSelect1">Bedroom</label>
    <select class="form-control" id="exampleFormControlSelect1" name="bed">
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
      <option value=NULL>0</option>
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>

  <div class="form-group">
    <small>* <?php echo $kitchenError; ?></small>
    <label for="exampleFormControlSelect1">Kitchen</label>
    <select class="form-control" id="exampleFormControlSelect1" name="kitchen">
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
      <option value="1">Yes</option>
      <option value="2">No</option>

    </select>
  </div>

  <div class="form-group">
    <small>* <?php echo $parkingError; ?></small>
    <label for="exampleFormControlSelect2">Parking</label>
    <select class="form-control" id="exampleFormControlSelect2" name="parking">
      <option value="1">Yes</option>
      <option value="2">No</option>
    </select>
  </div>

    <div class="form-group">
      <small>* <?php echo $ownerError; ?></small>
    <label for="exampleFormControlInput1">Owner</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Rahim Mia" name="owner">
  </div>

    <div class="form-group">
      <small>* <?php echo $contactError; ?></small>
    <label for="exampleFormControlInput1">Contact</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="01764648431" name="contact">
  </div>

    <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Extra Info</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="info"></textarea>
  </div>

  <div class="form-group">
    <small>* <?php echo $addressError; ?></small>
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
  </div>
  <div class="form-group">
    <p>Max 1 image</p>
    <p>Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"></p>
<!--     Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br> -->
    <!-- <input type="hidden" name="hideme" value="bla bla"/> -->
<!--     <input type="submit" value="Upload Image" name="submit"> -->
  </div>

  <input type="submit" name="add" value="Submit" class="btn btn-lg btn-primary btn-block">

</form>
<!--   <form action="postAd.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <!-- <input type="hidden" name="hideme" value="bla bla"/> -->
<!--     <input type="submit" value="Upload Image" name="submit">
  </form> -->





<br>
<br>

</div>


</body>
</html>
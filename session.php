<?php

if($_SESSION["username"]){
	$userID= $_SESSION["user_id"];
?>
<ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php?id=<?php echo $userID;?>"><i class="fas fa-user"></i> Your account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fas fa-user-circle"></i> Logout</a>
      </li>
    </ul>

<?php  
}else{
	?>
	<ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="signUp.php"><i class="fas fa-user-plus"></i> Sign-Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><i class="fas fa-user-circle"></i> Login</a>
      </li>
    </ul>

    <?php
}
 ?>



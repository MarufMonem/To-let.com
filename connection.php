<?php
/**
 * Created by PhpStorm.
 * User: Anik
 * Date: 12/23/2018
 * Time: 10:31 AM
 */
$server = "localhost"; //working in a local PC
$username = "root";   // local user name and password
$password = "root";
$db = "tolet"; // database name

//create a connectiom
$conn = mysqli_connect($server,$username, $password, $db);

//check connection
if(!$conn){
    die("connection failed". mysqli_connect_error());
}

//echo "connected successfully"."<br>";

?>
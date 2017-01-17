<?php
session_start(); //starts the session
if($_SESSION['user']){ //checks if user is logged in
}
else {
    header("location:index.php"); //redirects if user is not logged in.
}

if($_SERVER['REQUEST_METHOD'] == "GET")
{
    $con = mysqli_connect("localhost", "root", "334675Ld!", "first_db");
    mysqli_select_db($con, "first_db") or die("cannot connect to database"); //Connect to database
    $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM list WHERE id='$id'");
    header("location:home.php");
}

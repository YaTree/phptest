<?php
session_start();
if($_SESSION['user']){
}
else{
    header("location:index.php");
}
if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
{
    $con = mysqli_connect("localhost", "root","334675Ld!", "first_db"); //Connect to server
    $details = mysqli_real_escape_string($con, $_POST['details']);
    $time = strftime("%X");//time
    $date = strftime("%B %d, %Y");//date
    $decision ="no";

    mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //Connect to database
    foreach($_POST['public_'] as $each_check) //gets the data from the checkbox
    {
        if($each_check != null){ //checks if the checkbox is checked
            $decision = "yes"; //sets teh value
        }
    }

    mysqli_query($con, "INSERT INTO list (details, date_posted, time_posted, public_) VALUES ('$details','$date','$time','$decision')"); //SQL query
   // mysqli_query($con, "INSERT INTO users (username, password, info) VALUES ('username','password', 'text-info')"); //Inserts the value to table users
//    var_dump($_POST);
//    echo "<br/>";
//    echo "$date";
//    echo "<br/>";
//    echo "$time";
//    echo "</br>";
//    echo $_POST['public_'];
//    echo "<br/>";
//    echo "$details";
      header("location: home.php");
  //  print "WTF?!";
}
else
{
    header("location:home.php"); //redirects back to hom
}

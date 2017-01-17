<?php
    session_start();

    if($_SESSION['user']) {
    } else {
        header("location:index.php");
    }

    if($_SERVER['REQUEST_METHOD'] = "POST") {
        $con = mysqli_connect("localhost", "root","334675Ld!", "first_db"); //Connect to server
        $details = mysqli_real_escape_string($con, $_POST['details']);
        $time = strftime("%X");//time
        $date = strftime("%B %d, %Y");//date
        $decision ="no";

        mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //Connect to database
        foreach($_POST['public_'] as $each_check) {
            if($each_check != null) { //checks if the checkbox is checked
                $decision = "yes"; //sets teh value
            }
        }

        mysqli_query($con, "INSERT INTO list (details, date_posted, time_posted, public_) VALUES ('$details','$date','$time','$decision')"); //SQL query
        //var_dump($_POST);
        header("location: home.php");
    } else {
        header("location:home.php"); //redirects back to hom
    }

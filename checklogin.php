<?php
session_start();

$con = mysqli_connect("localhost", "root", "334675Ld!", "first_db"); //Connect to server
mysqli_select_db($con,"first_db") or die ("Cannot connect to database"); //Connect to database
$username = "";
$password = "";

if (isset($_POST['username'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    echo $username;
} else {
    echo "WTF?!";
}

if (isset($_POST['password'])) {
    $password = mysqli_real_escape_string($con, $_POST['password']);
} else {
    echo "WTF1?!";
}$bool = true;


    $query = mysqli_query($con, "Select * from users WHERE username='$username'"); // Query the users table
    $exists = mysqli_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {

        while($row = mysqli_fetch_assoc($query)) // display all rows from query
        {
            $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
            $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
        }
        if(($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
        {
            if($password == $table_password)
            {
                $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                header("location: home.php"); // redirects the user to the authenticated home page
            }
        }
        else
        {

            Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
            Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
        }
    }
    else
    {

        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        //Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
        echo "--></br>";
        echo $username;
        echo "\n";
    }

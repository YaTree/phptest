<html>
<head>
    <title>My first PHP Website</title>
</head>
<body>
<?php
    echo "<p>Hello World!</p>";
?>
<a href="login.php"> Click here to login</a>
<a href="register.php"> Click here to register</a>




</body>
<br/>
<h2 align="center"> List</h2>
<table width="100%" border="1px">
    <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post Time</th>
        <th>Edit Time</th>
    </tr>
    <?php
    $con = mysqli_connect("localhost", "root", "334675Ld!", "first_db");
    mysqli_select_db($con, "first_db") or dir ("Cannot connect to database");
    $query = mysqli_query($con, "Select * from list Where public_='yes'");

    while($row = mysqli_fetch_array($query)) {
        Print "<tr>";
        Print '<td align="center">'. $row['id']."</td>";
        Print '<td align="center">'. $row['details']."</td>";
        Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
        Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']."</td>";
        Print "</tr>";
    }
    ?>

</table>
</html>
<?php
    session_start();
    require "Config.php";

    $username = $_POST['email'];
    $password = $_POST['password'];

    // To prevent mysqli injection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);


    $sql = "SELECT * FROM `login` WHERE email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Check for query execution errors
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the result as an associative array
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username;
        header("location: Dash.php");
        
    } else {
       // echo "<h1>Login failed. Invalid username or password.</h1>";
       echo "<center>";
       echo "<img src='image/404.jpg' alt='logo' height='80%'>";
        echo "<h1>Login failed. Invalid username or password.</h1>";
       echo "</center>";
    }

?>
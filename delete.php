<?php
    require ("Config.php");
    $id = $_REQUEST['id'];

    $delete = "DELETE FROM `students` WHERE `id`='$id'";
    $result = mysqli_query($conn,$delete);

    //header("location:Dashbord.php");
    if($result){
        echo '<script>alert("Record deleted!")</script>';
        echo "<script>window.location.href ='Dash.php';</script>";
    }
?>
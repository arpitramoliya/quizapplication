<?php
  require "Config.php";
 
  //get data
    if(isset($_REQUEST['update'])){

        //get data
        $id         =   $_REQUEST['id'];
        $name       =   $_REQUEST['name'];
        $email      =   $_REQUEST['email'];
        $password   =   $_REQUEST['password'];
        $contact    = $_REQUEST['contact'];
        $dob        =   $_REQUEST['dob'];
        
        //update
        $qry = "UPDATE `students` SET name='$name',  email='$email', password='$password', contact='$contact', dob='$dob' WHERE id = '$id' ";
        $run = mysqli_query($conn,$qry);

        if($run){
            echo '<script>alert("Record Update Successfully!")</script>';
            echo "<script>window.location.href ='Dash.php?id=$id';</script>";

        }
    }


?>

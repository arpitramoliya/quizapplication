<?php
    require 'Config.php';
    
   if(isset($_POST['submit'])){
        $name           =   htmlspecialchars(trim($_POST['name']));
        $email          =   htmlspecialchars(trim($_POST['email']));
        //$password       =   password_hash(trim($_POST['password']), PASSWORD_DEFAULT); 
        $password       =    htmlspecialchars(trim($_POST['password'])); 
        $contact        =    htmlspecialchars(trim($_POST['contact']));
        $dob            =    htmlspecialchars(trim($_POST['dob']));
        $status         =    htmlspecialchars(trim($_POST['status'])); 

        $sql = "INSERT INTO `students` (`name`, `email`, `password`, `contact`, `dob`) VALUES ('$name', '$email', '$password', '$contact', '$dob')";
        $query =  mysqli_query($conn, $sql);
        if($query){
            //echo "Sucesss";
            header('location:login.php');
        }else{
            echo "Data Not Insert! &#x1F61F ";
        }
   }
?>
<?php
$conn= mysqli_connect("localhost","root","","musicplayer");
if(isset($_POST['submit'])){//if the user click on submit
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $email= $_POST['email'];
    $password= $_POST['passw'];
    $comfirmPass= $_POST['comfirmPass'];

    $query= "INSERT INTO userlogin(first_name,last_name,email,passw,comfirmPassword) values('$fname','$lname','$email','$password','$comfirmPass')";
    $result = mysqli_query($conn, $query);
    
    
   
    

}
include("home.php");


?>


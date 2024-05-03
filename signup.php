<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup system</title>
    <link rel="stylesheet" href="signup.css"> 
    <style type="Text/css">
        label{
            width: 100%;
            display: inline-block;
            margin:5px;
        }
        #form{
            border-radius: 10px;
            background:rgba(0,0,100,0.1);
            color: white;
            Width: 400px;
            padding: 15px;
            margin-left:2px;
            
        }
        h1{
            text-align:center;
        }
#sub{
  
    cursor:pointer;
}
    </style>

    
</head>

<div id="form">
    <h1>Login</h1>
    
<form action="process.php" method="Post">
<span color="black">Firstname</span><input type="text"name="fname" id=""placeholder="Enter your Firstname" required><br><br>
<span>Lastname</span><input type="text"name="lname" id=""placeholder="Enter your Lastname" required><br><br>
<span>Email</span><input type="email"name="email" id=""placeholder="Enter your Email" required><br><br>
<span>Password</span><input type="password"name="passw" id=""placeholder="Enter your password" required><br><br>
<span>Repeat Pass</span><input type="password"name="comfirmPass"id=""placeholder="comfirm your password"required><br><br>
<a href="home.php"><input class="submit1_button" type="submit"name="submit" value="Continue"><br>

</div> 
</html>
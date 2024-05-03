<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

body{    
    background: linear-gradient(90deg,#009999,#990099);
}

  table{
      border-collapse: collapse;
      color:#588c7e;
      font-family: monospace;
      font-size:25px;
      text-align: left;
  }  
  button{
    border-collapse:collapse;
    border: 0px;  
    background: linear-gradient(90deg,#009999,#990099);
 
  }
  th{
    background-color: #588c7e;
    color:white;
  }
  
.delete_btn{
        background:#ff3333 ; 
        padding: 5px;
       }

</style>


<body style="margin:50px;">

    <h1>List of users<h1>
        <br>
        <table class="table">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>First Name</th>
                   <th>Last Name</th>
                   <th>Email</th>
                   <th>Password</th>
                   <th>confirm Password</th>
                  
               </tr>
           </thead> 
           <tbody>
    <?php
               $servername="localhost";
               $username="root";
               $password="";
               $database="musicplayer";

               $connection= new mysqli( $servername, $username, $password, $database);

               if($connection->connect_error){
                   die("failed to connect:".$connection->connect_error);
               }


               $sql = "SELECT * FROM userlogin";
               $result = $connection->query($sql);

               if(!$result){
                   die("Invalid Query:".$connection->error);
               }

              // read data of each row
              while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[first_name]</td>
                    <td>$row[last_name]</td>
                    <td>$row[email]</td>
                    <td>$row[passw]</td>
                    <td>$row[comfirmPassword]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/musicplayer/edituser.php?id=$row[id]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/musicplayer/deleteuser.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                ";
            }



              
               ?>
           </tbody>
        </table>
</body>
</html>
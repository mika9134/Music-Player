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
<body style="margin: 50px;">
    <center>

        <h1>List of Albums<h1>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Albums_no &nbsp;</th>
                        <th >Album Name</th>
                        <th>Artsit &nbsp;</th>
                        <th>Total tracks</th>
                        
                    </tr>
                </thead> 
                <tbody>
               <?php      
                             
                             
                             $servername="localhost";
                             $username="root";
                             $password="";
                             $database="musicplayer";
                             
                             
                             
                             $connection= new mysqli( $servername, $username, $password, $database);
                             // $after=" <a class='btn btn-warning btn-sm' href='/musicplayer/after_hourse.php'>show</a>";
                             // $afters=" <a class='btn btn-warning btn-sm' href='/musicplayer/after_hourse.php'>show</a>";
                             // $afterss=" <a class='btn btn-warning btn-sm' href='/musicplayer/after_hourse.php'>show</a>";
                             
               if($connection->connect_error){
                   die("failed to connect:".$connection->connect_error);
                }
                
                
                
                $sql = "SELECT * FROM tracks";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid Query:".$connection->error);
                }
                
                while($row = $result->fetch_assoc()){ 
            
                    echo "<tr>
                    <td>". $row["Album_no"] . "</td>
                    <td>". $row["Album_name"] . "</td>
                    <td>". $row["Artist"] . "</td>
                    <td>". $row["Total_tracks"] . "</td>
                    
                    <td>
                
                    <button><a class='delete_btn' href='deletealbum.php?Album_no=$row[Album_no]'>Delete</a></button>  
                  
                  </td>
                  </tr>";
                  
                }
 
                ?>
           </tbody>
        </table>
    </center>
</body>
</html>
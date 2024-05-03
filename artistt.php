<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{    background: linear-gradient(90deg,#009999,#990099);
}
        table{
            border-collapse:collapse;
            color:#588c7e;
            font-family:monospace;
            font-size: 25px;
            text-align:left;
        }
        button{
            border-collapse:collapse;
            border:0px;
            background: linear-gradient(90deg,#009999,#990099);
        }

        th{
            background-color:#588c7e;
            color:white;
            
        }
         
        .delete_btn{
            background:#ff3333;
            padding:5px;
        }
       
    </style>
</head>
<body style="margin: 50px;">
<center>
    <h1>List of Artists<h1>
        <br>
        <table class="table">
           <thead>
               <tr>
                   <th>ID &nbsp;</th>
                   <th>Artist Name</th>
                   <th>Remove</th>
                  
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


               $sql = "SELECT * FROM artist_name";
               $result = $connection->query($sql);

               if(!$result){
                   die("Invalid Query:".$connection->error);
               }

               while($row = $result->fetch_assoc()){
                echo "<tr>
                <td>". $row["ID"] . "</td>
                <td>". $row["Artist_Name"] . "</td>
      

                <td>
              <button>  <a class='delete_btn' href='/musicplayer/deleteartist.php?ID=$row[ID]'>Delete</a></button> 
              </td>
           
               
            </tr>";

               }
              
           
            
              
               ?>
           </tbody>
        </table>
        </center>
</body>
</html>
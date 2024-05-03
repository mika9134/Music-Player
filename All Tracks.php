
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tracks &sung;&sung;</title>
    <link rel="stylesheet" href="resources/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/musicplayer/Alltracks.css">
</head>
<body>

        <div class="main">
            <header class="navbar">
                <h1>Tracks</h1>
                
            </header>
            
            <div class="container">
                <h2 style="padding: 20px 20px;">Track list</h2>
                <table class="tracks">
                    <thead>
                        <tr>
                            <th>Song Title</th>
                            <th>Duration</th>
                            <th>Artist</th>
                            <th>Album</th>
                            <th>Favorites</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php 
                            
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $database = "musicplayer";
                        


                            $con = new mysqli($servername,$username,$password,$database);
                                if($con->connect_error){
                                    die("Connection to database aborted: ". $con->connect_error);
                                }

                                $sql = "SELECT * FROM alltracks";
                                $result = $con->query($sql);
                                
                                    if(!$result){
                                        die("No tracks available: ".$connect_error);
                                    }
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>
                                                    <td>" . $row["Title"] . "</td>
                                                    <td>" . $row["Duration"] . "</td>
                                                    <td>" . $row["Artist"] . "</td>            
                                                    <td>" . $row["Album"] . "</td>
                                                    <td>
                                                      <a class=\"\"><i class=\"fa fa-heart\" aria-hidden=\"true\"></i></a>     
                                                    </td>
                                                </tr>";
                                                
                                        };
                        ?>
 
                    </tbody>
                    
                </table>
                
            </div>
        </div>


</body>
<script src="alltracks.js"></script>
<script src="resources/jquery.js"></script>
<script>
    var navbar = document.querySelector(".navbar")
    window.onscroll = function(){
        this.scrollY > 25 ? navbar.classList.add("fixed"):
                            navbar.classList.remove("fixed")
    }
</script>
<script>
    $(document).ready(function(){
        
        $("a").click(function(){
            var clicked = true;
            window.clicked = clicked;
            if(clicked){
                $(this).toggleClass("fav")
                alert("Song is added to Favorites")
                clicked = true;
                
            }
            else {
                alert("Song removed from Favorites")
                
                //rollback();
                
            }
            
        })
    })
</script>
</html>
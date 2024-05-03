<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="stylesheet" href="http://localhost/musicplayer/search.css">
    <title>Search | enter inquire</title>
</head>
<body>
    
        <h2>&#9834;Search&#9834;</h2>
            <div class="search_box">
                
                <form class="search_form" action="" method="POST">
    
                        <input type="text" name="search" class="input" value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" placeholder="Song name, Artist, Album..."> 
                        <button class="btn" > <i class="fa fa-search"></i> </button> 
                         <!-- onclick="showResults()" -->
                </form>
            </div>
            
           <!-- <template class="searchresult"> -->
                <div class="result">
                    <table class="tblstyle">
                        <thead>
                            <th>Song</th>
                            <th>Artist</th>
                            <th>Album</th>
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

                                    
                                
                                if(isset($_POST['search'])){
                                  if($_POST['search'] == "") {
                                    echo "
                                    <tr>
                                    <td style=\" font-size: 20px; color:#c30d00f8;\" colspan=\"4\">Input search parameters!!!</td>
                                    </tr>
                                    ";
                                  } 
                                  else{
                                    $inquery = $_POST['search'];
                                    $query = "SELECT * FROM alltracks WHERE CONCAT(Title,Artist,Album) LIKE '%$inquery%' ";
                                    $result = $con->query($query);
                                    $check = mysqli_num_rows($result);

                                        if($check>0){
                                            
                                            foreach($result as $col){

                                                echo "
                                                        <tr>
                                                            
                                                            <td>" . $col['Title'] . "</td>
                                                            <td>" . $col['Artist'] . "</td>
                                                            <td>" . $col['Album'] . "</td>
                                                        </tr>
                                                ";
                                                //$con->close();
                                            }
                    
                                        }
                                        else{
                                            
                                            echo "
                                                <tr>
                                                <td colspan=\"4\">No result found!</td>
                                                </tr>
                                            ";
                                            //$con->close();

                                        }
                                  }
                                    

                                }   
                            ?>
                        </tbody>
                    </table>
                </div>      
            <!-- </template> -->

</body>
<script>
    var navbar = document.querySelector("h2")
    window.onscroll = function(){
        this.scrollY > 50 ? navbar.classList.add("fixed"):
                            navbar.classList.remove("fixed")
    }
</script>
<script>
$(document).ready(function(){
    let searchbtn = document.querySelector(".btn");
    searchbtn.addEventListener('click', ()=> {
        let rslt = document.querySelector(".result");
        rslt.show().delay(2000).fadeOut();
        // if(rslt.style.display != 'inline'){
        //     rslt.style.display = 'inline'
        // }
        // else{
        //     rslt.style.display = 'none'
        // }

    })
    // })
    // function showResult(){
    //     var rslt = document.querySelector(".result");
    //     if(rslt.style.display == 'none')
    //         rslt.style.display = 'block';
    //     else
    //         rslt.style.display == 'block';
    //    }
    // function showResults(){
    //     let temp = document.querySelector(".searchresult");
    //     let tbl = temp.content.cloneNode(true);
    //     document.querySelector("body").appendChild(tbl);
    //     var rslt = document.querySelector(".result");
    //     if(rslt.style.visibility != 'visible')
    //         rslt.style.visibility = 'visible';
    //     else
    //         rslt.style.display == 'block';
       
    // }
    
})    
</script>

</html>
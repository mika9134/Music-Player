<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "musicplayer";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // GET method: Show the data of the client

    if ( !isset($_GET["id"]) ) {
        header("location: /musicplayer/Display.php");
        exit;
    }

    $id = $_GET["id"];

    // read the row of the selected client from database table
    $sql = "SELECT * FROM userlogin WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /musicplayer/Display.php");
        exit;
    }

    $fname = $row["first_name"];
    $lname = $row["last_name"];
    $email = $row["email"];
    $password = $row["passw"];
    $comfirmPassw = $row["comfirmPassword"];
}
else {
    // POST method: Update the data of the client

    $id=$_POST["id"];
    $fname = $_POST["first_name"];
    $lname= $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["passw"];
    $comfirmPassw = $_POST["comfirmPassword"];

    do {
        if ( empty($id) || empty($fname) || empty($lname) || empty($email) || empty($password) || empty($comfirmPassw) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE userlogin " .
               "SET first_name = '$fname', last_name = '$lname', email = '$email', passw = '$password', confirmPassword = '$comfirmPassw' " .
               "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "User updated correctly";

        header("location: /musicplayer/Display.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musicplayer</title>
   
</head>
<body>
    <div class="container my-5">
        <h2>New User</h2>


        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">FName</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $fname; ?>">
                </div>
            </div>

        
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">LName</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $lname; ?>">
                </div>
            </div>



            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">confirmPassword</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $comfirmPassw; ?>">
                </div>
            </div>


        

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/musicplayer/Display.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php
session_start();

if(isset($_SESSION['id'])&& isset($_SESSION['user_name'])){
 
    ?>

<?php
$servername = "localhost";   // or 127.0.0.1
$username   = "root";        // XAMPP default user
$password   = "";            // blank by default
$database   = "deletehunger";
// create connection
$connection = new mysqli($servername, $username, $password, $database);

$id="";
$name="";
$email="";
$phone="";
$address="";
$organisation="";
$dd="";
$gst="";
$addhaar="";
$slot="";
$check="";
$pin="";


$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location: log.php");
        exit;
    }

    $id=$_GET["id"];

     

    

    do{
        if(empty($id)){
            $errorMessage="All fields are Required";
            break;
        }

        
        $sql="UPDATE details SET status = 'cancelled'  WHERE id = '$id'";
        
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query:" . $connection->error;
            break;
        }

        $successMessage="Client updated correctly";
        header("location: log.php");
        exit;

    }while(false);
}

?>


<?php
}
else{
    header("Location: ../index.php");
    exit();
}
?>
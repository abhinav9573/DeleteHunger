<?php
session_start();

if(isset($_SESSION['id'])&& isset($_SESSION['use_name'])){
    ?>

<?php
$servername="127.0.0.1:3306";
$username="u130083126_deletehunger";
$password="Deletehunger@2024";
$databse="u130083126_deletehunger";
// create connection
$connection=new mysqli($servername,$username,$password,$databse);


$venue="";
$date="";
$time="";
$people="";
$Comments="";
$name="";



if($_SERVER['REQUEST_METHOD']=='POST'){
    $venue=$_POST["venue"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $people=$_POST["people"];
    $Comments=$_POST["Comments"];
    $name=$_POST["name"];
   

    $errorMessage="";
    $successMessage="";

    do{
        if(empty($venue)|| empty($date)|| empty($time)||empty($people)||empty($Comments)){
            $errorMessage="All fields are Required";
            break;
        }
        
        // add new client to database
        $sql="INSERT INTO details(venue,date,time,people,Comments,name,status) " . 
             "VALUES ('$venue','$date','$time','$people','$Comments','$name','active')";
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query: ". $connection->error;
            break;
        }



        $venue="";
        $date="";
        $time="";
        $people="";
        $Comments="";
        $name="";
       

        $successMessage="Client added correctly";
        header("location: index.php");
        exit;


    }while(false);
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Caterer Management system</title>
<link href="../img/logob.png" rel="icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="cms.css">
 <link rel="script" href="main. js">
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="../img/logo.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Admin Panel</b></h4>
    <p class="w3-text-grey"><?php echo $_SESSION['user_name'] ?></p>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" class="w3-bar-item w3-button w3-padding  "><i class="fa fa-user fa-fw w3-margin-right"></i>Log</a> 
    <a   class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Order_entry</a>
    <a href="new-register.php"  class="w3-bar-item w3-button w3-padding "><i class="fa fa-pencil-square-o fa-fw w3-margin-right"></i>New_register</a>
    <a href="register.php"  class="w3-bar-item w3-button w3-padding "><i class="fa fa-align-justify fa-fw w3-margin-right"></i>Register</a> 
    <a href="../logout.php"  class="w3-bar-item w3-button w3-padding"><i class="fa fa-lock fa-fw w3-margin-right"></i>Logout</a>
  </div>
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="../img/logo.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Order Details</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      
    </div>
    </div>
  </header>


  
  <!-- Contact Section -->
   
  <div class="container">
  <form method="post">
    <div class="row">
      <div class="col-25">
        <label for="venue">Venue*</label>
      </div>
      <div class="col-75">
        <input type="text" id="venue" name="venue" placeholder="venue" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="date">Date*</label>
      </div>
      <div class="col-75">
        <input type="text" id="date" name="date" placeholder="date" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="time">Time*</label>
      </div>
      <div class="col-75">
        <input type="text" id="time" name="time" placeholder="time" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="people"> Food for number of people*</label>
      </div>
      <div class="col-75">
        <input type="text" id="people" name="people" placeholder="Food for number of people" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="people"> Username*</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="name" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="comments">Comments</label>
      </div>
      <div class="col-75">
        <textarea id="comments" name="Comments" placeholder="Aditional Comments" style="height:200px" required></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
  

<!-- End page content -->
</div>



</body>
</html>
<?php
}
else{
    header("Location: ../index.php");
    exit();
}
?>
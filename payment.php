<!-- The popup message that shows after successfull trasnfer -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

        <title>Trasnfer Page</title>
    </head>
<body>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
    <!-- Importing Navbar -->
   <?php require_once './navbar.php'; ?>

   <?php  
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "bank";
    // Creating a database connection
    $con = mysqli_connect($server, $username, $password, $database);

    //Checking for a successfull connection
    if(!$con){
        die("Connection to the database failed due to" . mysqli_connect_error());
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $sender = $_POST['sender'];
        $rec = $_POST['rec'];
        $amount = $_POST['amount'];
    }
     $sql3 ="SELECT balance FROM customer where Name='$sender';";
     $sql = "UPDATE customer SET balance=(balance-$amount) where Name='$sender';";
     $sql1 = "UPDATE customer SET balance=(balance+$amount) where Name='$rec';";
     $sql2 = "INSERT INTO transactions (sender,reciever,amount)VALUES('$sender','$rec',$amount)";
        $result3=mysqli_query($con,$sql3);
    while($row3 = mysqli_fetch_array($result3)){
        if($amount>$row3["balance"]){
            echo "<script> alert('Insufficient Balance')</script>";
            echo "<script> window.location.href='customer.php'</script>";
        }
        else{
            $result=mysqli_query($con,$sql);
            $result1=mysqli_query($con,$sql1);
            $result2=mysqli_query($con,$sql2);
            echo "<script> alert('Transaction is Successful !!!')</script>";
            echo "<script> window.location.href='mainpage.php'</script>";
        }
    }
?>

<!-- Footer -->
<?php require_once './footer.php' ?>
    
</body>
</html>
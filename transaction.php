<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

        <title>Transaction Page</title>
    </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   <!-- Navbar importing -->
   <?php require_once './navbar.php'; ?>

   <?php  
        echo '<br><h1 class="intro"><center>Transaction History</center></h1>';
        echo '<table class=" listtable table-dark table  table-striped table-hover mt-5"  style="opacity: 0.9; width: 70%; margin: auto;">
        <tr>
            <th>ID</th>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Transferred Amount</th>
        </tr>';
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "bank";
        // Create a database connection
        $con = mysqli_connect($server, $username, $password, $database);

        // Check for connection success
        if(!$con){
            die("connection to this database failed due to" . mysqli_connect_error());
        }
        
        $sql = "SELECT trans_id,sender,reciever,amount FROM transactions;";
        
        // Execute the query
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)){
                // var_dump($row);
                echo '<tr>
                <td>'.$row["trans_id"].'</td>
                <td>'.$row["sender"].'</td>
                <td>'.$row["reciever"].'</td>
                <td>'.$row["amount"].'</td>
            </tr>';
            }
        echo'</table>';
    ?>
    <br><br>
    <!-- Home button to take you to the main page -->
    <center><a href="mainpage.php"><button class="btn btn-success" type="button" >Home</button></a></center>
    <br><br>
    <!-- Footer -->
    <?php require_once './footer.php' ?>
     
</body>
</html>
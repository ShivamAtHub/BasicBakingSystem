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
        // Create a database connection
        $con = mysqli_connect($server, $username, $password, $database);

        // Check for connection success
        if(!$con){
            die("Connection to this database failed due to" . mysqli_connect_error());
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name = $_POST['cus'];
        }
        $sql = "SELECT balance FROM customer WHERE Name='$name';";
        $sql1 = "SELECT Name FROM customer;";
    ?>

    <!-- Transaction main body -->
    <div class="intro">
        <br><center><h1>Transaction</h1></center>
    </div><br>
    <div class="container-xl" style="width:30%">
        <form action="payment.php" method="POST">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Sender &nbsp</span>
                </div>
                <input type="text" value="<?php echo $name?>" class="form-control" id="sender" name="sender"
                    aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly>
            </div>
            
            <?php $result=mysqli_query($con,$sql); ?>
            <?php while($row=mysqli_fetch_array($result)):; ?>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Balance&nbsp</span>
                </div>
                <input type="text" value="<?php echo $row[0];?>" class="form-control" aria-label="Default"
                    aria-describedby="inputGroup-sizing-default" readonly>
            </div>
            <?php endwhile ;
            ?>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Receiver</span>
                </div>
                <select id="rec" name="rec" class="form-control" aria-label="Default"
                    aria-describedby="inputGroup-sizing-default">
                    <?php $result1=mysqli_query($con,$sql1); ?>
                    <?php while($row1=mysqli_fetch_array($result1)):; ?>
                    <option value="<?php echo $row1[0]; ?>">
                        <?php echo $row1[0]; ?>
                    </option>
                    <?php endwhile ;
            $con->close();
            ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                </div>
                <input type="number" name="amount" class="form-control" aria-label="Default"
                    aria-describedby="inputGroup-sizing-default" required placeholder="Enter Amount to trasnfer here"
                    oninvalid="this.setCustomValidity('Please fill the Amount')" oninput="this.setCustomValidity('')">
            </div><br>
            <!-- Confirm Send Money button -->
            <center><button class="btn btn-success btn-lg btn-block" value="Transfer">Send Money</button>

            <!-- Cancel button that takes you to home page -->
            <a href="mainpage.php"><button class="btn btn-success btn-lg btn-block" type="button">Cancel Transaction</button></center>
        </form>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php require_once './footer.php' ?>
    
    </body>
    </html>
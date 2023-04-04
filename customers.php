<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Customer Page</title>
    </head>
<body>

<!-- AOS Animations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   
  <!-- Importing Navbar with database connection -->
  
   <?php require_once './navbar.php'; 
   

    echo '<br><h1 class="intro"><center>Customer Details</center></h1>';
    echo '<table class=" listtable table-dark table  table-striped table-hover mt-5"  style="opacity: 0.9; width: 70%; margin: auto;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Balance</th>
    </tr>';
       $server = "localhost";
       $username = "root";
       $password = "";
       $database = "bank";
       // Creating a database connection
       $con = mysqli_connect($server, $username, $password, $database);
   
       // Checking for a successfull connection
       if(!$con){
           die("Connection to this database failed due to" . mysqli_connect_error());
       }
         
        $sql = "SELECT id,Name,email,balance FROM customer;";
        $sql1 = "SELECT Name FROM customer;";
        
        // Executing the query
           $result=mysqli_query($con,$sql);
           while($row=mysqli_fetch_array($result)){
               // var_dump($row);
               echo '<tr>
               <td>'.$row["id"].'</td>
               <td>'.$row["Name"].'</td>
               <td>'.$row["email"].'</td>
               <td>'.$row["balance"].'</td>
           </tr>';
             }
    echo'</table>';
   ?><br>

   <!-- Trasnfer money section -->
     <form action="confirm.php" method="POST" style="text-align:center">
       <label class="choose">Choose the sender customer: </label>
       <select id="cus" name="cus" style="width:15%">
         <?php $result1=mysqli_query($con,$sql1); ?>
         <?php while($row1=mysqli_fetch_array($result1)):; ?>
         <option value="<?php echo $row1[0]; ?>">
           <?php echo $row1[0]; ?>
         </option>
         <?php endwhile ;
       $con->close();
       ?>
   
       </select><br>
       <div><button class="btn btn-success btn-lg" style="margin-top:20px;">Confirm</button>
       <a href="mainpage.php"><button class="btn btn-success btn-lg" type="button" style="margin-top:20px;">Home</button></a></div>     
     </form><br>

     <!-- Footer  -->
     <?php require_once './footer.php' ?>
     
</body>
</html>
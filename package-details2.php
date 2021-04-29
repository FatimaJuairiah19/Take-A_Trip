<?php
session_start();

include "db_conn.php";



     
         if(isset($_POST['book'])) {
           if( !isset($_SESSION['Id']) ){
             echo  "Login required." ;
            header('location:login1.php');
           }
              
            else{
              header('location:index_sajek.php');
            }
       }
            

if(isset($_POST["ok"])){
  
  $firstName= $rows['firstName'];
  $email= $rows['email'];
  $resortName= $rows['resortName'];
  $costPerNight= $rows['costPerNight'];
  $package= $rows['package'];
  $costPerday= $_SESSION['costPerday'];
  $costOfVehicle= $_SESSION['costOfVehicle'];
  $otherCost= $_SESSION['otherCost'];
  $totalCost= $_SESSION['totalCost'];

  $sql ="INSERT INTO booking(firstName,email,resortName,costPerNight,package,costPerday,costOfVehicle,otherCost,totalCost) VALUES ('$firstName','$email','$resortName','$costPerNight','$package','$costPerday','$costOfVehicle','$otherCost','$totalCost')";

  if($conn->query($sql)==TRUE){
    echo json_encode("OK");


  }else{
    echo json_encode("Failed");
  }
 

}



?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>TakeaTrip.com | Free Travel Website </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css"> 

  </head>

  <body>
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="home.php"><h2>Take A <em>Trip</em></h2></a>
          
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item active"><a class="nav-link" href="packages.php">Packages</a></li>

                <li class="nav-item"><a class="nav-link" href="login1.php">Login</a></li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.html">About Us</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>

                
                <li class="nav-item"><a class="nav-link" href="contact_index.php">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

     <div class="page-heading about-heading header-text" style="background-image: url(images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Save Your Money Up to 20%</h4>

              <h2>Choose the Best offers Suitable for you</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
           <div class="col-md-12">
            <div class="bot">
            <div class="wrapper">
    <div class="card">
      <img src="images/sajekresort1.jpg">
      <div class="info">
        <h1>Aksah Eco cotage</h1>
        <p>Total Cost Starting form 4000 to maximum 6000 taka (depending on time and resort choosed) </p>
        
      </div>
    </div>

    <div class="card">
      <img src="images/sajekresort2.jpg">
      <div class="info">
        <h1>Hill View Resort</h1>
        <p>Total cost will be around 10000 to 11500 taka (Its a friendly package). You can save upto 15%</p>
        
      </div>
    </div>

    <div class="card">
      <img src="images/sajekresort3.jpg">
      <div class="info">
        <h1>Runmoy Resort</h1>
        <p>It is a family package so total cost will be around 20000 taka only . You can save upto 20%</p>
        
      </div>
    </div>
  </div>
          </div>
        </div>
        </div>

        
    <div class="row">
          <div class="col-md-12">
        <div class="section-heading" style="border: 0; margin-top: 30px;">
          <h2>Availability &amp; Prices (Sajek Vally)</h2>
        </div>
      </div>
    </div>

    <div class="row">
          <div class="col-md-6">
        <div class="section-heading" style="border: 0">
          <h4>1 Person(All costs are in taka)</h4>
        </div>
      </div>
      <div class="col-md-6">
          <form method="post"><input type="submit" name="book" style="margin-top:20px; margin-left: 500px;" class="btn btn-success" value="Book Now!" /></form>
      </div>
    </div>
        <div class="table-responsive">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
              

               
             
              <thead>        
                    <tr>
                         <th>Package</th>
                         <th>Resort Name</th>
                         <th>Cost Per Night</th>
                         <th>Cost Per Day</th>
                         <th>Cost of Vehicle</th>
                         <th>Other Costs</th>
                         <th>Total Cost</th>
                    </tr>
               </thead>
               
               <tbody>

             <?php 
           $sql='SELECT * FROM sajek';

           $result=mysqli_query($conn,$sql);
    
          while($rows=mysqli_fetch_assoc($result))
        {
    ?>        
                    <tr>
                      <form method="post">
                        <td><?php echo $rows['package']; ?></td>
                         <td><?php echo $rows['resortName']; ?></td>
                         <td><?php echo $rows['costPerNight']; ?></td>
                         <td><?php echo $rows['costPerday']; ?></td>
                         <td><?php echo $rows['costOfVehicle']; ?></td>
                         <td><?php echo $rows['otherCost']; ?></td>
                         <td><?php echo $rows['totalCost']; ?></td>
                      </form>
                    </tr>


                    
    <?php     
        }
    ?>    
                    
               </tbody>
          </table>


        </div>

    <div class="row">
          <div class="col-md-12">
        <div class="section-heading" style="border: 0">
          <h4>2-3 Person(All costs are in taka)</h4>
        </div>
      </div>
    </div>
        <div class="table-responsive">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
               <thead>
                    <tr>
                         <th>Package</th>
                         <th>Resort Name</th>
                         <th>Cost Per Night</th>
                         <th>Cost Per Day</th>
                         <th>Cost of Vehicle</th>
                         <th>Other Costs</th>
                         <th>Total Cost</th>
                    </tr>
               </thead>
               
               <tbody>
                    <tr>
                         <td>104</td>
                         <td>Aksah Eco cotage</td>
                         <td>1700-2100</td>
                         <td>1500-1900</td>
                         <td>3000-4000</td>
                         <td>1400-2000</td>
                         <td>7600-10000</td>
                    </tr>

                    <tr>
                         <td>105</td>
                         <td>Hill View Resort</td>
                         <td>2800-3000</td>
                         <td>2500-2800</td>
                         <td>3000-3500</td>
                         <td>1400-2000</td>
                         <td>9700-11300</td>
                    </tr>

                    <tr>
                         <td>106</td>
                         <td>Runmoy Resort</td>
                         <td>3000-3200</td>
                         <td>2800-3000</td>
                         <td>3000-3300</td>
                         <td>1400-2000</td>
                         <td>10200-11500</td>
                    </tr>
               </tbody>
          </table>


        </div>

   
    <div class="row">
          <div class="col-md-12">
        <div class="section-heading" style="border: 0">
          <h4>5 Person(All costs are in taka)</h4>
        </div>
      </div>
    </div>
        <div class="table-responsive">
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table">
               <thead>
                    <tr>
                         <th>Package</th>
                         <th>Resort Name</th>
                         <th>Cost Per Night</th>
                         <th>Cost Per Day</th>
                         <th>Cost of Vehicle</th>
                         <th>Other Costs</th>
                         <th>Total Cost</th>
                    </tr>
               </thead>
               
               <tbody>
                    <tr>
                         <td>107</td>
                         <td>Aksah Eco cotage</td>
                         <td>3500</td>
                         <td>3000</td>
                         <td>7000</td>
                         <td>3500</td>
                         <td>17000</td>
                    </tr>

                    <tr>
                         <td>108</td>
                         <td>Hill View Resort</td>
                         <td>4500</td>
                         <td>3500</td>
                         <td>7000</td>
                         <td>3000</td>
                         <td>18000</td>
                    </tr>

                    <tr>
                         <td>109</td>
                         <td>Runmoy Resort</td>
                         <td>5000</td>
                         <td>4000</td>
                         <td>7000</td>
                         <td>3000</td>
                         <td>19000</td>
                    </tr>
               </tbody>
          </table>
        </div>
      </div>
    </div>



   


     <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2021 Company Name  <a href="home.php">TakeATrip.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="js/custom.js"></script>
    <script src="js/owl.js"></script>
  </body>
</html>


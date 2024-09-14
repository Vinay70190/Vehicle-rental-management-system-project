<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | New Two Wheeler Booking</title>
    
   
    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Nav Css -->
    <link rel="stylesheet" href="css/style4.css">
    <!--// Nav Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
   <?php include_once('includes/sidebar.php');?>

        <!-- Page Content Holder -->
        <div id="content">
            <!-- top-bar -->
       <?php include_once('includes/header.php');?>

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center">New Two Wheeler Booking</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
   

                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">New Two Wheeler Booking</h4>
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">S.NO</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Booking ID</th>
                                        <th scope="col">Vehicle Name</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php
$ret=mysqli_query($con,"select tblbookingtwowheeler.ID as bid,tblbookingtwowheeler.FullName,tblbookingtwowheeler.BookingNumber,tblbookingtwowheeler.BookingDate,tblvehicle.VehicleName,tblbookingtwowheeler.CreationDate from  tblbookingtwowheeler join  tblvehicle on tblvehicle.ID=tblbookingtwowheeler.VehicleID where (tblbookingtwowheeler.Status='' || tblbookingtwowheeler.Status is null)");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
                                <tbody>
                                    <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['BookingNumber'];?></td>
                  <td><?php  echo $row['VehicleName'];?></td>
                  <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="view-twowheeler-booking.php?viewid=<?php echo $row['bid'];?>" class="btn btn-primary btn-sm" target="blank">View</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}} else {?> 
<tr>
    <td colspan="5" style="color:red; font-size:16px; font-weight:bold;">No Record Found
        
    </td>

</tr>
<?php } ?>                          
                                    
                                   
                                   
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
                <!--// table6 -->

        

            </section>

            <!--// Tables content -->

           <?php include_once('includes/footer.php');?>
        </div>
    </div>


    <!-- Required common Js -->
    <script src='js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>
<?php }  ?>
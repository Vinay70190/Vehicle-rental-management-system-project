<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{

    if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $status=$_POST['status'];
   $remark=$_POST['remark'];
    $tcost=$_POST['cost'];
 
      $query.=mysqli_query($con, "update   tblbookingtwowheeler set TotalCost='$tcost', Status='$status' ,Remark='$remark' where ID='$vid'");
    if ($query) {
    echo '<script>alert("Vehicle Booking has been updated.")</script>';
    echo "<script>window.location.href ='all-twowheeler-booking.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | View Four Wheeler Booking</title>
    
   
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
            <h2 class="main-title-w3layouts mb-2 text-center">View Two Wheeler Booking</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
   

                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">View Two Wheeler Booking</h4>
                    <div class="container-fluid">
                        <div class="row">
                            
                                <?php
                               $vid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblbookingtwowheeler.ID as bid,DATEDIFF(tblbookingtwowheeler.ReturnDate,tblbookingtwowheeler.BookingDate) as ddf,tblbookingtwowheeler.FullName,tblbookingtwowheeler.Email,tblbookingtwowheeler.MobileNumber,tblbookingtwowheeler.Location,tblbookingtwowheeler.BookingNumber,tblbookingtwowheeler.BookingDate,tblbookingtwowheeler.ReturnDate,tblbookingtwowheeler.Status,tblvehicle.BrandName,tblvehicle.VehicleName,tblvehicle.RegistrationNumber,tblvehicle.RentalPrice,tblvehicle.VehicleModel,tblvehicle.VehicleDescription,tblbookingtwowheeler.CreationDate from  tblbookingtwowheeler join  tblvehicle on tblvehicle.ID=tblbookingtwowheeler.VehicleID where tblbookingtwowheeler.ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <table border="1" class="table table-bordered">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 User Details</td></tr>

    <tr>
    <th scope>Full Name</th>
    <td><?php  echo $row['FullName'];?></td>
    <th scope>Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>
  <tr>
    <th scope>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    <th>Location</th>
    <td><?php  echo $row['Location'];?></td>
  </tr>
  <tr>
    <th>Booking Date</th>
    <td colspan="2"><?php  echo $row['CreationDate'];?></td>
  </tr>

  <tr>
    <th>From Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
    <th>To Date</th>
    <td><?php  echo $row['ReturnDate'];?></td>
  </tr>
   <tr>
    <th>Total Days of Rent</th>
    <td><?php  echo $ddf=$row['ddf'];?></td>
    <th>Rental Price</th>
    <td><?php  echo $rp=$row['RentalPrice'];?></td>
  </tr>
    <th>Total Cost</th>
    <td><?php  echo $tc=$ddf*$rp;?></td>
    <th>Booking Number</th>
    <td><?php  echo $row['BookingNumber'];?></td>
  </tr>
  <tr>
    <th>Brand Name</th>
    <td><?php  echo $row['BrandName'];?></td>

    <th>Vehicle Name</th>
    <td><?php  echo $row['VehicleName'];?></td>
  </tr>
  <tr>
    <th>Registration Number</th>
    <td><?php  echo $row['RegistrationNumber'];?></td>
    <th>Vehicle Model</th>
    <td><?php  echo $row['VehicleModel'];?></td>
  </tr>
  <tr>
    <th>Vehicle Description</th>
    <td colspan="3"><?php  echo $row['VehicleDescription'];?></td>
  </tr>
  <tr>
    <th>Order Final Status</th>
    <td colspan="4"> <?php  $status=$row['Status'];
    
if($row['Status']=="Approved")
{
  echo "Your Booking has been approved";
}

if($row['Status']=="Unapproved")
{
 echo "Your Booking has been cancelled";
}


if($row['Status']=="")
{
  echo "Not Response Yet";
}


     ;?></td>
  </tr>
<?php }?>
</table>
<?php  if($status!=''){
$ret=mysqli_query($con,"select * from tblbookingtwowheeler  where tblbookingtwowheeler.ID='$vid'");
$cnt=1;


 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="5" >Response History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>TotalCost</th>
<th>Remark</th>
<th>Status</th>
<th>Response Time</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['TotalCost'];?></td> 
  <td><?php  echo $row['Remark'];?></td>
  <td><?php  echo $status=$row['Status'];?></td> 
   <td><?php  echo $row['RemarkDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php } 

if ($status==""){
?> 
<p align="center">                            
 <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Take Action</button></p>  

<?php } ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <div class="modal-content">
      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <table class="table table-bordered table-hover data-tables">

                                 <form method="post" name="submit">

                                
                               
     <tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
  <tr>
    <th>Total Cost :</th>
    <td>
    <input name="cost" value="<?php echo $tc?>" class="form-control wd-450" required="true" readonly></td>
  </tr>                         

  <tr>
    <th>Status :</th>
    <td>

   <select name="status" class="form-control wd-450" required="true" >
     <option value="Approved" selected="true">Approved</option>
     <option value="Unapproved">Unapproved</option>
   </select></td>
  </tr>
</table>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" name="submit" class="btn btn-primary">Update</button>
  
  </form>

</div>

                      
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
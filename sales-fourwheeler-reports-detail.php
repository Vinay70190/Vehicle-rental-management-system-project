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
    <title>Vehicle Rental Management Sysytem | Four Wheeler Sales Report</title>
    
   
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
            <h2 class="main-title-w3layouts mb-2 text-center">Sales Report</h2>
            <!--// main-heading -->

            <!-- Tables content -->
            <section class="tables-section">
   

                <!-- table6 -->
                <div class="outer-w3-agile mt-3">
                   

                  <?php

$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
$rtype=$_POST['requesttype'];
?>
<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>

<h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
<hr />
                    <div class="container-fluid">
                        <div class="row">
                            <table class="table table-bordered">
                 <thead>
<tr>
<th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
</tr>
</thead>
                    
                    <?php
$ret=mysqli_query($con,"select month(CreationDate) as lmonth,year(CreationDate) as lyear,sum(TotalCost) as totalprice from  tblbookingcar where (date(CreationDate) between '$fdate' and '$tdate') and (Status='Approved') group by lmonth,lyear");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                    <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td><?php  echo $total=$row['totalprice'];?></td>
             
                    </tr>
                <?php
$ftotal+=$total;
$cnt++;
}?>
<tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>
                </tr>

<?php } else {?>
<tr>
<td colspan="3" style="font-size:16px; font-weight:bold; color:red;">No Sales Yet</td>  
</tr>  
<?php } ?>

                  </table>
                         <?php } else {
                            $year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
 ?>
 <h4 class="header-title m-t-0 m-b-30" style="text-align: center;">Sales Report Year Wise</h4>
    <h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
    <hr />
                  <table class="table table-bordered">
                    <thead>
<tr>
<th>S.NO</th>
<th> Year </th>
<th>Sales</th>
</tr>
</thead>
                    
                    <?php
$ret=mysqli_query($con,"select year(CreationDate) as lyear,sum(TotalCost) as totalprice from  tblbookingcar where (date(CreationDate) between '$fdate' and '$tdate' and (Status='Approved')) group by lyear");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                    <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['lyear'];?></td>
              <td><?php  echo $total=$row['totalprice'];?></td>
             
                    </tr>
                 </tr>
                <?php
$ftotal+=$total;
$cnt++;
}?>
   
   <tr>
                  <td colspan="2" align="center">Total </td>
              <td><?php  echo $ftotal;?></td>  
                </tr>  
                <?php } else {?>
<tr>
<td colspan="3" style="font-size:16px; font-weight:bold; color:red;">No Sales Yet</td>  
</tr>  
<?php } ?>
                  </table>
                
            <?php } ?>
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
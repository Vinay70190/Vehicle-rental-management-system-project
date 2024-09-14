<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vrmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$cmsaid=$_SESSION['vrmsaid'];
$catname=$_POST['catname'];
$brand=$_POST['brand'];
$vehname=$_POST['vehname'];
$regnum=$_POST['regnum'];
$renprice=$_POST['renprice'];
$modyrs=$_POST['modyrs'];
$vehdesc=$_POST['vehdesc'];
$seatingcap=$_POST['seatingcap'];
$class=$_POST['class'];
$fuel=$_POST['fuel'];
$doors=$_POST['doors'];
$gearbox=$_POST['gearbox'];
$carac=$_POST['carac'];
$abs=$_POST['abs'];
$airbags=$_POST['airbags'];
$bluetooth=$_POST['bluetooth'];
$carkit=$_POST['carkit'];
$gps=$_POST['gps'];
$music=$_POST['music'];
$carlock=$_POST['carlock'];
$vid=$_GET['editid'];

 $query=mysqli_query($con,"update tblvehiclecar set CategoryName='$catname',BrandName='$brand',VehicleName='$vehname',RegistrationNumber='$regnum',RentalPrice='$renprice',VehicleModel='$modyrs',VehicleDescription='$vehdesc',SeatingCapacity='$seatingcap',Class='$class',Fuel='$fuel',Doors='$doors',GearBox='$gearbox' where ID='$vid'");

    if ($query) {
    $msg="Vehicle details has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vehicle Rental Management Sysytem | Update Vehicle Details</title>
   

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
            <!--// top-bar -->

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center"> Update Vehicle Details</h2>
            <!--// main-heading -->

            <!-- Forms content -->
               <section class="forms-section">

               
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Update Vehicle Details</h4>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
 $vid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblvehiclecar where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Vehicle Category</label>
                                <select class="form-control"  name="catname" id="catname" required="true">
                                        <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
                                <?php $query1=mysqli_query($con,"select * from  tblcategory");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['CategoryName'];?>"><?php echo $row1['CategoryName'];?></option>
                  <?php } ?>
                                    </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Vehicle Brand</label>
                               <select class="form-control" id="brand" name="brand" required="true">
                                        <option value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName'];?></option>
                                <?php $query2=mysqli_query($con,"select * from  tblbrand");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['BrandName'];?>"><?php echo $row2['BrandName'];?></option>
                  <?php } ?>
                                    </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Vehicle Name</label>
                                <input type="text" class="form-control" id="vehname" name="vehname" required="true" value="<?php echo $row['VehicleName'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Vehicle Registration Number</label>
                               <input type="text" class="form-control" id="regnum" name="regnum" required="true" value="<?php echo $row['RegistrationNumber'];?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Rental Price/Day</label>
                            <input type="text" class="form-control" id="renprice" name="renprice" required="true" value="<?php echo $row['RentalPrice'];?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Vehicle Model Year</label>
                               <input type="text" class="form-control" id="modyrs" name="modyrs" required="true" value="<?php echo $row['VehicleModel'];?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Vehicle Description</label>
                                    <textarea class="form-control" id="vehdesc" name="vehdesc" rows="3" required="true">"<?php echo $row['VehicleDescription'];?>"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Seating Capacity</label>
                                    <input class="form-control" id="seatingcap" name="seatingcap" rows="3" required="true"value="<?php echo $row['SeatingCapacity'];?>">
                                </div>
                                <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="inputCity">Class</label>
                                <input type="text" class="form-control" id="class" name="class" required="true" value="<?php echo $row['Class'];?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputState">Fuel</label>
                                <input type="text" class="form-control" id="fuel" name="fuel" required="true" value="<?php echo $row['Fuel'];?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Doors</label>
                                <input type="text" class="form-control" id="doors" name="doors" required="true" value="<?php echo $row['Doors'];?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Gear Box</label>
                                <input type="text" class="form-control" id="gearbox" name="gearbox" required="true" value="<?php echo $row['GearBox'];?>">
                            </div>
                        </div>
                        <h4 class="mb-3">Air Condition</h4>
                         <?php  if($row['AirCondition']=="Yes"){ ?>
                        <div class="d-block my-3">
                           
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="Yes" required="true" checked="true"/>
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="No" required="true"/ >
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                  

                                </div>
<?php } else { ?>
    <div class="d-block my-3">
                           
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="Yes" required="true" >
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carac" type="radio" name="carac" value="No" required="true" checked="true" / >
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                  

                                </div>
                                <?php } ?>

                                <h4 class="mb-3">ABS</h4>
                                 <?php  if($row['ABS']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="abs" type="radio" name="abs" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="abs" type="radio" name="abs" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div><?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="abs" type="radio" name="abs" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="abs" type="radio" name="abs" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Air Bags</h4>
                                <?php  if($row['AirBags']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="airbags" type="radio" name="airbags" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Bluetooth</h4>
                                <?php  if($row['Bluetooth']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="bluetooth" type="radio" name="bluetooth" value="Yes" required="true"checked="true"/>
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="bluetooth" type="radio" name="bluetooth" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="bluetooth" type="radio" name="bluetooth" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="bluetooth" type="radio" name="bluetooth" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Car Kit</h4>
                                <?php  if($row['Bluetooth']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                 <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="Yes" required="true"/ >
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carkit" type="radio" name="carkit" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">GPS</h4>
                                <?php  if($row['GPS']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="gps" type="radio" name="gps" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Music</h4>
                                <?php  if($row['Music']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="music" type="radio" name="music" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="music" type="radio" name="music" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
                                    <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="music" type="radio" name="music" value="Yes" required="true"/>
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="music" type="radio" name="music" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                                <h4 class="mb-3">Center Locking</h4>
                                <?php  if($row['CenterLocking']=="Yes"){ ?>
                        <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carlock" type="radio" name="carlock" value="Yes" required="true"/ checked="true">
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="carlock" type="radio" name="carlock" value="No" required="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } else { ?>
<div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input  id="carlock" type="radio" name="carlock" value="Yes" required="true"/ >
                                        <label class="custom-control-label" for="credit">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input  id="carlock" type="radio" name="carlock" value="No" required="true" checked="true"/>
                                        <label class="custom-control-label" for="debit">No</label>
                                    </div>
                                    
                                </div>
                                <?php } ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image</label>
                                <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimagefw.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image1</label>
                                <img src="images/<?php echo $row['Image1'];?>" width="200" height="150" value="<?php  echo $row['Image1'];?>"><a href="changeimagefw1.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image2</label>
                                <img src="images/<?php echo $row['Image2'];?>" width="200" height="150" value="<?php  echo $row['Image2'];?>"><a href="changeimagefw2.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">Image3</label>
                                <img src="images/<?php echo $row['Image3'];?>" width="200" height="150" value="<?php  echo $row['Image3'];?>"><a href="changeimagefw3.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">Image4</label>
                                <img src="images/<?php echo $row['Image4'];?>" width="200" height="150" value="<?php  echo $row['Image4'];?>"><a href="changeimagefw4.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Image5</label>
                                <img src="images/<?php echo $row['Image5'];?>" width="200" height="150" value="<?php  echo $row['Image5'];?>"><a href="changeimagefw5.php?editid=<?php echo $row['ID'];?>"> &nbsp; Edit</a>
                            </div>
                        </div>
                        <?php } ?>
                       <p style="text-align: center;"><button type="submit" class="btn btn-primary" name="submit">Update</button></p>
                    </form>
                </div>
                <!--// Forms-3 -->
                <!-- Forms-4 -->
               
            </section>

            <!--// Forms content -->

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

    <!-- Validation Script -->
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict';

            window.addEventListener('load', function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
    <!--// Validation Script -->

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
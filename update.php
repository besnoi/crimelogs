<?php
// Start the session
session_start();
if(!$_SESSION['loggedIn']){
  header('Location: /crimelogs/login.php');
}
?>
<!--TODO criminal doesn't exist Error!-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Update Details</title>
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
    $( function() {
      $("#datepicker_year").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        autoclose:true
      });  
      $("#datepicker").datepicker({
        autoclose:true
      }); 
      $('.togglepanel').click(function(){
         $('.sidepanel').show();
      });
        $('.closepanel').click(function(){
          $('.sidepanel').hide();
        });
    } );
    </script>
  </head>
  <body>
  <div class="sidepanel">
      <img src="mahapol.png" />
      <ul>
        <li><a href="/crimelogs"><i class="fa fa-address-book"></i> Add Entry</a></li>
        <li><a href="/crimelogs/search.php?term=1"><i class="fa fa-search"></i> Search Entry</a></li>
        <li><a href="/crimelogs/logout.php"><i class="fa fa-times-circle"></i> Log Out</a></li>
        <li><a href="#" class="closepanel">Close &times;</a></li>
      </ul>
    </div>
  <div class="container-fluid padding-left211">
  <div class="pageheading"><button class="togglepanel">☰</button>Update Details</div>

    <?php
include('conn.php');


if (!isset($_GET['id']))
    exit;

$record_id = $_GET['id'];

if(isset($_POST['deletecriminal'])){
    $sql_delete = "DELETE FROM `criminal` WHERE criminalid = $record_id";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Record Deleted Successfully</div>';
      } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error."</div>";
      }
}

if(isset($_POST['criminalform'])){


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $bankno = $_POST['bankno'];
    $bankmob = $_POST['bankmob'];
    $mobno = $_POST['mobno'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $panno = $_POST['panno'];
    $aadhar = $_POST['aadhar'];
    $crime_number = $_POST['crime_number'];
    $crime_year = $_POST['crime_year'];
    $registration_date = $_POST['registration_date'];
  
    $sql = "UPDATE `criminal` SET `name`='$firstname',`surname`='$lastname',`bankacc`='$bankno',`mobbank`='$bankmob',`mobno`='$mobno',`email`='$email',`address`='$address',`panno`='$panno',`adhaar`='$aadhar',`crime_number`='$crime_number',`crime_year`='$crime_year',`registration_date`='$registration_date' WHERE `criminalid`=$record_id";
    
    if ($conn->query($sql) === TRUE) {
      echo '<div class="alert alert-success" role="alert">Record Updated Successfully</div>';
    } else {
      echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error."</div>";
    }
  
  
  }

if(!isset($_POST['deletecriminal'])){
  $criminaldata_query = "SELECT * FROM `criminal` WHERE `criminalid` = " . $record_id;
  $criminaldata = $conn->query($criminaldata_query);
  $row = $criminaldata->fetch_assoc();
}
  

?>

    <?php if(!isset($_POST['deletecriminal'])): ?>
    <form style="  padding: 20px 15px 20px 15px;" action="update.php<?php 
if (isset($_GET['id'])) echo '?id='.$_GET['id']?>" method="POST" >
      <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Name</label> 
        <div class="col-8">
          <input id="text1" name="firstname" type="text" class="form-control" value="<?php echo $row['name']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Surname</label> 
        <div class="col-8">
          <input id="text" name="lastname" type="text" class="form-control" value="<?php echo $row['surname']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text2" class="col-4 col-form-label">Bank Account Number</label> 
        <div class="col-8">
          <input id="text2" name="bankno" type="text" class="form-control" value="<?php echo $row['bankacc']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text4" class="col-4 col-form-label">Registered mobile no. to Bank account</label> 
        <div class="col-8">
          <input id="text4" name="bankmob" type="text" class="form-control" value="<?php echo $row['mobbank']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Mobile Number used for Calling</label> 
        <div class="col-8">
          <input id="text3" name="mobno" type="text" class="form-control" value="<?php echo $row['mobno']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text5" class="col-4 col-form-label">Registered Email Id</label> 
        <div class="col-8">
          <input id="text5" name="email" type="text" class="form-control" value="<?php echo $row['email']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text6" class="col-4 col-form-label">Address</label> 
        <div class="col-8">
          <input id="text6" name="address" type="text" class="form-control" value="<?php echo $row['address']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text7" class="col-4 col-form-label">PAN Card No</label> 
        <div class="col-8">
          <input id="text7" name="panno" type="text" class="form-control" value="<?php echo $row['panno']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="text8" class="col-4 col-form-label">Aadhar Number</label> 
        <div class="col-8">
          <input id="text8" name="aadhar" type="text" class="form-control" value="<?php echo $row['criminalid']?>">
        </div>
      </div> 
      <div class="form-group row">
        <label for="text8" class="col-4 col-form-label">Crime Number</label> 
        <div class="col-8">
          <input id="text8" name="crime_number" type="text" class="form-control" value="<?php echo $row['crime_number']?>">
        </div>
      </div> 
      <div class="form-group row">
        <label for="text8" class="col-4 col-form-label">Crime Year</label> 
        <div class="col-8">
          <div class="input-group">
            <input id="datepicker_year" name="crime_year" type="text" class="form-control"  value="<?php echo $row['crime_year']?>" autocomplete="off">
            <div class="input-group-append"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div>
          </div>
        </div>
      </div> 
      <div class="form-group row">
        <label for="text8" class="col-4 col-form-label">Registration Date</label> 
        <div class="col-8">
          <div class="input-group">
            <input id="datepicker" name="registration_date" type="text" class="form-control"  value="<?php echo $row['registration_date']?>" autocomplete="off">
            <div class="input-group-append"><div class="input-group-text"><i class="fa fa-calendar"></i></div></div>
        </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-4 col-8">
          <input name="criminalform" type="submit" class="btn btn-primary" value="Update">
          <input name="deletecriminal" type="submit" class="btn btn-danger" value="Delete" onclick="return confirm('Are you sure?');">
        </div>
      </div>
    </crimelogs>
    <?php endif; ?>
    </div>
    </body>
</html>

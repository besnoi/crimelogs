<?php
// Start the session
session_start();
if(!$_SESSION['loggedIn']){
  header('Location: /form/login.php');
}
include('conn.php');

if (isset($_GET['entry'])) 
    $pageno = (int)($_GET['entry']);
 else 
$pageno = 1;


 $RECORDS_PER_PAGE = 10;
 

 if  (isset($_GET["term"])&&isset($_GET["query"])){
  $term = $_GET["term"];$query = $_GET["query"];
  $totalrecordsSQL = "SELECT * FROM user WHERE $term LIKE '%$query%'";
  $start_from=($pageno-1)*$RECORDS_PER_PAGE ;
  $userdata_query="SELECT * FROM user WHERE $term LIKE '%$query%' LIMIT $start_from, $RECORDS_PER_PAGE";
  $prevURL = '?entry='.($pageno-1)."&term=$term&query=$query";
  $nextURL = '?entry='.($pageno+1)."&term=$term&query=$query";
 }
 else{ 
  $totalrecordsSQL = "SELECT * FROM user";
  $start_from=($pageno-1)*$RECORDS_PER_PAGE ;
  $userdata_query="SELECT * FROM user LIMIT $start_from, $RECORDS_PER_PAGE";
  $a=$pageno-1;$b=$pageno+1;
  $prevURL = "?entry=$a";
  $nextURL = "?entry=$b";
}

$userdata=$conn->query($userdata_query);
$totalrecords=$conn->query($totalrecordsSQL);
$totalpage = ceil($totalrecords->num_rows/$RECORDS_PER_PAGE);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Search</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link href="style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>
      $(document).ready(function(){
        $('.btn-search').click(function(){
          var term = $('#inputGroupSelect04').val();
          var query = $('#searchinput').val();
          var searchURL = "?entry=1&term="+term+"&query="+query;
          window.location = searchURL;
        });
        <?php if  (isset($_GET["term"])&&isset($_GET["query"])): ?>
        $('#inputGroupSelect04').val('<?php echo $_GET["term"]; ?>');
        $('#searchinput').val('<?php echo $_GET["query"]; ?>');
        <?php endif; ?>
        $('#dtBasicExample tbody tr').click( function() {
          var userid = $(this).attr('data-userid');
          window.location = "update.php?id="+userid;
        })
        $('.togglepanel').click(function(){
         $('.sidepanel').show();
      });
        $('.closepanel').click(function(){
          $('.sidepanel').hide();
        });
      });
      </script>
 </head>
  <body>
  <div class="sidepanel">
      <img src="https://i.pinimg.com/originals/51/ea/39/51ea39531ba05d624b256c80099a4b95.png" />
      <ul>
        <li><a href="/form">Add Entry</a></li>
        <li><a href="/form/search.php?term=1">Search Entry</a></li>
        <li><a href="/form/logout.php">Log Out</a></li>
        <li><a href="#" class="closepanel">Close &times;</a></li>
      </ul>
    </div>
  <div class="container-fluid padding-left211">
  <div class="pageheading"><button class="togglepanel">☰</button>Search Entry</div>
  <form method="GET">
  <div class="input-group-prepend">
  <select class="custom-select" id="inputGroupSelect04" name="term">
    
    <option value="name" selected>Name</option>
    <option value="surname">Surname</option>
    <option value="bankacc">Bank Account Number</option>
    <option value="mobbank">Registered mobile no. to Bank account</option>
    <option value="mobno">Mobile Number used for Calling</option>
    <option value="email">Registered Email Id</option>
    <option value="address">Address</option>
    <option value="panno">PAN No.</option>
    <option value="adhaar">Aadhar Number</option>
    <option value="crime_number">Crime Number</option>
    <option value="crime_year">Crime Year</option>
    <option value="registration_date">Registration Date</option>
  </select>
  <div class="input-group">
  <input type="text" class="form-control" placeholder="Enter search term" id="searchinput" name="query" style="margin-left: 10px;">
  </div>
  <div class="input-group-append" id="btn-search">
    <button class="btn btn-search" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
  </div>
</div>
</form>

  <table id="dtBasicExample" class="table table-striped table-bordered table-sm table-responsive" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">ID

    </th>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Surname

      </th>
      <th class="th-sm">Bank Account Number

      </th>
      <th class="th-sm">Registered mobile no. to Bank account

      </th>
      <th class="th-sm">Mobile Number used for Calling

      </th>
      <th class="th-sm">Registered Email Id

      </th>
      <th class="th-sm">Address

      </th>
      <th class="th-sm">PAN No.

      </th>
      <th class="th-sm">Aadhar Number

      </th>
      <th class="th-sm">Crime Number

      </th>
      <th class="th-sm">Crime Year

      </th>
      <th class="th-sm">Registration Date

      </th>
    </tr>
  </thead>
  <tbody>
  <?php 

    if ($userdata->num_rows > 0) {
    $i = 0;
    while($row = $userdata->fetch_assoc()) {
        echo '<tr data-userid="'.$row['userid'].'" title="Edit Entry">';
        echo '<td>'.(++$i+($RECORDS_PER_PAGE*($pageno-1))).'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['surname'].'</td>';
        echo '<td>'.$row['bankacc'].'</td>';
        echo '<td>'.$row['mobbank'].'</td>';
        echo '<td>'.$row['mobno'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['address'].'</td>';
        echo '<td>'.$row['panno'].'</td>';
        echo '<td>'.$row['adhaar'].'</td>';
        echo '<td>'.$row['crime_number'].'</td>';
        echo '<td>'.$row['crime_year'].'</td>';
        echo '<td>'.$row['registration_date'].'</td>';
        echo '</tr>';
    }
    }
 ?>
  </tbody>

</table>
<nav aria-label="Page navigation example">
  <ul class="pagination" style="justify-content: center;">
    <?php if ($pageno>1):?>
    <li class="page-item">
      <a class="page-link" href="<?php echo  $prevURL; ?>" aria-label="Previous" disabled>
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
      <li class="page-item"><a class="page-link" href=<?php echo  $prevURL; ?>><?php echo  $pageno-1; ?></a></li>
    <?php endif; ?>
    <li class="page-item active"><a class="page-link" href="#"><?php echo  $pageno; ?></a></li>
    <?php if ($pageno<$totalpage):?>
    <li class="page-item"><a class="page-link" href="<?php echo  $nextURL; ?>"><?php echo  $pageno+1; ?></a></li>
    <li class="page-item">
      <a class="page-link" href="<?php echo  $nextURL; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
    <?php endif; ?>
  </ul>
</nav>
    </div>
  </body>
</html>

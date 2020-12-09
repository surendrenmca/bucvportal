<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['loggedin'])) {
header('Location: index.php');
exit;
}
?>
<?php include('header.php');?>

    
  <!-- Content section -->
<section class="py-5">
<div class="container">


<h2 class="page-title" style="font-family: 'Oswald'; font-size:25px; letter-spacing: 0.2px; color:#00356b;"> Bharathiar University, Coimbatore </h2>
<h5> Portal for Certificate &amp; Eligibility Verification </h5> <br>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Dashboard of <?php $aid=$_SESSION['id'];


    if($aid==1)
    {
    $ret="select * from admin where admin_id=?";  
    //  $ret="select a.*, c.* from admin a, colleges c where a.admin_id=c.user_id and a.admin_id=?";
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('i',$aid);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
    echo "<h5>". $row->admin_firstname. "</h5>";
    }
    }
    else
    {

    //$ret="select * from admin where admin_id=?";  
    $ret="select a.*, c.* from admin a, colleges c where a.admin_id=c.user_id and a.admin_id=?";
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('i',$aid);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
    echo "<h5>". $row->admin_firstname. "</h5>";


    ?>
      
      </div>
<div class="panel-body">



<table class="table table-responsive table-bordered table-striped">

<tr>
<th>User</th>
<th>College ID No.</th>
<th>College Name</th>
<th>College Address</th>
<th>CDATE</th>
</tr>

<tr>
<td> <?php echo $row->admin_firstname; ?> </td>
<td> <?php echo $row->admin_id; ?> </td>
<td> <?php echo $row->college_name; ?> </td>
<td> <?php echo $row->college_address; ?> </td>
<td> <?php echo $row->cdate; ?> </td>
</tr>
</table>


</div>
</div>
</div>
</div>
</div>


<?php
}
}
?>







      
    </div>
  </section>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
  <script>
  $( function() {
    $( "#datepicker" ).datepicker(  {
    changeMonth: true,
      buttonImage: "img/b_calendar.png",
        changeYear: true,
        dateFormat: 'dd/mm/yy',
     yearRange: "-50:-17", // this is the option you're looking for
    showOn: "both" 

       });
  } );
</script>



  
  <?php include('footer.php');?>
  
  
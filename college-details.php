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



<h5> Portal for Certificate &amp; Eligibility Verification </h5> <br>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">
<?php $aid=$_SESSION['id'];
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
    echo "<h4>College Details</h4>";
    }
    else
    {

    echo "-";
  }

?>




<?php
if($aid==1)
{  
//$ret="select c.*,p.* from colleges c, programme_details p where c.user_id=p.college_id order by p.college_id";
  $ret="select * from colleges c";
}
else
{
  echo "-";
}

   $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$aid);
   $stmt->execute() ;//ok
   $res=$stmt->get_result();
   $cnt=0;
?>
      
      </div>
<div class="panel-body">



<table class="table table-responsive table-bordered table-striped">



<tr>
<th>#</th>
<th>College ID</th>
<th>College Name</th>
<th>College Address</th>
<th>Course Details</th>
</tr>
<?php
while($row=$res->fetch_object())
{
  $cnt=$cnt+1; 
?>
<tr>

<td><?php  echo $cnt; ?></td>
<td><?php  echo $row->user_id; ?> </td>
<td><?php  echo $row->college_name; ?></td>
<td><?php  echo $row->college_address; ?></td>
<td><a class='btn btn-info btn-lg'  href='college-wise-course-details.php?college_id=<?php echo $row->user_id;?>'> 
  <i class='fa fa-eye' aria-hidden='true'></i> View Details</a></td>

</tr>
<?php
}
?>

</table>


</div>
</div>
</div>
</div>
</div>









      
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
  
  
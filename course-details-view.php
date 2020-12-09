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
  
    //echo "<h5>". $row->admin_firstname. "</h5>";
    echo "<h5>". $row->college_name. ",".$row->college_address. "</h5>";
    }
  }

?>




<?php
if($aid==1)
{  
$ret="select c.*,p.* from colleges c, programme_details p where c.user_id=p.college_id order by p.college_id";
}
else
{
  $ret="select c.*, p.* from  colleges c, programme_details p where c.user_id=p.college_id and p.college_id=? order by p.id";
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
<th>Course ID</th>
<th>College ID</th>
<th>Course Code and Name</th>
<th>Sanctioned Strength</th>
<th>Total Candidates</th>
<th>Foreign Candidates</th>
<th>Other Board</th>
<th>OB UG</th>
<th>OB PUG</th>
<th> Upload </th>
</tr>
<?php
while($row=$res->fetch_object())
{
  $cnt=$cnt+1; 
?>
<tr>

<td><?php  echo $cnt; ?></td>



<td><strong><?php  echo $row->id; ?></strong></td>
<td><?php  echo $row->college_id; ?> </td>
<td><?php  echo $row->course_code; ?>&nbsp;&nbsp;&nbsp;<?php  echo $row->course_name; ?></td>
<td><?php  echo $row->sanctioned_strength; ?></td>
<td><?php  echo $row->total_candidates; ?></td>
<td><?php  echo $row->foreign_candidates; ?></td>
<td><?php  echo $row->other_board; ?></td>
<td><?php  echo $row->ob_ug; ?></td>
<td><?php  echo $row->ob_pg; ?></td>
<td><a class='btn btn-success btn-lg'  href='upload-student-details.php?course_id=<?php echo $row->id;?>'> 
   Upload Student Info.</a></td>

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
  
  
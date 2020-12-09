<?php
session_start();
include('includes/config.php');
include('includes/DataSource.php');
if (!isset($_SESSION['loggedin'])) {
header('Location: index.php');
exit;
}
?>
<?php include('header.php');?>



<?php 
$aid=$_SESSION['id'];

  $ret="select * from admin where admin_id=?";
  $stmt= $mysqli->prepare($ret) ;
   $stmt->bind_param('i',$aid);
   $stmt->execute() ;//ok
   $res=$stmt->get_result();
   //$cnt=1;
     while($row=$res->fetch_object())
    {
      // echo "<h5>". $row->admin_firstname. "</h5>";

      $status=$row->admin_status;

     }
       ?>

<?php
use Phppot\DataSource;

//require_once 'DataSource.php';

$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $college_id = "";
            if (isset($column[0])) {
                $college_id = mysqli_real_escape_string($conn, $column[0]);
            }
            $course_code = "";
            if (isset($column[1])) {
                $course_code = mysqli_real_escape_string($conn, $column[1]);
            }
            $course_name = "";
            if (isset($column[2])) {
                $course_name = mysqli_real_escape_string($conn, $column[2]);
            }
            $sanctioned_strength = "";
            if (isset($column[3])) {
                $sanctioned_strength = mysqli_real_escape_string($conn, $column[3]);
            }
            $total_candidates = "";
            if (isset($column[4])) {
                $total_candidates = mysqli_real_escape_string($conn, $column[4]);
            }
            $foreign_candidates = "";
            if (isset($column[4])) {
                $foreign_candidates = mysqli_real_escape_string($conn, $column[5]);
            }
            $other_board = "";
            if (isset($column[4])) {
                $other_board = mysqli_real_escape_string($conn, $column[6]);
            }


          $ob_ug = "";
            if (isset($column[4])) {
                $ob_ug = mysqli_real_escape_string($conn, $column[7]);
            }


          $ob_pg = "";
            if (isset($column[4])) {
                $ob_pg = mysqli_real_escape_string($conn, $column[8]);
            }

            
            $sqlInsert = "INSERT into programme_details (college_id,course_code, course_name, sanctioned_strength,total_candidates, foreign_candidates,other_board, ob_ug,ob_pg)
                   values (?,?,?,?,?,?,?,?,?)";
            $paramType = "issiiiiii";
            $paramArray = array(
                $college_id,
                $course_code,
                $course_name,
                $sanctioned_strength,
                $total_candidates,
                $foreign_candidates,
                $other_board,
                $ob_ug,
                $ob_pg

            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>


<style>

.outer-scontainer {
    background: #F0F0F0;
    border: #e0dfdf 1px solid;
    padding: 20px;
    border-radius: 2px;
}

.input-row {
    margin-top: 0px;
    margin-bottom: 20px;
}

.btn-submit {
    background: #333;
    border: #1d1d1d 1px solid;
    color: #f0f0f0;
    font-size: 0.9em;
    width: 100px;
    border-radius: 2px;
    cursor: pointer;
}

.outer-scontainer table {
    border-collapse: collapse;
    width: 100%;
}

.outer-scontainer th {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

.outer-scontainer td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

#response {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 2px;
    display: none;
}

.success {
    background: #c7efd9;
    border: #bbe2cd 1px solid;
}

.error {
    background: #fbcfcf;
    border: #f3c6c7 1px solid;
}

div#response.display-block {
    display: block;
}
</style>


<script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

      $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
              $("#response").addClass("error");
              $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>

<?php // include('header.php');?>

    
  <!-- Content section -->
  <section class="py-5">
    <div class="container">


<h2 class="page-title">Import Course Details as CSV</h2>

<div class="row">
<div class="col-md-12">
<div class="panel panel-primary">
<div class="panel-heading">Course Details : To be uploaded by colleges</div>
<div class="panel-body">



<div id="response"
class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
<?php if(!empty($message)) { echo $message; } ?>
</div>

<div class="outer-scontainer">
<div class="row">
<form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">



<div class="col-lg-12">
<div class="form-group ">
<label>Upload Your CSV File</label>
<div class="input-group">
<input type="file" name="file" id="file" class="form-control-file" required="required" accept=".csv" style="background: #1a73e8; color: #ffffff;border-radius: 5px;  padding: 10px 20px 10px 20px;">
</div>
</div>
</div>

<div class="col-lg-12">
<div class="form-group ">

  <button type="submit" id="submit" name="import" class="btn btn-primary" style="font-family: Roboto; background: #1a73e8; color:#FFFFF; font-size: 15px;">Import</button>

  

</div>
</div>
</div>









</div>

</form>




<!--<div class="toolbar">
  <label>
    <input type="checkbox" id="sortable" /> sortable
  </label>
</div>-->


<?php
if($status==1)
{
$sqlSelect = "SELECT * FROM programme_details";
}
else
{
$sqlSelect = "SELECT * FROM programme_details where college_id=$aid;"; 

}

$result = $db->select($sqlSelect);
if (! empty($result)) 
{
    $cnt=0;
    $sum=0;
?>

<table  id="table"  data-toggle="table"  data-search="true" data-pagination="true">
                  
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>College ID</th>
                      <th>Course Code and Name</th>
                      <th>Sanctioned Strength</th>
                      <th>Total Candidates</th>
                      <th>Foreign Candidates</th>
                      <th>Other Board</th>
                      <th>OB UG</th>
                      <th>OB PUG</th>
                   </tr>
                  </thead>

                  <tfoot>
                    <tr>
                     <th>#</th>
                      <th>College ID</th>
                      <th>Course Code and Name</th>
                      <th>Sanctioned Strength</th>
                      <th>Total Candidates</th>
                      <th>Foreign Candidates</th>
                      <th>Other Board</th>
                      <th>OB UG</th>
                      <th>OB PUG</th>
                    </tr>
                  </tfoot>
                  
                 


<tbody>

<?php
foreach ($result as $row) 
{
 $cnt=$cnt+1; 
 // $sum += $row['amount'];
?>

<tr>
<td><?php  echo $cnt; ?></td>
<td><?php  echo $row['college_id']; ?></td>
<td><?php  echo $row['course_code']; ?>&nbsp;&nbsp;&nbsp;<?php  echo $row['course_name']; ?></td>
<td><?php  echo $row['sanctioned_strength']; ?></td>
<td><?php  echo $row['total_candidates']; ?></td>
<td><?php  echo $row['foreign_candidates']; ?></td>
<td><?php  echo $row['other_board']; ?></td>
<td><?php  echo $row['ob_ug']; ?></td>
<td><?php  echo $row['ob_pg']; ?></td>
</tr>
<?php
}
?>

</tbody>
</table>
<?php } ?>










</div>
</div>
</div>
</div>
</div>










      
    </div>
  </section>





<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css">
<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>

  <?php include('footer.php');?>
  
  
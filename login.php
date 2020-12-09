<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
  if ( !isset($_POST['username'], $_POST['password']) ) 
  {
  exit('Please fill both the username and password fields!');
  }

    if($stmt = $mysqli->prepare('SELECT admin_id, admin_password FROM admin WHERE admin_email = ?')) 
    {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

            if ($stmt->num_rows > 0) 
            {
          $stmt->bind_result($id, $password);
          $stmt->fetch(); //  Account exists
   
            if (md5($_POST['password']) === $password) 
            {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
          $_SESSION['id']=$id;
          $_SESSION['login']= $_POST['admin_email'];
          $ldate=date('d/m/Y h:i:s', time());

$uid=$_SESSION['id'];

$admin_email=$_SESSION['login'];
            header("location:dashboard.php");
            }
            else
            {
            echo "<script>alert('Wrong Password');</script>";
            }
    
          }
    }
    else
    {
      echo "<script>alert('Invalid Username');</script>";
    }
    $stmt->close();
}



     
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Bharathiar University, Coimbatore</title>
<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/full-width-pics.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
</head>
<body>


<?php include('header.php');?>

    
  <!-- Content section -->
  <section class="py-5">
    <div class="container">


<h2 class="page-title">Portal for Certificate &amp; Eligibility Verification</h2>

<div class="row">
<div class="col-md-12">
<div class="panel panel-info">
<div class="panel-heading">Login</div>
<div class="panel-body">













<form method="post" action=""  class="form-horizontal">



<div class="form-group">
<label class="col-sm-2 control-label">User Name </label>
<div class="col-sm-8">
<input type="text" name="username" id="username"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Password </label>
<div class="col-sm-8">
<input type="password" name="password" id="password"  class="form-control" oncopy="return false" onpaste="return false"  required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-6 control-label">Verification Code (CAPTCHA) </label>
<div class="col-sm-8">
<input type="text" class="form-control" name="vercode" maxlength="5" autocomplete="off" required  />&nbsp;<img src="captcha.php">
</div>  
</div> 




<div class="col-sm-6 col-sm-offset-4">
<input type="submit" name="login" Value="Next" class="btn btn-primary">
</div>


</form>


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
  
  
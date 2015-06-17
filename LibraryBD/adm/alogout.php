<?php require_once('../dbconnect.php'); ?>
<?php require_once('../all.php'); ?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>Library</title>
    <link  href="../bootstrap.min.css" rel="stylesheet">
  <!--  <script src="jquery-1.8.0.min.js"></script>
    <script src="bootstrap.min.js"></script> -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>

<?php
    $formAction = $_SERVER['PHP_SELF'];
	$_SESSION['id'] = NULL;
	echo "<script>
	      type='text/javascript'> alert('退出成功！'); 
	      location.href='../newindex.php'; </script>";  	
?>

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
    if(isset($_GET['userid']) && $_GET['userid'] !='')
    {
        $userid = trim($_GET['userid']);
        //echo "<script type='text/javascript'> alert('$bookid'); </script>";
        $query = 'select *  
		          from User 
		          where userid="' . $userid . '";';
		$result = mysql_query($query,$mysql);
		if ($result==false) echo "<script type='text/javascript'> alert('查询失败！'); </script>";
		else
		{
		    $info = mysql_fetch_array($result);
		    $username = $info['username'];
		    $umail = $info['umail'];
		    $type = $info['type'];
		    $dept = $info['dept'];
		    $maxnum = $info['maxnum'];
		}
     }
     //show_imformation 
?>

<?php
	if ( ($_GET['del']) != "")
	{
		$id = trim($_GET['del']);
		//echo "<script type='text/javascript'> alert($id); </script>";
		$query = 'Delete  
		          from User  
		          Where userid="'. $id .'";';
		$result = mysql_query($query,$mysql);
		if($result)
		{
				echo "<script type='text/javascript'> alert('删除成功！'); 
				      location.href='aindex.php'; </script>";	
		}
		else
		{
				echo "<script type='text/javascript'> alert('删除失败！'); </script>";				
		} 
		//die();
    }
?>

<?php
	$formAction = $_SERVER['PHP_SELF'];
	//$id = $_SESSION['id'];
	if ($_GET['id'] != "")
	{
	   $id = trim($_GET['id']);
	   $t = trim($_POST['type']);
	   $d = trim($_POST['dept']);
	   $selectSQL ='update User
	                set type="'.$t.'",dept="'.$d.'"
	                where userid="' . $id . '";';
	   $result = mysql_query($selectSQL,$mysql); 
	   if($result==false)  echo "<script type='text/javascript'> alert('更新失败！'); </script>";
	   else echo "<script type='text/javascript'> alert('更新成功！'); 
				  location.href='auser.php?userid='+$id; 
				  </script>";
	}
?>

<script type="text/javascript">
	function check(form)
	{
		//var u_id = parseInt(form.username.value); 
		
		form.submit();
	}
	
	function del(url)
	{
		if( confirm("确认删除用户?") )
		{
				//document.location.
				//alert(url);
				//window.open(url);			
				 window.location.href =url;	
				//window.open(url,'_self');
				//header('Location:url');
				//href="auser.php?type=delete&id='.userid.'";
		}		//else { alert("已取消！");}
	}
</script>

<body>
<div class="container">
    <div >
        <div class="page-header">
          <img src="../head1.jpg">
        </div>
    </div>
    <div role="navigation">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="sindex.php">工作系统</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="sindex.php">借还</a></li>
                        <li><a href="ssearch.php">查询</a></li>
                        <li><a href="sadvice.php">读者来信</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Worker <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="sprofile.php">个人信息</a></li>
                                <li class="divider"></li>
                                <li><a href="wlogout.php">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div>
        <ol class="breadcrumb">
            <li><a href="sindex.php">工作系统</a></li>
            <li><a href="ssearch.php">查询系统</a></li>
            <li>查询结果</a></li>
            <li>用户信息</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title">用户信息</h3>
                </div>
                <div class="panel-body" >
                    <div class="col-sm-8 col-sm-offset-2">
                        <form class="form-horizontal" id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$userid; ?>">
                            <div class="form-group">
                                <label for="inputname" class="col-sm-2 control-label">姓名</label>
                                <div class="col-sm-8">
                                   <input type="text" class="form-control" id="inputname" value="<?php echo $username; ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputid" class="col-sm-2 control-label">学号/工号</label>
                                <div class="col-sm-8">
                                  <input type="number" class="form-control" id="inputid" value="<?php echo $userid; ?>" name="id" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-8">
                                   <input type="email" class="form-control" id="inputEmail" value="<?php echo $umail; ?>"  disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputchara" class="col-sm-2 control-label" >读者类别</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputtype" value="<?php echo $type; ?>"  disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputdept" class="col-sm-2 control-label">院系</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputdept" value="<?php echo $dept; ?>"  disabled>
                                </div>
                            </div>
                            
                            <!--<div class="form-group">
                                <div class="col-sm-offset-3 col-sm-10">
                                   <button type="submit" class="btn btn-default" id="update" href="ssearch.php">更新信息</button>
                                </div>
                            </div>
                             <div class="form-group">
                                <input type="hidden" id="MyForm" name="MyForm" value="form1" >
                             </div>-->
                        </form>
                    </div>

                </div>

        </div>
    </div>
        <hr>
<footer>
<p style="text-align: center">&copy Design By: 13307130318 13307130501</p>
</footer>
</div>

</body>
</html>

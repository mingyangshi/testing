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
	$id = $_SESSION['id'];
	if ($_POST['unum'] != "" || $_POST['gnum'] != "" || $_POST['dnum'] != "" || $_POST['tnum'] != ""  || $_POST['onum'] != "")  
	{
	    //if ($_POST_['unum'] != "")
	    {
	       $num = trim($_POST['unum']);
	       $query = 'update Class
	                 set maxnum ="'.$num.'"
	                 where classid = "本科生"';
	       $result = mysql_query($query);
	       if($result==false)  echo "<script type='text/javascript'> alert('本科生最大借阅数更新失败！'); </script>";
	       //else echo "<script type='text/javascript'> alert('本科生最大借阅数更新成功！'); </script>";
	     }
	     //if ($_POST_['gnum'] != "")
	    {
	       $num = trim($_POST['gnum']);
	       $query = 'update Class
	                 set maxnum ="'.$num.'"
	                 where classid = "研究生"';
	       $result = mysql_query($query);
	       if($result==false)  echo "<script type='text/javascript'> alert('研究生最大借阅数更新失败！'); </script>";
	       //else echo "<script type='text/javascript'> alert('研究生最大借阅数更新成功！'); </script>";
	     }
	     //if ($_POST_['dnum'] != "")
	    {
	       $num = trim($_POST['dnum']);
	       $query = 'update Class
	                 set maxnum ="'.$num.'"
	                 where classid = "博士生"';
	       $result = mysql_query($query);
	       if($result==false)  echo "<script type='text/javascript'> alert('博士生最大借阅数更新失败！'); </script>";
	       //else echo "<script type='text/javascript'> alert('博士生最大借阅数更新成功！'); </script>";
	     }
	     //if ($_POST_['tnum'] != "")
	    {
	       $num = trim($_POST['tnum']);
	       $query = 'update Class
	                 set maxnum ="'.$num.'"
	                 where classid = "教师"';
	       $result = mysql_query($query);
	       if($result==false)  echo "<script type='text/javascript'> alert('教师最大借阅数更新失败！'); </script>";
	       //else echo "<script type='text/javascript'> alert('教师最大借阅数更新成功！'); </script>";
	     }
	     //if ($_POST_['onum'] != "")
	    {
	       $num = trim($_POST['onum']);
	       $query = 'update Class
	                 set maxnum ="'.$num.'"
	                 where classid = "校外人员"';
	       $result = mysql_query($query);
	       if($result==false)  echo "<script type='text/javascript'> alert('校外人员最大借阅数更新失败！'); </script>";
	       //else echo "<script type='text/javascript'> alert('校外人员最大借阅数更新成功！'); </script>";
	     }
	     echo "<script type='text/javascript'> alert('更新成功！'); </script>";   
	}  
	//else echo "<script type='text/javascript'> alert('数目不能为空！'); </script>";
?>

<?php
	$query = 'select maxnum
	          from Class 
	          where classid = "本科生"';
	$result = mysql_query($query);
	$info = mysql_fetch_array($result);
    $unum = $info['maxnum'];
    $query = 'select maxnum
	          from Class 
	          where classid = "研究生"';
	$result = mysql_query($query);
	$info = mysql_fetch_array($result);
    $gnum = $info['maxnum'];
    $query = 'select maxnum
	          from Class 
	          where classid = "博士生"';
	$result = mysql_query($query);
	$info = mysql_fetch_array($result);
    $dnum = $info['maxnum'];
    $query = 'select maxnum
	          from Class 
	          where classid = "教师"';
	$result = mysql_query($query);
	$info = mysql_fetch_array($result);
    $tnum = $info['maxnum'];
    $query = 'select maxnum
	          from Class 
	          where classid = "校外人员"';
	$result = mysql_query($query);
	$info = mysql_fetch_array($result);
    $onum = $info['maxnum'];    
?>

<script type="text/javascript">
	function check(form)
	{					
		if(form.unum.value == "")
		{
		    alert("数目不能为空！");
			form.unum.focus(); return false;  
		}
		if(form.gnum.value == "")
		{
		    alert("数目不能为空！");
			form.gnum.focus(); return false;  
		}	
		if(form.dnum.value == "")
		{
		    alert("数目不能为空！");
			form.dnum.focus(); return false;  
		}
		if(form.tnum.value == "")
		{
		    alert("数目不能为空！");
			form.tnum.focus(); return false;  
		}
		if(form.onum.value == "")
		{
		    alert("数目不能为空！");
			form.onum.focus(); return false;  
		}
		form.submit();
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
                    <a class="navbar-brand" href="aindex.php">管理系统</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="asearchb.php">图书管理</a></li>
                        <li><a href="asearchu.php">读者管理</a></li>
                        <li><a href="asearchw.php">工作人员管理</a></li>
                        <li><a href="aadvice.php">读者来信</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="aprofile.php">更改密码</a></li>
                                <li><a href="../staff/sindex.php">工作系统</a></li>
                                <li class="divider"></li>
                                <li><a href="alogout.php">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div>
        <ol class="breadcrumb">
            <li><a href="aindex.php">管理系统</a></li>
            <li><a href="asearchu.php">读者管理</a></li>
            <li>等级管理</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">等级管理</h3>
            </div>
            <div class="panel-body" >
                <form class="form-horizontal col-sm-8 col-sm-offset-2" name="form1" method="POST" action="<?php echo $formAction; ?>" >
                    <h2 style="text-align: center">最大可借阅数</h2>
                    <br/>
                    <div class="form-group">
                        <label for="under" class="col-sm-2 control-label">本科生</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="under" value="<?php echo $unum?>" name="unum">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="post" class="col-sm-2 control-label">研究生</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="post" value="<?php echo $gnum?>" name="gnum">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="doctor" class="col-sm-2 control-label">博士生</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="doctor" value="<?php echo $dnum?>" name="dnum">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="teacher" class="col-sm-2 control-label">教师</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="teacher" value="<?php echo $tnum?>" name="tnum">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="other" class="col-sm-2 control-label">校外人员</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="other" value="<?php echo $onum?>" name="onum">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" onclick="return check(form1)">更新</button>
                        </div>
                    </div>
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

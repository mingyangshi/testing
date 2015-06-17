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
	if (isset($_POST["MyForm"]) && ($_POST["MyForm"] == "form1"))
	{
	   $id = trim($_POST['staffid']);
	   $password = trim($_POST['password1']);
	   $name = trim($_POST['staffname']);
	   $email = trim($_POST['smail']);
	   $selectSQL ='select staffid 
	                from Staff 
	                where staffid="' . $id . '";';
	   $result = mysql_query($selectSQL,$mysql); 
	   if($result==false)  echo "<script type='text/javascript'> alert('查询失败！'); </script>";
	   else {
            $info = mysql_fetch_array($result);
            if($info!=false) {
                             echo "<script type='text/javascript'> alert('该工号已存在！'); </script>";
        					 //header('Location:login.php');
					  		 return; 
					  		 }
		    else {
		           $insertq = 'insert into Staff (staffid,staffname,spassword,smail)
				               values("'.$id.'","'.$name.'","'.$password.'","'.$email.'");';
				   $result = mysql_query($insertq,$mysql);	
				   if($result) {
				        	    echo "<script type='text/javascript'> alert('录入工作人员信息成功！'); </script>";   
				        	    //header('Location:ulogin.php');
				        	    } else echo "<script type='text/javascript'> alert('录入工作人员信息失败！'); </script>";
	              } 
		      }	   
	 }
?>

<script type="text/javascript">
	function check(form)
	{
		//var u_id = parseInt(form.username.value); 
		if(form.staffid.value == "")
		{
			alert("学号/工号不能为空！"); 
			form.staffid.focus(); return false;
		}
		
		if(form.staffname.value == "")
		{
			alert("姓名不能为空！"); 
			form.staffname.focus(); return false;
		}
		
		if(form.password1.value == "")
		{
			alert("密码不能为空！");
			form.password1.focus(); return false;
		}
		
		if(form.password1.value.length<6 || form.password1.value.length>16)
		{
			alert("密码长度应在6到16之间！");
			form.password1.focus(); return false;
		}
		
		if(form.password2.value == "")
		{
			alert("请确认密码！");
			form.password2.focus(); return false;
		}
				
		if(form.password1.value != form.password2.value)
		{
			alert("两次密码输入不一致！");
			return false;
		}
		
		if(form.smail.value == "")
		{
			alert("邮箱不能为空！");
			form.smail.focus(); return false;
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
            <li><a href="asearchw.php">工作人员管理</a></li>
            <li>添加工作人员</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">添加工作人员</h3>
            </div>
            <div class="panel-body" >
                <div class="col-sm-8 col-sm-offset-2 ">
                    <form class="form-horizontal" id="form1" name="form1" method="post" action="<?php echo $formAction; ?>">
                        <h2 style="text-align: center">录入工作人员信息</h2>
                        <br/>
                        <div class="form-group">
                            <label for="inputworkid" class="col-sm-2 control-label">工号</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="inputworkid" placeholder="请录入工号" name="staffid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputworkername" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputworkername" placeholder="请录入姓名" name="staffname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputworkermail" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputworkermail" placeholder="请录入邮箱" name="smail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword" placeholder="请录入密码" name="password1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword0" class="col-sm-2 control-label">确认密码</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword0" placeholder="请确认密码" name="password2">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" id="aduser" onclick="return check(form1)">添加</button>
                            </div>
                        </div>
                         <div class="form-group">
                           <input type="hidden" id="MyForm" name="MyForm" value="form1" >
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

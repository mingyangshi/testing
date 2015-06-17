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
		}
     }
     //show_imformation 
?>

<?php
	if ( ($_GET['del']) != "")
	{
		$id = trim($_GET['del']);
		//echo "<script type='text/javascript'> alert($id); </script>";
		
		$queryy = 'update Book
		           set state="丢失"   
		           Where readid="'. $id .'";';
		$resultt = mysql_query($query,$mysql);
		$queryyy = 'Delete  
		          from User  
		          Where userid="'. $id .'";';
		$resulttt = mysql_query($query,$mysql);
		if($result && $resultt && $resulttt)
		{
				echo "<script type='text/javascript'> alert('删除成功！'); 
				      location.href='asearchu.php'; </script>";	
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
            <li>搜索结果</a></li>
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
                                    <select class="form-control" id="inputchara" name="type">
                                        <option <?php if($dept=='本科生') echo("selected");?> >本科生</option>
                                        <option <?php if($dept=='研究生') echo("selected");?> >研究生</option>
                                        <option <?php if($dept=='博士生') echo("selected");?> >博士生</option>
                                        <option <?php if($dept=='教师') echo("selected");?> >教师</option>
                                        <option <?php if($dept=='外来人员') echo("selected");?> >外来人员</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputdept" class="col-sm-2 control-label" >院系</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="inputdept" name="dept">
                                        <option <?php if($dept=='中国语言文学系') echo("selected");?> >中国语言文学系</option>
                                        <option <?php if($dept=='新闻学院') echo("selected");?> >新闻学院</option>
                                        <option <?php if($dept=='哲学学院') echo("selected");?> >哲学学院</option>
                                        <option <?php if($dept=='文物与博物馆学系') echo("selected");?> >文物与博物馆学系</option>
                                        <option <?php if($dept=='外国语言文学学院') echo("selected");?> >外国语言文学学院</option>
                                        <option <?php if($dept=='法学院') echo("selected");?> >法学院</option>
                                        <option <?php if($dept=='历史学系') echo("selected");?> >历史学系</option>
                                        <option <?php if($dept=='国际关系与公共事务学') echo("selected");?> >国际关系与公共事务学院</option>
                                        <option <?php if($dept=='旅游学系') echo("selected");?> >旅游学系</option>
                                        <option <?php if($dept=='经济学院') echo("selected");?> >经济学院</option>
                                        <option <?php if($dept=='管理学院') echo("selected");?> >管理学院</option>
                                        <option <?php if($dept=='社会发展与公共政策学院') echo("selected");?> >社会发展与公共政策学院</option>
                                        <option <?php if($dept=='数学科学学院') echo("selected");?> >数学科学学院</option>
                                        <option <?php if($dept=='保密学院') echo("selected");?> >保密学院</option>
                                        <option <?php if($dept=='计算机科学技术学院') echo("selected");?> >计算机科学技术学院</option>
                                        <option <?php if($dept=='物理学系') echo("selected");?> >物理学系</option>
                                        <option <?php if($dept=='化学系') echo("selected");?> >化学系</option>
                                        <option <?php if($dept=='高分子科学系') echo("selected");?> >高分子科学系</option>
                                        <option <?php if($dept=='环境科学与工程系') echo("selected");?> >环境科学与工程系</option>
                                        <option <?php if($dept=='信息科学与工程学院') echo("selected");?> >信息科学与工程学院</option>
                                        <option <?php if($dept=='软件学院') echo("selected");?> >软件学院</option>
                                        <option <?php if($dept=='材料科学系') echo("selected");?> >材料科学系</option>
                                        <option <?php if($dept=='力学与工程科学系') echo("selected");?> >力学与工程科学系</option>
                                        <option <?php if($dept=='生命科学学院') echo("selected");?> >生命科学学院</option>
                                        <option <?php if($dept=='基础医学院') echo("selected");?> >基础医学院</option>
                                        <option <?php if($dept=='公共卫生学院') echo("selected");?> >公共卫生学院</option>
                                        <option <?php if($dept=='药学院') echo("selected");?> >药学院</option>
                                        <option <?php if($dept=='护理学院') echo("selected");?> >护理学院</option>
                                        <option <?php if($dept=='国际文化交流学院') echo("selected");?> >国际文化交流学院</option>
                                        <option <?php if($dept=='上海医学院') echo("selected");?> >上海医学院</option>
                                        <option <?php if($dept=='研究生院') echo("selected");?> >研究生院</option>
                                        <option <?php if($dept=='其他') echo("selected");?> >其他</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-default" id="update" onclick="return check(form1)">更新信息</button>
                                   <button type="submit" class="btn btn-default col-sm-offset-1 btn-danger" id="delete" onclick="del(<?php echo "'".$_SERVER['PHP_SELF']."?del=".$userid."'"; ?>);return false; ">删除读者</button>
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

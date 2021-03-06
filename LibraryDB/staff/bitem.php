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
    if(isset($_GET['bookid']) && $_GET['bookid'] !='')
    {
        $bookid = trim($_GET['bookid']);
        //echo "<script type='text/javascript'> alert('$bookid'); </script>";
        $query = 'select *  
		          from Book 
		          where bookid="' . $bookid . '";';
		$result = mysql_query($query,$mysql);
		if ($result==false) echo "<script type='text/javascript'> alert('查询失败！'); </script>";
		else
		{
		    $info = mysql_fetch_array($result);
		    $bookname = $info['bookname'];
		    $author = $info['author'];
		    $press = $info['press'];
		    $isbn = $info['isbn'];
		    $branch = $info['branch'];
		    $callnumber = $info['callnumber'];
		    $times = $info['times'];
		    $state = $info['state'];		    
		    $bookimg = $info['bookimg'];
		}
     }
     //show_imformation 
?>

<?php
	$formAction = $_SERVER['PHP_SELF'];
	//$id = $_SESSION['id'];
	if ($_GET['id'] != "")
	{
	   $id = trim($_GET['id']);
	   $b = trim($_POST['branch']);
	   $s = trim($_POST['state']);	   
	   $selectSQL ='update Book
	                set branch="'.$b.'",state="'.$s.'" 
	                where bookid="' . $id . '";';
	   $result = mysql_query($selectSQL,$mysql); 
	   if($result==false)  echo "<script type='text/javascript'> alert('更新失败！'); </script>";
	   else echo "<script type='text/javascript'> alert('更新成功！'); 
				  location.href='bitem.php?bookid='+$id; 
				  </script>";
	}
?>

<?php
	if ( ($_GET['del']) != "")
	{
		$id = trim($_GET['del']);
		//echo "<script type='text/javascript'> alert($id); </script>";
		$query = 'Delete  
		          from Book  
		          Where bookid="'. $id .'";';
		$result = mysql_query($query,$mysql);
		if($result)
		{
				echo "<script type='text/javascript'> alert('删除成功！'); 
				      location.href='aindex.php'; </script>";	
		}
		else
		{
				echo "<script type='text/javascript'> alert('删除失败！');";			
		} 
		//die();
    }
?>

<script type="text/javascript">
	function check(form)
	{
		form.submit();
	}
	
	function del(url)
	{
		if( confirm("确认删除图书?") )
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
            <li>图书信息</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">图书信息</h3>
            </div>
            <div class="panel-body" >
                <div class="panel-body" >
                    <img class="col-sm-3" src="<?php echo $bookimg; ?>" width="300" height="400">
                <br/>
                <div class="col-sm-8 col-sm-offset-1 ">
                   <form class="form-horizontal" id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']."?id=".$bookid; ?>">
                       <div class="form-group">
                           <label for="inputbookname" class="col-sm-2 control-label">书名</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="inputbookname" value="<?php echo $bookname; ?>" disabled>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputauthor" class="col-sm-2 control-label">作者</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="inputauthor" value="<?php echo $author; ?>" disabled>
                           </div>
                       </div>
                        <div class="form-group">
                           <label for="inputbookid" class="col-sm-2 control-label">出版社</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" id="inputpress" value="<?php echo $press; ?>" disabled>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputisbn" class="col-sm-2 control-label">ISBN</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" id="inputisbn" value="<?php echo $isbn; ?>" disabled>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputbookid" class="col-sm-2 control-label">内部码</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" id="inputbookid" value="<?php echo $bookid; ?>" disabled>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputlocatenum" class="col-sm-2 control-label">索书号</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" id="inputlocatenum" value="<?php echo $callnumber; ?>" disabled>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputbrwnum" class="col-sm-2 control-label">借阅次数</label>
                           <div class="col-sm-8">
                               <input type="text" class="form-control" id="inputbrwnum" value="<?php echo $times; ?>" disabled>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputbranch" class="col-sm-2 control-label" >所属分馆</label>
                           <div class="col-sm-8">
                               <select class="form-control" id="inputbranch" name="branch">
                                   <option <?php if($branch=='邯郸校区理科图书馆') echo("selected");?> >邯郸校区理科图书馆</option>
                                   <option <?php if($branch=='邯郸校区文科图书馆') echo("selected");?> >邯郸校区文科图书馆</option>
                                   <option <?php if($branch=='张江校区分馆') echo("selected");?> >张江校区分馆</option>
                                   <option <?php if($branch=='江湾校区分馆') echo("selected");?> >江湾校区分馆</option>
                                   <option <?php if($branch=='枫林校区分馆') echo("selected");?> >枫林校区分馆</option>
                               </select>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputstate" class="col-sm-2 control-label" >状态</label>
                           <div class="col-sm-8">
                               <select class="form-control" id="inputstate" name="state">
                                   <option <?php if($state=='可借阅') echo("selected");?> >可借阅</option>
                                   <option <?php if($state=='已借出') echo("selected");?> >已借出</option>
                                   <option <?php if($state=='丢失') echo("selected");?> >丢失</option>
                                   <option <?php if($state=='购买中') echo("selected");?> >购买中</option>
                                   <option <?php if($state=='非借阅') echo("selected");?> >非借阅</option>
                               </select>
                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-sm-offset-2 col-sm-10">
                               <button type="submit" class="btn btn-default" id="update" onclick="return check(form1)">更新信息</button>
                               <button type="submit" class="btn btn-default col-sm-offset-1 btn-danger" id="delete" onclick="del(<?php echo "'".$_SERVER['PHP_SELF']."?del=".$bookid."'"; ?>); return false; ">删除书目</button>
                           </div>
                       </div>
                   </form>



                </div>
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

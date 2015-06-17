<?php require_once('../dbconnect.php'); ?>
<?php require_once('../all.php'); ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Library</title>
    <link  href="../bootstrap.min.css" rel="stylesheet">
    <!--  <script src="jquery-1.8.0.min.js"></script>
      <script src="bootstrap.min.js"></script> -->
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
     <style>
      dt{font-size: x-large;}
      dd{font-size: x-large;}
    </style>
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
		    $isbn = $info['isbn'];
		    $bookname = $info['bookname'];
		    $author = $info['author'];
		    $press = $info['press'];
		    $branch = $info['branch'];
		    $callnumber = $info['callnumber'];
		    $state = $info['state'];
		    $times = $info['times'];
		    $bookimg = $info['bookimg'];
		}
    }
?>

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
                <a class="navbar-brand" href="uindex.php">首页</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li ><a href="ubrw.php">预约<span class="sr-only">(current)</span></a></li>
                        <li><a href="rank.php">榜单</a></li>
                        <li><a href="usearch.php">搜索</a></li>
                        <li><a href="advice.php">意见反馈</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="uprofile.php">个人信息</a></li>
                            <li><a href="urecord.php"> 在借书籍</a></li>
                            <li><a href="record.php">借阅记录 </a></li>
                            <li class="divider"></li>
                            <li><a href="ulogout.php">退出</a></li>
                        </ul>
                    </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div>
        <ol class="breadcrumb">
            <li><a href="uindex.php">主页</a></li>
            <li>图书简介</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo"《"; echo $bookname; echo "》"; ?></h3>
            </div>
            <div class="panel-body" >
                <div class="panel-body" >
                    <img class="col-sm-3" src="<?php echo $bookimg; ?>" width="300" height="400">
               
                <div class="col-sm-8 pull-right">
                    <br/>
                    <br/>
                    <br/>
                    <dl class="dl-horizontal">
                        <dt>书名</dt><dd><?php echo "$bookname"?></dd>
                        <dt>作者</dt><dd><?php echo "$author"?></dd>
                        <dt>出版社</dt><dd><?php echo "$press"?></dd>
                        <dt>内部码</dt><dd><?php echo "$bookid"?></dd>
                        <dt>ISBN</dt><dd><?php echo "$isbn"?></dd>
                        <dt>所属分馆</dt><dd><?php echo "$branch"?></dd>
                        <dt>索书号</dt><dd><?php echo "$callnumber"?></dd>
                        <!--<dt>排名</dt><dd>2</dd>-->
                        <dt>状态</dt><dd><?php echo "$state"?></dd>
                        <dt>已借次数</dt><dd><?php echo "$times"?></dd>
                    </dl>  </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-10">
                        <br/>
                        <br/>
                            <button  class="btn btn-default"><a href="ubrw.php">预约</a></button>
                   </div>
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

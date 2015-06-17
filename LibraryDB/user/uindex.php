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
    <style>
    .jumbotron{
        background: url("../bg4.jpg") no-repeat;
        background-size: cover;
        background-position: 0px -100px;
        color: white;
        text-shadow: black 2px 2px;
    }
</style>
</head>

<?php
    $formAction = $_SERVER['PHP_SELF'];
	$id = $_SESSION['id'];	
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
        </ol>
        <div class="jumbotron">
    <div class="container">
        <h2>开启阅读之旅</h2>
        <p>通过书名或者作者，在图书馆丰富的馆藏中找到你所需要的图书。</p>
        <p><a class="btn btn-primary btn-lg" href="usearch.php" role="button">搜索图书 &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>线上预约</h2>
            <p>通过图书内部码进行线上预约，第一时间借到热门图书。</p>
            <p><a class="btn btn-default" href="ubrw.php" role="button">线上预约 &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>阅读榜单</h2>
            <p>想知道大家都在看什么书？到阅读榜单看看吧。 </p>
            <p><a class="btn btn-default" href="rank.php" role="button">阅读榜单 &raquo;</a></p>
        </div>
        <div class="col-md-4">
            <h2>意见反馈</h2>
            <p>如果遇到困难或者有任何意见，欢迎您给我们留言。 </p>
            <p><a class="btn btn-default" href="advice.php" role="button">意见反馈 &raquo;</a></p>
        </div>
    </div>
</div>
<hr>
<footer>
<p style="text-align: center">&copy Design By: 13307130318 13307130501</p>
</footer>
    </div>
</div>
</body>
</html>

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
            <li>查询系统</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">查询系统</h3>
            </div>
            <div class="panel-body" >
                <div class="col-sm-8 col-sm-offset-2">
                    <br/>
                    <form role="search" name="form1" method="POST" action="ssearchuresult.php">
                        <div class="form-group">
                            <div class="col-md-2">
						     <select class="form-control" name="searchitem" id="searchitem" name="searchitem">
							  <option value="userid">ID</option>
							  <option value="username">用户名</option>
							 </select>
						  </div> 
                        <div class="form-group" >
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputuserid" placeholder="用户名/用户ID" name="searchword">
                            </div>
                            <button type="submit" class="btn btn-default"><a href="ssearchuresult.php">查找读者</a></button>
                        </div>
                    </form>
                    <br/>
                    <form role="search" name="form1" method="POST" action="ssearchbresult.php">
                        <div class="form-group">
                            <div class="col-md-2">
						     <select class="form-control" name="searchitem" id="searchitem">
							  <option value="bookname">书名</option>
							  <option value="author">作者</option>
							  <option value="press">出版社</option>
							  <option value="isbn">ISBN</option>
							</select>
						  </div> 
                        <div class="form-group">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputbookid" placeholder="图书信息" name="searchword">
                            </div>
                            <button type="submit" class="btn btn-default"><a href="ssearchbresult.php">查找图书</a></button>
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

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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
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
            <li>读者来信</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">读者来信</h3>
            </div>
            <!--<div class="panel-body" >
                <table class="table table-hover table-responsive">
                    <tr>
                        <th>#</th>
                        <th>书名</th>
                        <th>作者</th>
                        <th>内部码</th>
                        <th>状态</th>
                        <th>查看详细</th>
                    </tr>
                </table>-->
                <!--<nav>
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>-->
                
<?php
    $query = 'select *  
		      from Advice 
		      order by date desc
		      limit 0,100;';
    $result = mysql_query($query,$mysql);
	if ($result==false) echo "<script type='text/javascript'> alert('查询失败！'); </script>";
	else
	   {  
	      echo '<div class="panel-body">';
	      echo '<table class="table table-hover table-responsive">';		      
	      //echo "<script type='text/javascript'> alert('！'); </script>";
		  $item .= '<tr><th>#</th>';
		  $item .= '<th>用户ID</th>';
		  //$item .= '<td>'.$row['isbn'].'</td>'; 
		  $item .= '<th>用户姓名</th>';
		  $item .= '<th>日期</th>';
		  $item .= '<th>内容</th>';
		  $item .= '</tr>';
		  echo $item;
	      $tag=1;
	      while($row = mysql_fetch_array($result)) //输出表头
	      {
	         if ($row['fbid'] != '0')
	         {
		         $item = '<tr><th>'.$tag.'</td>';
    			 $item .= '<td>'.$row['userid'].'</td>';
	    		 $item .= '<td>'.$row['username'].'</td>';
	    		 $item .= '<td>'.$row['date'].'</td>';
	    		 //$item .= '<td>'.$row['isbn'].'</td>'; 
	    		 $item .= '<td>'.str_replace("\n","<br>",$row['content']).'</td>';//str_replace("\n","<br>",$str);
	    		 $item .= '</tr>';
	    		 echo $item;
	    		 $tag=$tag+1;
			 }
          }
          echo '</table>';
          mysql_free_result($result);
	   }
?>                

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

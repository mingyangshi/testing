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
                            <li><a href="urecord.php">在借书籍</a></li>
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
            <li>在借书籍</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">在借书籍</h3>
            </div>
            <div class="panel-body" >

                <!--<table class="table table-hover table-responsive">
                        <tr>
                            <th>#</th>
                            <th>图书内部码</th>
                            <th>书名</th>
                            <th>借书日期</th>
                            <th>应还日期</th>
                            <th>还书日期</th>
                        </tr>                        
                    </table>
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
   $id = $_SESSION['id'];
   $selectSQL ='select bookid,bookname,bdate,rdate,redate 
	            from Brwlist 
	            where userid="' . $id . '" and redate is NULL;';
   $result = mysql_query($selectSQL,$mysql); 
   if($result==false)  echo "<script type='text/javascript'> alert('查询失败！'); </script>";
   else {
            echo '<div class="panel-body">';
            echo '<table class="table table-hover table-responsive">';		  
		    //echo "<script type='text/javascript'> alert('！'); </script>";
			$item .= '<tr><th>#</th>';
			$item .= '<th>内部码</th>';
			//$item .= '<td>'.$row['isbn'].'</td>'; 
			$item .= '<th>图书名称</th>';		
			$item .= '<th>借书日期</th>';		
			$item .= '<th>应还日期</th>';		
			$item .= '</tr>';
			echo $item;
			$tag = 1;
            //echo "<script type='text/javascript'> alert('！'); </script>";
            while($row = mysql_fetch_array($result))
		      {
		        $item = '<tr><th>'.$tag.'</td>';
				$item .= '<td>'.$row['bookid'].'</td>';				
		        //echo "<script type='text/javascript'> alert($bookid); </script>";
				$item .= '<td>'.$row['bookname'].'</td>';
				$item .= '<td>'.$row['bdate'].'</td>'; 
				$item .= '<td>'.$row['rdate'].'</td>';
				$item .= '</tr>';
				echo $item;
				$tag = $tag + 1;
		      }
		  echo '</table>';
		  
         }   
?>
            </div>
        </div>
    </div>
    
</div>

</body>
<hr>
<footer>
<p style="text-align: center">&copy Design By: 13307130318 13307130501</p>
</footer>
</html>

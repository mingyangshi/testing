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

<?php
    $formAction = $_SERVER['PHP_SELF'];
    if ($_POST['oid'] != "")
        {          
          $id = $_SESSION['id'];
          $oid = trim($_POST['oid']);
          //echo "<script type='text/javascript'> alert($id); </script>";
          //get_orderid; 
          //get_userid;
          $selectSQL ="select state
	                   from Book 
	                   where bookid='". $oid ."';";
          $result = mysql_query($selectSQL,$mysql); 
          $info = mysql_fetch_array($result);
          if ($info['state'] != '可借阅') echo "<script type='text/javascript'> alert('该书暂不可借，请选择别的书！'); </script>";
          //check(num,maxnum);
          else 
          {
          $selectSQL ='select brwnum 
	                   from User 
	                   where userid="'. $id .'";';
          $result = mysql_query($selectSQL,$mysql); 
          //if($result==false)  echo "<script type='text/javascript'> alert('查询失败！1'); </script>";
          $info = mysql_fetch_array($result);          
          $num = $info['brwnum'];
          
          $selectSQL ='select type 
	                   from User
	                   where userid="'. $id .'";';
          $result = mysql_query($selectSQL,$mysql); 
          $info = mysql_fetch_array($result);
          $type = $info['type'];
          $selectSQL ='select maxnum 
	                   from Class 
	                   where classid="'. $type .'";';                   
          $result = mysql_query($selectSQL,$mysql); 
          $info = mysql_fetch_array($result);
          $maxnum = $info['maxnum'];
          
          //echo "<script type='text/javascript'> alert($maxnum); </script>";
          //echo "<script type='text/javascript'> alert($num); </script>";
          //echo "<script type='text/javascript'> alert($maxnum); </script>";
          if ($num >= $maxnum) echo "<script type='text/javascript'> alert('您已达可借阅数量，请还书后再借！'); </script>";
          else {
          $date = date('Y-m-d',time());
          $selectSQL ='select *
	                   from Brwlist 
	                   where (rdate < "'.$date.'") and userid = "'.$id.'" and redate is NULL;';
          $result = mysql_query($selectSQL,$mysql); 
          $info = mysql_fetch_array($result);
          if ($info) echo "<script type='text/javascript'> alert('您有逾期未还图书，请还书后再借！'); </script>";
          //check(num,maxnum);
          else {                       
	             date_default_timezone_set('Etc/GMT-8');
                 $bdate = date('Y-m-d',time());
                 $rdate = date('Y-m-d', strtotime("+1 months", strtotime( $bdate )));
                 //echo $bdate;  
                 //get_time;
                 //echo "<script type='text/javascript'> alert($bdate); </script>";
                 //echo "<script type='text/javascript'> alert(); </script>";
                 $selectbrwid ='select brwid
                                from Brwlist
                                order by brwid desc limit 1';
                 $result = mysql_query($selectbrwid,$mysql); 
                 //if($result==false)  echo "<script type='text/javascript'> alert('查询失败！2'); </script>";
                 $info = mysql_fetch_array($result);
                 $brwid = $info['brwid']+1;
                 //echo "<script type='text/javascript'> alert($brwid); </script>";
                 //$brwid = intval($str)+1;
                 //get_brwid;
                 
                 $selectSQL ='select bookname 
	                          from Book 
	                          where bookid="' . $oid . '";';
                 $result = mysql_query($selectSQL,$mysql); 
                 if($result==false)  echo "<script type='text/javascript'> alert('查询失败！3'); </script>";
                 $info = mysql_fetch_array($result);
                 $bookname = $info['bookname'];
                 //get_bookname;
                 
                 $query = 'update User
	                       set brwnum ="'. $num .'",times=times+1 
	                       where userid = "'. $id .'";';                 
                 $result = mysql_query($query,$mysql); 
                 if ($result!=false)  //echo "<script type='text/javascript'> alert('查询失败！4'); </script>";
                     {
                        $query = 'update Book
                                  set readid="' . $id . '", times=times+1, state="已借出"
                                  where bookid = "' . $oid . '";';                       
       				    $result = mysql_query($query,$mysql); 
       				    if ($result==false) echo "<script type='text/javascript'> alert('1!'); </script>";
       			       $insertq = 'insert into Brwlist (brwid,bookid,bookname,userid,bdate,rdate)  
       				      values("'.$brwid.'","'.$oid.'","'.$bookname.'","'.$id.'","'.$bdate.'","'.$rdate.'")'; 
       				    //$insertq = 'insert into User (userid,username,upassword,type,umail,dept,brwnum,logged,times,maxnum)
				          //     values("'.$id.'","'.$name.'","'.$password.'","'.$type.'","'.$email.'","'.$dept.'",0,0,0,"'.$num.'");';
       				    //echo "<script type='text/javascript'> alert('1'); </script>";
       				    //echo $insertq;
                        $resultt = mysql_query($insertq,$mysql); 
                       if ($resultt==false) echo "<script type='text/javascript'> alert('2!'); </script>";
                        else echo "<script type='text/javascript'> alert('预约成功，请前往相应分馆取书！'); </script>";
                      }
               }
          }
        }
      }
?>

<script type="text/javascript">
	function check(form)
	{	
	    if(form.oid.value == "")
     	{
	      alert("请输入预约图书内部码！");
		  form.oid.focus(); return false;
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
            <li>预约</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">预约</h3>
            </div>
            <div class="panel-body" >
                <div class="col-sm-8 col-sm-offset-2">
                    <br/>
                   <form class="form-horizontal" name="form1" id="form1" method="POST" action="<?php echo $formAction; ?>">
                    <div class="form-group">
                        <label for="inputbookid" class="col-sm-2  control-label">内部码</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="oid" placeholder="请输入预约图书内部码" name="oid">
                        </div>
                        <button type="submit" class="btn btn-default" name="button" onclick="return check(form1)">提交</button>
                    </div>
                     </form>
                    <div class="col-sm-8 col-sm-offset-2">
                    <ul>
                        <li>提醒：预约成功后请前往相应分馆取书，借书日期为预约日期。</li>
                    </ul>
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

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
	//$id = $_SESSION['id'];
	if (isset($_POST["MyForm"]) && ($_POST["MyForm"] == "form1"))
	{
	   $bookname = trim($_POST['bookname']);
	   $author = trim($_POST['author']);
	   $press = trim($_POST['press']);
	   $isbn = trim($_POST['isbn']);
	   $state = trim($_POST['state']);
	   $img = trim($_POST['img']);
	   //get_bookname,author,press,isbn,state
	   
	   $selectSQL ='select bookid
	                from Book 
	                where isbn="' . $isbn . '"
	                order by bookid desc limit 1;';
	   $result = mysql_query($selectSQL,$mysql); 
       if($result==false)  echo "<script type='text/javascript'> alert('查询失败！1'); </script>";
       $info = mysql_fetch_array($result);	
       $obid = $info['bookid'];
       if ($obid != "") $bookid=floatval($obid);
       else {
                 $selectbookid ='select bookid
                                 from Book
                                 order by bookid desc limit 1';
                 $result = mysql_query($selectbookid,$mysql); 
                 if($result==false)  echo "<script type='text/javascript'> alert('查询失败！2'); </script>";
                 $info = mysql_fetch_array($result);
                 $bookid = intval($info['bookid'])+1;
                 $bookid = number_format($bookid, 2, '.', '');
             }
        //echo "<script type='text/javascript'> alert($bookid); </script>";
        //get_bookid;
       
       if ($_POST["hlnum"]>0)
       {
           $num=$_POST['hlnum'];
           //get_num;
           $tag = 'HL';
           $selectSQL ='select *
	                    from Branch  
	                    where branchid="HL";';
           $result = mysql_query($selectSQL,$mysql); 
	       if ($result==false)  echo "<script type='text/javascript'> alert('查询失败！3'); </script>";
	       else {  
	              $info = mysql_fetch_array($result);
	              $floor = $info['floor'];
	              $part = $info['part'];
	              $barcode = $info['barcode'];
	              $barnum = $info['barnum'];
	              $sum = $info['sum'];	      
	              $sum = $sum + $num;         
	              if ($barnum+$num > 120) 
	              {
	                  $barnum = $num;
	                  $barcode = $barcode+1;
	                  if ($barcode > 100)
	                  {
	                      $barcode = 1;
	                      $part = $part+1;
	                      if ($part > 10) 
	                      {
	                          $part = 1;
	                          $floor = $floor+1;
	                      }
	                  }
	              } else $barnum = $barnum + $num;
	             
	             $ff = strval($floor);
	             $pp = strval($part);
	             $bb = strval($barcode);
	             $cc = 'HL-'.$ff.'-';
	             $cc .= $pp.'-';
	             $cc .= $bb.'-';
	             $cc .= $barnum;
	             //echo "<script type='text/javascript'> alert('$cc'); </script>";
	             
	             //get_callnumber:HL-i-j-k; BranchHL-Floori-Partj-Bark;
	             
	             $num1=$num;	   
	             while ($num1 > 0)
	             {
	                 $num1= $num1 - 1;
	                 $bookid = $bookid + 0.01;
	                 //echo "<script type='text/javascript'> alert($bookid); </script>";
	                 //echo "<script type='text/javascript'> alert($callnumber); </script>";
	                 //$callnumber = "111";
	                 $insertq = 'insert into Book (bookid,isbn,bookname,author,press,branch,callnumber,state,times,bookimg) 
values("'.$bookid.'","'.$isbn.'","'.$bookname.'","'.$author.'","'.$press.'","邯郸校区理科图书馆","'.$cc.'","'.$state.'","0","'.$img.'");';
                     $result = mysql_query($insertq,$mysql);
                     
	             }
	             //insert_book;
	             if($result==false)  echo "<script type='text/javascript'> alert('邯郸理图入库失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('邯郸理图入库成功！'); </script>";
	             $selectSQL ='update Branch
	                          set floor="'.$floor.'", part="'.$part.'", barcode="'.$barcode.'", barnum="'.$barnum.'", sum="'.$sum.'"     
	                          where branchid="HL";';
	             $result = mysql_query($selectSQL,$mysql); 
	             if($result==false)  echo "<script type='text/javascript'> alert('邯郸理图馆藏信息更新失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('邯郸理图馆藏信息更新成功！'); </script>";
	             //update_branch
	            }
       }
       
       if ($_POST["hwnum"]>0)
       {
           $num=$_POST['hwnum'];
           //get_num;
           $tag = 'HW';
           $selectSQL ='select *
	                    from Branch  
	                    where branchid="HW";';
           $result = mysql_query($selectSQL,$mysql); 
	       if ($result==false)  echo "<script type='text/javascript'> alert('查询失败！3'); </script>";
	       else {  
	              $info = mysql_fetch_array($result);
	              $floor = $info['floor'];
	              $part = $info['part'];
	              $barcode = $info['barcode'];
	              $barnum = $info['barnum'];
	              $sum = $info['sum'];	   
	              $sum = $sum + $num;            
	              if ($barnum+$num > 120)
	              {
	                  $barnum = $num;
	                  $barcode = $barcode+1;
	                  if ($barcode > 100)
	                  {
	                      $barcode = 1;
	                      $part = $part+1;
	                      if ($part > 10) 
	                      {
	                          $part = 1;
	                          $floor = $floor+1;
	                      }
	                  }
	              } else $barnum = $barnum + $num;
	             
	             $ff = strval($floor);
	             $pp = strval($part);
	             $bb = strval($barcode);
	             $cc = 'HW-'.$ff.'-';
	             $cc .= $pp.'-';
	             $cc .= $bb.'-';
	             $cc .= $barnum;
	             //echo "<script type='text/javascript'> alert('$cc'); </script>";
	             
	             //get_callnumber:HL-i-j-k-num; BranchHL-Floori-Partj-Bark-num;
	             
	             $num1=$num;	   
	             while ($num1 > 0)
	             {
	                 $num1= $num1 - 1;
	                 $bookid = $bookid + 0.01;
	                 //echo "<script type='text/javascript'> alert($bookid); </script>";
	                 //echo "<script type='text/javascript'> alert($callnumber); </script>";
	                 //$callnumber = "111";
	                 $insertq = 'insert into Book (bookid,isbn,bookname,author,press,branch,callnumber,state,times,bookimg) 
values("'.$bookid.'","'.$isbn.'","'.$bookname.'","'.$author.'","'.$press.'","邯郸校区文科图书馆","'.$cc.'","'.$state.'","0","'.$img.'");';
                     $result = mysql_query($insertq,$mysql);
                     
	             }
	             //insert_book;
	             if($result==false)  echo "<script type='text/javascript'> alert('邯郸文图入库失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('邯郸文图入库成功！'); </script>";
	             $selectSQL ='update Branch
	                          set floor="'.$floor.'", part="'.$part.'", barcode="'.$barcode.'", barnum="'.$barnum.'", sum="'.$sum.'"     
	                          where branchid="HW";';
	             $result = mysql_query($selectSQL,$mysql); 
	             if($result==false)  echo "<script type='text/javascript'> alert('邯郸文图馆藏信息更新失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('邯郸文图馆藏信息更新成功！'); </script>";
	             //update_branch
	            }
       }
       
       if ($_POST["zjnum"]>0)
       {
           $num=$_POST['zjnum'];
           //get_num;
           $tag = 'ZJ';
           $selectSQL ='select *
	                    from Branch  
	                    where branchid="ZJ";';
           $result = mysql_query($selectSQL,$mysql); 
	       if ($result==false)  echo "<script type='text/javascript'> alert('查询失败！3'); </script>";
	       else {  
	              $info = mysql_fetch_array($result);
	              $floor = $info['floor'];
	              $part = $info['part'];
	              $barcode = $info['barcode'];
	              $barnum = $info['barnum'];
	              $sum = $info['sum'];	     
	              $sum = $sum + $num;          
	              if ($barnum+$num > 120)
	              {
	                  $barnum = $num;
	                  $barcode = $barcode+1;
	                  if ($barcode > 100)
	                  {
	                      $barcode = 1;
	                      $part = $part+1;
	                      if ($part > 10) 
	                      {
	                          $part = 1;
	                          $floor = $floor+1;
	                      }
	                  }
	              } else $barnum = $barnum + $num;
	             
	             $ff = strval($floor);
	             $pp = strval($part);
	             $bb = strval($barcode);
	             $cc = 'ZJ-'.$ff.'-';
	             $cc .= $pp.'-';
	             $cc .= $bb.'-';
	             $cc .= $barnum;
	             //echo "<script type='text/javascript'> alert('$cc'); </script>";
	             
	             //get_callnumber:HL-i-j-k; BranchHL-Floori-Partj-Bark;
	             
	             $num1=$num;	   
	             while ($num1 > 0)
	             {
	                 $num1= $num1 - 1;
	                 $bookid = $bookid + 0.01;
	                 //echo "<script type='text/javascript'> alert($bookid); </script>";
	                 //echo "<script type='text/javascript'> alert($callnumber); </script>";
	                 //$callnumber = "111";
	                 $insertq = 'insert into Book (bookid,isbn,bookname,author,press,branch,callnumber,state,times,bookimg) 
values("'.$bookid.'","'.$isbn.'","'.$bookname.'","'.$author.'","'.$press.'","张江校区分馆","'.$cc.'","'.$state.'","0","'.$img.'");';
                     $result = mysql_query($insertq,$mysql);
                     
	             }
	             //insert_book;
	             if($result==false)  echo "<script type='text/javascript'> alert('张江分馆入库失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('张江分馆入库成功！'); </script>";
	             $selectSQL ='update Branch
	                          set floor="'.$floor.'", part="'.$part.'", barcode="'.$barcode.'", barnum="'.$barnum.'", sum="'.$sum.'"     
	                          where branchid="ZJ";';
	             $result = mysql_query($selectSQL,$mysql); 
	             if($result==false)  echo "<script type='text/javascript'> alert('张江分馆馆藏信息更新失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('张江分馆馆藏信息更新成功！'); </script>";
	             //update_branch
	            }
       }
       
       if ($_POST["flnum"]>0)
       {
           $num=$_POST['flnum'];
           //get_num;
           $tag = 'FL';
           $selectSQL ='select *
	                    from Branch  
	                    where branchid="FL";';
           $result = mysql_query($selectSQL,$mysql); 
	       if ($result==false)  echo "<script type='text/javascript'> alert('查询失败！3'); </script>";
	       else {  
	              $info = mysql_fetch_array($result);
	              $floor = $info['floor'];
	              $part = $info['part'];
	              $barcode = $info['barcode'];
	              $barnum = $info['barnum'];
	              $sum = $info['sum'];	      
	              $sum = $sum + $num;         
	              if ($barnum+$num > 120)
	              {
	                  $barnum = $num;
	                  $barcode = $barcode+1;
	                  if ($barcode > 100)
	                  {
	                      $barcode = 1;
	                      $part = $part+1;
	                      if ($part > 10) 
	                      {
	                          $part = 1;
	                          $floor = $floor+1;
	                      }
	                  }
	              } else $barnum = $barnum + $num;
	             
	             $ff = strval($floor);
	             $pp = strval($part);
	             $bb = strval($barcode);
	             $cc = 'FL-'.$ff.'-';
	             $cc .= $pp.'-';
	             $cc .= $bb.'-';
	             $cc .= $barnum;
	             //echo "<script type='text/javascript'> alert('$cc'); </script>";
	             
	             //get_callnumber:HL-i-j-k; BranchHL-Floori-Partj-Bark;
	             
	             $num1=$num;	   
	             while ($num1 > 0)
	             {
	                 $num1= $num1 - 1;
	                 $bookid = $bookid + 0.01;
	                 //echo "<script type='text/javascript'> alert($bookid); </script>";
	                 //echo "<script type='text/javascript'> alert($callnumber); </script>";
	                 //$callnumber = "111";
                     $insertq = 'insert into Book (bookid,isbn,bookname,author,press,branch,callnumber,state,times,bookimg) 
values("'.$bookid.'","'.$isbn.'","'.$bookname.'","'.$author.'","'.$press.'","枫林校区分馆","'.$cc.'","'.$state.'","0","'.$img.'");';
                     $result = mysql_query($insertq,$mysql);
                     
	             }
	             //insert_book;
	             if($result==false)  echo "<script type='text/javascript'> alert('枫林分馆入库失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('枫林分馆入库成功！'); </script>";
	             $selectSQL ='update Branch
	                          set floor="'.$floor.'", part="'.$part.'", barcode="'.$barcode.'", barnum="'.$barnum.'", sum="'.$sum.'"     
	                          where branchid="FL";';
	             $result = mysql_query($selectSQL,$mysql); 
	             if($result==false)  echo "<script type='text/javascript'> alert('枫林分馆馆藏信息更新失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('枫林分馆馆藏信息更新成功！'); </script>";
	             //update_branch
	            }
       }     


       if ($_POST["jwnum"]>0)
       {
           $num=$_POST['jwnum'];
           //get_num;
           $tag = 'JW';
           $selectSQL ='select *
	                    from Branch  
	                    where branchid="JW";';
           $result = mysql_query($selectSQL,$mysql); 
	       if ($result==false)  echo "<script type='text/javascript'> alert('查询失败！3'); </script>";
	       else {  
	              $info = mysql_fetch_array($result);
	              $floor = $info['floor'];
	              $part = $info['part'];
	              $barcode = $info['barcode'];
	              $barnum = $info['barnum'];
	              $sum = $info['sum'];	 
	              $sum = $sum + $num;             
	              if ($barnum+$num > 120)
	              {
	                  $barnum = $num;
	                  $barcode = $barcode+1;
	                  if ($barcode > 100)
	                  {
	                      $barcode = 1;
	                      $part = $part+1;
	                      if ($part > 10) 
	                      {
	                          $part = 1;
	                          $floor = $floor+1;
	                      }
	                  }
	              } else $barnum = $barnum + $num;
	             
	             $ff = strval($floor);
	             $pp = strval($part);
	             $bb = strval($barcode);
	             $cc = 'JW-'.$ff.'-';
	             $cc .= $pp.'-';
	             $cc .= $bb.'-';
	             $cc .= $barnum;
	             //echo "<script type='text/javascript'> alert('$cc'); </script>";
	             
	             //get_callnumber:HL-i-j-k; BranchHL-Floori-Partj-Bark;
	             
	             $num1=$num;	   
	             while ($num1 > 0)
	             {
	                 $num1= $num1 - 1;
	                 $bookid = $bookid + 0.01;
	                 //echo "<script type='text/javascript'> alert($bookid); </script>";
	                 //echo "<script type='text/javascript'> alert($callnumber); </script>";
	                 //$callnumber = "111";
	                 $insertq = 'insert into Book (bookid,isbn,bookname,author,press,branch,callnumber,state,times,bookimg) 
values("'.$bookid.'","'.$isbn.'","'.$bookname.'","'.$author.'","'.$press.'","江湾校区分馆","'.$cc.'","'.$state.'","0","'.$img.'");';
                     $result = mysql_query($insertq,$mysql);
                     
	             }
	             //insert_book;
	             if($result==false)  echo "<script type='text/javascript'> alert('江湾分馆入库失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('江湾分馆入库成功！'); </script>";
	             $selectSQL ='update Branch
	                          set floor="'.$floor.'", part="'.$part.'", barcode="'.$barcode.'", barnum="'.$barnum.'", sum="'.$sum.'"     
	                          where branchid="JW";';
	             $result = mysql_query($selectSQL,$mysql); 
	             if($result==false)  echo "<script type='text/javascript'> alert('江湾分馆馆藏信息更新失败！'); </script>";
	             else echo "<script type='text/javascript'> alert('江湾分馆馆藏信息更新成功！'); </script>";
	             //update_branch
	            }
       }    
                    
	}
?>


<script type="text/javascript">
	function check(form)
	{
		//var u_id = parseInt(form.username.value); 
		if(form.bookname.value == "")
		{
			alert("请录入图书名称！"); 
			form.bookname.focus(); return false;
		}
		
		if(form.author.value == "")
		{
			alert("请录入作者!"); 
			form.author.focus(); return false;
		}
		
		if(form.press.value == "")
		{
			alert("请录入出版社!");
			form.press.focus(); return false;
		}
		
		if(form.isbn.value == "")
		{
			alert("请录入ISBN!");
			form.isbn.focus(); return false;
		}
		
		if(form.img.value == "")
		{
			alert("请录入图片链接!");
			form.img.focus(); return false;
		}
		
		if(form.hlnum.value == "" && form.hwnum.value == "" && form.zjnum.value == "" && form.flnum.value == "" && form.jwnum.value == "")
		{
			alert("请至少添加在一个分馆内!");
			return false;
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
            <li><a href="asearchb.php">图书管理</a></li>
            <li>图书入库</a></li>
        </ol>
    </div>
    <div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">图书管理</h3>
            </div>
            <div class="panel-body" >
                <div class="col-sm-8 col-sm-offset-2 ">
                    <form class="form-horizontal" name="form1" id="form1" method="POST" action="<?php echo $formAction; ?>">
                        <h2 style="text-align: center">录入图书信息</h2>
                        <br/>
                        <div class="form-group">
                            <label for="inputbookname" class="col-sm-2 control-label">书名</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputbookname" placeholder="录入图书名称" name="bookname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputauthor" class="col-sm-2 control-label">作者</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputauthor" placeholder="录入作者" name="author">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputpress" class="col-sm-2 control-label">出版社</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputpress" placeholder="录入出版社" name="press">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputisbn" class="col-sm-2 control-label">ISBN</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputisbn" placeholder="录入ISBN" name="isbn">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputimg" class="col-sm-2 control-label">图片链接</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputimg" placeholder="录入图片链接" name="img">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">入库数量</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control col-sm-2" id="inputhl" placeholder="邯郸理图" name="hlnum">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control col-sm-2" id="inputhw" placeholder="邯郸文图" name="hwnum">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control col-sm-2" id="inputzj" placeholder="张江" name="zjnum">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control col-sm-2" id="inputjw" placeholder="枫林" name="flnum">
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control col-sm-2" id="inputfl" placeholder="江湾" name="jwnum">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputstate" class="col-sm-2 control-label" >状态</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="inputstate" name="state">
                                    <option>可借阅</option>
                                    <option>已借出</option>
                                    <option>丢失</option>
                                    <option>购买中</option>
                                    <option>非借阅</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" id="addbook" onclick="check(form1)">图书入库</button>
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

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
	if (isset($_POST["MyForm"]) && ($_POST["MyForm"] == "form1"))
	{
	   $id = trim($_POST['userid']);
	   $password = trim($_POST['password1']);
	   $name = trim($_POST['username']);
	   $dept = trim($_POST['dept']);
	   $email = trim($_POST['uemail']);
	   $type = trim($_POST['type']);
	   $selectSQL ='select userid 
	                from User 
	                where userid="' . $id . '";';
	   $result = mysql_query($selectSQL,$mysql); 
	   if($result==false)  echo "<script type='text/javascript'> alert('查询失败！'); </script>";
	   else {
            $info = mysql_fetch_array($result);
            if($info!=false) {
                             echo "<script>
                                   type='text/javascript'> alert('该学号/工号已注册，请直接登录！'); 
                                   location.href='ulogin.php'; </script>";
        					 //header('Location:login.php');
					  		 return; 
					  		 }
		    else {
		           $insertq = 'insert into User (userid,username,upassword,type,umail,dept,brwnum,logged,times)
				               values("'.$id.'","'.$name.'","'.$password.'","'.$type.'","'.$email.'","'.$dept.'",0,0,0);';
				   $result = mysql_query($insertq,$mysql);	
				   if($result) {
				        	    echo "<script>
				        	          type='text/javascript'> alert('注册成功！'); 
				        	          location.href='ulogin.php'; </script>";   
				        	    //header('Location:ulogin.php');
				        	    } else echo "<script type='text/javascript'> alert('注册失败！'); </script>";
	              } 
		      }	   
	 }
?>


<script type="text/javascript">
	function check(form)
	{
		//var u_id = parseInt(form.username.value); 
		if(form.userid.value == "")
		{
			alert("ID不能为空！"); 
			form.userid.focus(); return false;
		}
		
		if(form.username.value == "")
		{
			alert("姓名不能为空！"); 
			form.username.focus(); return false;
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
		
		if(form.uemail.value == "")
		{
			alert("邮箱不能为空！");
			form.uemail.focus(); return false;
		}
		form.submit();
	}
</script>


<body>
    <div class="container">
        <div >
           <div class="page-header">
          <img src="head1.jpg">
        </div>
        </div>
        <div>
            <ol class="breadcrumb">
                <li><a href="newindex.php">主页</a>/注册页</a></li>
            </ol>
        </div>
    </div>
    <div class="col-sm-8 col-sm-offset-2">
        <form class="form-horizontal" id="form1" name="form1" method="post" action="<?php echo $formAction; ?>">
            <div class="form-group" >
                <label for="inputid" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputid" placeholder="ID" name="userid">
                </div>
            </div>
               <div class="form-group">
                <label for="inputname" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-8">
                    <input type="name" class="form-control" id="inputid" placeholder="Name" name="username">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="password1">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword0" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password2">
                </div>
            </div>
               <div class="form-group">
                <label for="inputchar" class="col-sm-2 control-label">院系</label>
                <div class="col-sm-8">
                     <select class="form-control" id="inputdept" name="dept">
                        <option>中国语言文学系</option>
                        <option>新闻学院</option>
                        <option>哲学学院</option>
                        <option>文物与博物馆学系</option>
                        <option>外国语言文学学院</option>
                        <option>法学院</option>
                        <option>历史学系</option>
                        <option>国际关系与公共事务学院</option>
                        <option>旅游学系</option>
                        <option>经济学院</option>
                        <option>管理学院</option>
                        <option>社会发展与公共政策学院</option>
                        <option>数学科学学院</option>
                        <option>国家保密学院</option>
                        <option>计算机科学技术学院</option>
                        <option>物理学系</option>
                        <option>化学系</option>
                        <option>高分子科学系</option>
                        <option>环境科学与工程系</option>
                        <option>信息科学与工程学院</option>
                        <option>软件学院</option>
                        <option>材料科学系</option>
                        <option>力学与工程科学系</option>
                        <option>生命科学学院</option>
                        <option>基础医学院</option>
                        <option>公共卫生学院</option>
                        <option>药学院</option>
                        <option>护理学院</option>
                        <option>国际文化交流学院</option>
                        <option>上海医学院</option>
                        <option>研究生院</option>
                        <option>其他</option>
                    </select>                  
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="uemail">
                </div>
            </div>
            <div class="form-group">
                <label for="inputchara" class="col-sm-2 control-label">注册类别</label>
                <div class="col-sm-8">
                    <select class="form-control" id="inputchara" name="type">
                        <option>本科生</option>
                        <option>研究生</option>
                        <option>博士生</option>
                        <option>教师</option>
                        <option>外来人员</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="button" onclick="return check(form1)">提交</button>
                </div>                                
            </div>
               <div class="form-group">
                    <input type="hidden" id="MyForm" name="MyForm" value="form1" >
                </div>
        </form>
        <hr>
     <footer>
     <p style="text-align: center">&copy Design By: 13307130318 13307130501</p>
     </footer>
    </div>
     
</body>
</html>

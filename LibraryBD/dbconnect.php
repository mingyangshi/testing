
<?php
	/* PHP used to connect to database on each page of the site */
	
	//login
	$mysql = mysql_connect('127.0.0.1:3306','root','111');
	
	if(!isset($mysql)) echo "Failed to connect to MySQL: " . mysqli_connect_error();
	
	$tag=mysql_select_db('LibraryDB',$mysql);
	if (!$tag) echo "Failed"; 
	mysql_set_charset('utf8');
?>
	


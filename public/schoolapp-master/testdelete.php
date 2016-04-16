<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body bgcolor="#33CCFF" >

<a href="indexxx.php"><h1><h1>HOME</h1></a> &nbsp;&nbsp;&nbsp;

<a href="testupdate.php"><h1>UPDATE STUDENT</h1></a> &nbsp;&nbsp;&nbsp;

<?php
$HostName="localhost";
$db_name="schooldb";
$LoginName="root";
$LoginPassword="";

   
?>
 <?php
	$con = mysql_connect($HostName,$LoginName,$LoginPassword);
	if (!$con){die('Could not connect: ' . mysql_error());}
  	mysql_select_db($db_name , $con);
		mysql_query("set names 'utf8';");
	$sql = "SELECT * FROM student" ;
	
	$result = mysql_query($sql,$con) ;
	?>

  <?php
	while($row = mysql_fetch_array($result)){
	?>
<form name="myform" method="POST">
<input type="hidden" name="s_id" value="<?php echo "$row[st_id]"?>" />
 name: <input type="text" name="s_name" value="<?php echo "$row[st_name]"?>" />
age<input type="text" name="s_age" value=" <?php echo "$row[st_age]"?>">
class:<input type="text" name="s_class" value=" <?php echo "$row[st_class]"?>">
  <input type="submit" value="delete" /><hr />
</form>
  <?php
	;}
	 mysql_close($con);
	?>

<?php
$HostName="localhost";
$db_name="schooldb";
$LoginName="root";
$LoginPassword="";   
?>
<?php

	$con = mysql_connect($HostName,$LoginName,$LoginPassword);
	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}
  
  	mysql_select_db($db_name , $con);
	
	
	if ( isset($_POST['s_id'])) {
	$sql = "DELETE FROM student WHERE  st_id= '$_POST[s_id]'" ;}
	
	mysql_query($sql,$con) ;
	
  mysql_close($con);
  
?>
<hr  style="color:'#03F'; size='20px'"/>
   
   
   <div class="footer">

 <h5><center>&copy;school 2016</center></h5>



</div>

</body>
</html>
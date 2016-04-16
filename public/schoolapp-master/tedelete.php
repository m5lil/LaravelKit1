

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body  bgcolor="#33CCFF"  >

<a href="indexxx.php"><h1>HOME</h1></a> &nbsp;&nbsp;&nbsp;
<a href="teupdate.php"><h1>UPDATE TEACHER</h1></a> &nbsp;&nbsp;&nbsp;
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
	$sql = "SELECT * FROM teacher" ;
	
	$result = mysql_query($sql,$con) ;
	?>

  <?php
	while($row = mysql_fetch_array($result)){
	?>
<form name="myform" method="POST">
<input type="hidden" name="t_id" value="<?php echo "$row[te_id]"?>" />
 Name: <input type="text" name="t_name" value="<?php echo "$row[te_name]"?>" />
subject<input type="text" name="t_subject" value=" <?php echo "$row[te_subject]"?>">
class:<input type="text" name="t_class" value=" <?php echo "$row[te_class]"?>">
  <input type="submit" value="حذف" /><hr />
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
	
	$te_id= $_POST['t_id'] ;
	if ( isset($_POST['t_id'])) {
	$sql = "DELETE FROM teacher WHERE te_id ='$te_id'" ;}
	
	mysql_query($sql,$con) ;
	
  mysql_close($con);
  
?>
<hr  style="color:'#03F'; size='20px'"/>
   
   
   <div class="footer">

 <h5><center>&copy;school 2016</center></h5>



</div>
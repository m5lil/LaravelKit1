<html>
<head>

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
</head>

<style>
body
{
	background-color:#3CF;
}

</style>
<body bgcolor="#33CCFF" >
<a href="indexxX.php"><h1>HOME</h1></a> &nbsp;&nbsp;&nbsp;


 <div class="container marketing">
<div class="row">
 <div class="col-lg-4">
 
 </div>
 
 
 <div class="col-lg-4">
       <img class="img-circle" src="images.jpg"alt="Generic placeholder image" width="300" height="300" id="img1"><br/><br/>
<form  method="POST" >


name:&nbsp;
  
  <input type="text" name="t_name"/><br/><br/>
  
   subject:
  
  <input type="text" name="t_subject"/><br/><br/>
  
  
  
 class:&nbsp;&nbsp;
  
  <input type="text" name="t_class"/><br/><br/>
  <input type="submit" value="insert" name="insert" style="text-align:center;"/><br/>
    
</form>

</div>
</div>
<div class="col-sm-4" >
</div>
<hr  style="color:'#03F'; size='20px'"/>
   
   
   <div class="footer">

 <h5><center>&copy;school 2016</center></h5>



</div>
</div>


<?php 
$HostName="localhost";
$db_name="schooldb";
$LoginName="root";
$LoginPassword="";


$con = mysql_connect($HostName,$LoginName,$LoginPassword);
mysql_query("set names 'utf8'");
if (!$con){die('Could not connect: ' . mysql_error());}
mysql_select_db($db_name , $con);
if (isset($_POST['t_name']) && isset($_POST['t_subject'])&& isset($_POST['t_class'])) {
$sql = "INSERT INTO teacher (te_name,te_subject,te_class) VALUES ('$_POST[t_name]','$_POST[t_subject]','$_POST[t_class]')" ;
} else {
$sql = '';
}

mysql_query($sql,$con) ;

mysql_close($con);

?>

</body>

</html>


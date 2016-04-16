<html>
<head>
<title>student insert</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
</head>
<style>
body
{
	background-color:#3CF;
}



</style>

 <body >
 <a href="indexxX.php"><h1>HOME</h1></a> &nbsp;&nbsp;&nbsp;
 
 <div class="container marketing">
<div class="row">
 <div class="col-lg-4">
 
 </div>
 
 <div class="col-lg-4">
       <img class="img-circle" src="pi.jpg"alt="Generic placeholder image" width="300" height="300" id="img1"><br/><br/>
       
      
<form  method="post" >


name:
  
  <input type="text" name="s_name"/><br/><br/>
  
   age:&nbsp;&nbsp;&nbsp;
  
  <input type="text" name="s_age"/><br/><br/>
  
  
  class:&nbsp;&nbsp;
  
  <input type="text" name="s_class"/><br/><br/>
   <input type="submit"  name="submit"value="insert" class="btn btn-default"/><br/>
    
</form>

</div>
<div class="col-lg-4">
</div>
</div>
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
if ( isset($_POST['s_name']) && isset($_POST['s_age'])&& isset($_POST['s_class'])) {
$sql = "INSERT INTO student (st_name,st_age,st_class) VALUES ('$_POST[s_name]','$_POST[s_age]','$_POST[s_class]')" ;
} else {
$sql = '';
}

mysql_query($sql,$con) ;

mysql_close($con);

?>

</body>
</head>
</html>

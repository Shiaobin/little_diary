<?php
include_once 'dbconfig.php';

if($_POST['del_time'])
{
	$time = $_POST['del_time'];
	$stmt=$db_con->prepare("DELETE FROM posts WHERE time=:time");
	$stmt->execute(array(':time'=>$time));	
}
?>

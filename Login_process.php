<?php
session_start();
require_once 'dbconfig.php';

if(isset($_POST['btn-login']))
{
$username=($_POST['username']);
$password=($_POST['password']);

try
{
	$stmt=$db_con->prepare("SELECT * FROM registration_page WHERE username=:uname");
	$stmt->execute(array(":uname"=>$username));
	$count=$stmt->rowCount();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($row['password']==$password)
	{
	echo "ok";
	$_SESSION['user_session']=$row['id'];
	}
	else
	{
		echo "username or password does not exist.";
		
	}
	
	}
	catch(PDOException $e){
	echo $e->getMessage();
	}
	}
	?>
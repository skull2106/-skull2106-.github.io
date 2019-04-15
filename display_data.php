<?php
session_start();

if(!isset($_SESSION['user_session']))
{
 header("Location: Login.htm");
}

include_once 'dbconfig.php';

$rows= array();
$stmt = $db_con->prepare("SELECT * FROM registration_page WHERE id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
$filename="data.json";
$data = file_get_contents($filename);
$array=json_decode($data,true);
foreach($array as $value)
{
	if($value['username']==$row['username'])
	{
		echo json_encode($value);
	}
}
//$data = array($row['username'], $row['name'],$row['emailid'],$row['gender'],$row['dob']);
//echo "Data taken and shown in json format-";
//echo "<br>";
//echo json_encode($data);
//echo "<br>";
?>

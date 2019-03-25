<?php

 require_once 'dbconfig.php';

 if($_POST)
 {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $dob =$_POST['bday'];
  $gender=$_POST['gender'];
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM registration_page WHERE emailid=:email");
   $stmt->execute(array(":email"=>$email));
   $count = $stmt->rowCount();

   $stmt = $db_con->prepare("SELECT * FROM registration_page WHERE username=:uname");
   $stmt->execute(array(":uname"=>$username));
   $countu = $stmt->rowCount();
      

   if($count==0 &&$countu==0){
    
   $stmt = $db_con->prepare("INSERT INTO registration_page(username,emailid,password,name,gender,dob) VALUES(:uname, :email, :pass,:name,:gender, :dob)");
   $stmt->bindParam(":uname",$username);
   $stmt->bindParam(":email",$email);
   $stmt->bindParam(":pass",$password);
      $stmt->bindParam(":name",$name);
	     $stmt->bindParam(":gender",$gender);
		    $stmt->bindParam(":dob",$dob);
     
    if($stmt->execute())
    {
     echo "registered";
    }
    else
    {
     echo "Query could not execute !";
    }
   
   }
   else{
    
    echo "1"; //  not available
   }
    
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }

?>

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
  
		//var person = { name: '#name', Gender : '#gender', DOB : '#bday', Email:'#email',Degree:'#degree'};
		//var myJSON = JSON.stringify(person);
		//window.localStorage.setItem("#username", myJSON);
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM registration_page WHERE emailid=:email");
   $stmt->execute(array(":email"=>$email));
   $count = $stmt->rowCount();

   $stmt = $db_con->prepare("SELECT * FROM registration_page WHERE username=:uname");
   $stmt->execute(array(":uname"=>$username));
   $countu = $stmt->rowCount();
   
      if(file_exists('data.json'))  
           {  
                $current_data = file_get_contents('data.json');  
                $array_data = json_decode($current_data, true);  
                $extra = array(  
					 'username' 	=> $_POST['username'],
                     'name'               =>     $_POST['name'],  
                     'gender'          =>     $_POST['gender'],  
                     'DOB'     =>     $_POST['bday'],
					 'Email'  	=> $_POST['email'],
					 'Degree'	=> $_POST['degree']
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('data.json', $final_data))  
                {  
                     //$message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
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
           else  
           {  
                echo 1; 
           }  

   
    
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }

?>

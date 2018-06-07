<?php

   session_start();


   $username="";
   $email="";
   $errors=array();
    $password="";

   $db=mysqli_connect('localhost', 'root' , '' , 'registration' );


if(isset($_POST['register']))
{
    $username = ($_POST['username']);

    $email = ($_POST['email']);

    $password_1 = ($_POST['password_1']);

    $password_2 = ($_POST['password_2']);

    
    if(empty($username))
    {
     array_push($errors,"User Name Is Required");
        
        
    }
        
        
        
        
        if(empty($email))
    {
     array_push($errors,"Email Is Required");
      
    }
        
        
        
        if(empty($password_1))
    {
     array_push($errors,"Password Is Required");
           
 }

    
    if($password_1 !=$password_2)
    {
        
        array_push($errors,"Both Password Not Matching");
       
    }

    if(count($errors) == 0)
    {
        
        $password = md5($password_1); 
    
       $sql = "INSERT INTO users(username,email,password) VALUES  ('$username','$email','$password') "; 
        
        

    mysqli_query($db, $sql);
        
        $_SESSION['username'] = $username;
        $_SESSION['sucess'] = "You Are Logged In.";
        header('location: index.php');
        
    
        }
    
}



    
 if(isset($_POST['login']))
 {
    
    $username =($_POST['username']);
    $password = ($_POST['password']);

    
    if(empty($username))
    {
     array_push($errors,"User Name Is Required");

    }
        
        
        
        
        if(empty($password))
    {
     array_push($errors,"Password Is Required");
    }
    
     if (count($errors) == 0 )
        if (count($error) == 0 )
     {

     $password = md5($password);
     $query ="SELECT * FROM users WHERE username='$username' AND password='$password'" ;
         $result= mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1)
    {
     $_SESSION['username'] = $username;
        $_SESSION['sucess'] = "You Are Logged In.";
        header('location: index.php');
    }
         else
         {
             array_push($errors,"The Username or Password is Wrong");
            
         }
    
     }
     
     
 }




    
 if(isset($_GET['logout']))
 {
     session_destroy();
     unset($_SESSION['username']);
     header('location: login.php');
 }




?>
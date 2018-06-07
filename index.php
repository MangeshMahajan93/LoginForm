<?php
include('server.php');
if(empty($_SESSION['username']))
{
  header('location: login.php');  
}


?>
<!DOCTYPE html>

<html>
        <head>
            <title> User Registration Using PHP And MY Sql</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
    
    
    
            <body>

                
                <div class="header">
                    <h2>Home Page</h2>
                </div>
                
                
                <div class="content">
                
                    <?php   if (isset($_SESSION['sucess'])):     ?>
                    <div class="error sucess">
                        <h3>
                        
                    <?php  
                            
                            echo $_SESSION['sucess'];
                            unset($_SESSION['sucess']);
                            
                    ?>        
                            
                        </h3>
                   </div>
             <?php endif  ?>
                    
                    
                    <?php if(isset($_SESSION["username"])):       ?>
                    <p>Welcome<strong>
                        <?php
                        echo $_SESSION['username']; ?>  </strong>   </p>
                    
                    
                    <p> <a href="index.php?logout='1'" style="color: red;">Logout</a></p>
                    
                    <?php endif        ?>
                    
                    
                    
                    
                </div>
                
                
               
            </body>

</html>
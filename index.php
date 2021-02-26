<?php  
    include_once('dbConnect.php');  
       session_start(); 

    $funObj = new dbConnect();  // object creation of dbConnect class
    if(@$_POST['login']){  // authentication if login button clicked
        $surname = $_POST['surname'];  
        $password = $_POST['password'];  
        $emp_data = $funObj->Login($surname, $password);  //function call Login 
        if ($emp_data) {  
           header("location:home.php");  
        } else {  
            echo "<script>alert('Surname / Password Not Match')</script>";  
        }  
    }  

?>  
<!DOCTYPE html>  
 <html lang="en" class="no-js">  
 <head>  
        <meta charset="UTF-8" />  
        <title>Login </title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>  
    <body>  

        <!-- Login Form !-->

        <div class="container">  
            <header>  
                <h1>Login </h1>  
            </header>  
            <section>               
                <div id="container_demo" >  
                     
                   
                    <div id="wrapper">  
                        <div id="login" class="animate form">  
                           <form name="login" method="post" action="">  
                             
                                <p>   <br><br>
                                    <label for="surname"  >  Surname</label>  
                                    <input id="surname" name="surname" required="required" type="text" placeholder="john"/>   
                                </p>  

                                <p>   
                                    <label for="password" class="form"> Password </label>  
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />   
                                </p>  
                             
                                <p>   
                                    <input type="submit" name="login" value="Login" />   
                                </p>  
                              
                            </form>  
                        </div>     
                        </div>     
                    </div>  
                </section>
                </div>    
           
    </body>  
</html>  
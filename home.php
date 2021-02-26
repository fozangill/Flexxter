<?php   
    include_once('dbConnect.php');  
    include('employee.php');
  
    session_start();
     $funObj = new dbConnect();
     
    if(@$_POST['logout']){  

      $funObj->logout($surname, $password); 
    }

    // Redirect to index if not loogedin
    if(empty($_SESSION['surname'])){
        header("Location:index.php");
    }

    //Updating status / Processing of Checkout of machine
    if(@$_POST['checkout']){
        $status = @$_POST['st_update'];
        $emp_id = @$_REQUEST['emp_id'];
        $machine_id = @$_REQUEST['machine_id'];
        $title = @$_REQUEST['title'];
        $conn = $_SESSION['connn'];
        $sql = "UPDATE machines SET emp_id=$emp_id, title = '$title', status = '$status' WHERE id=$machine_id";
        // print_r($sql);exit();
            @mysqli_query($conn, $sql);

              header("Location:home.php");

    }



?>  
<!DOCTYPE html>  
 <html lang="en" class="no-js">  
 <head>  
        <meta charset="UTF-8" />  
        <title>Home</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        
    </head>  
    <body> 
    <!-- Home Page showing all info after LoggedIn !--> 
        <div class="container">  
           
            <section>               
                <div id="container_demo" >  
                     
                   
                    <div id="wrapper">  
                        <div id="login" class="animate form">  
                           <form name="login" method="post" action="">  
                                <b>Welcome <?php echo $_SESSION['surname']; ?> <br><br></b>   
                                    <h3>Machines</h3>
                                <?php 
                                    $mach = new Machine();
                                   echo $mach->retreive_machines(); //function call 

                                 ?>
                                   
                                <p class="login button">   
                                    <input type="submit" name="logout" value="Logout" />   
                                </p>  
                                   
                            </form>  
                        </div>  
                    </div>  
                </div>    
            </section>  
        </div>  
    </body>  
</html>  

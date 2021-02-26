<?php  
    // DB Connection
    class dbConnect {  
        public $conn;
        function __construct() {  
           
            $this->conn = @mysqli_connect("localhost", "root", "", "flexxter");  
            $_SESSION['connn'] = $this->conn;
            if(!$this->conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }   
           
            return $this->conn;  
        }  
        public function Close(){  
            mysql_close();  
        }


        //Login function to authenticate
        public function Login($surname, $password){ 
            $sql = "SELECT * FROM employees WHERE surname = '$surname' AND password = '$password'";
            $res = @mysqli_query($this->conn,$sql); 
            $emp_data = @mysqli_fetch_array($res); 
             $no_rows = @mysqli_num_rows($res);  
                 if ($no_rows == 1)   
            {  
                
                $_SESSION['login'] = true;  
                $_SESSION['emp_id'] = $emp_data['id'];  
                $_SESSION['surname'] = $surname;  
    
                return TRUE;  
            }  
            else  
            {  
                return FALSE;  
            }  
                }

            // logout function to logout
        public function logout(){
            
                session_start();
                unset($_SESSION["emp_id"]);
                unset($_SESSION["surname"]);
                header("Location:index.php");


        }   
        
}
?>  
<!-- Bootstrap 3 URLS !-->
<header>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</header>

<?php

include_once('dbConnect.php');  

class Employee
 {

  /** 
  * Employee's unique id 
  * @var int $id 
  */

   public $id;

    /**
     * Employee's surname 
     * @var string $surname
     */

     public $surname;
     
     /** 
     * Hashed als salted password 
     * @var string $password 
     */ public $password; 

     } 

     class Machine 
     { 

     /** * Machine's unique id 
     * @var int $id 
     */

      public $id; 

     /**
     * Machine's title 
     * @var string $title
     */

     public $title;


     public function retreive_machines(){  // Retreiving all records of machines
     	$emp_id = $_SESSION['emp_id'];
     	$sql = "SELECT * from machines WHERE status IS NULL OR status = 'returned' OR emp_id = '$emp_id'";
     	// echo $sql;
     	$conn = $_SESSION['connn'];
       	$result = @mysqli_query($conn,$sql); ?>
       	<div class="container">
       <table class= 'table table-bordered'>
       	<thead>
      <tr>
        <th>Title </th>
        <th>Status </th>
       	 </tr>
       	 </thead>
    <tbody>
      <tr>
       	 <?php 

       	 while($row = @mysqli_fetch_array($result))
       	 {
       	 	echo "<td>". $row['title']. "</td>";
       	 	if(empty($row['status']))
       	 	{
       	 		echo "<td>". 'Available'. "</td>";
       	 	}
       	 	else
       	 	{
       	 	echo "<td>".$row['status']. "</td>";
       	 	}

       	 	?>
       	 <input type="hidden" name="machine_id" class="btn btn-info btn-md" value="<?php echo $id;?>">
       	 	<td><a href="update_status.php?id=<?php echo $row['id']; ?>">Update Status</a></td>
    	<?php
       	 	echo "</tr>";
       	 } 
       		
       	 	echo "</tbody>";
  			echo "</table>";
  			echo "</div>";

       		 
       }


       }

        ?>
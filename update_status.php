<!-- Bootstrap 3 URLS !-->
<header>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</header>

<body><h3 align="center">Chechout Page</h3></body>

<?php 
	include_once('dbConnect.php');
	include('employee.php');
	session_start(); // session starting
	$m = new Machine(); // object cration of machine class
	$conn = @mysqli_connect("localhost", "root", "", "flexxter"); 
	$machine_id = @$_REQUEST['id'];
	$emp_id = $_SESSION['emp_id'];
	// Retreiving record of all of employees or available machines which are not borrowed except the loggein person.
	$sql = "SELECT * FROM machines where id = $machine_id AND (emp_id IS NULL OR emp_id = $emp_id)";
	$query = @mysqli_query($conn,$sql);
	$row = @mysqli_fetch_assoc($query);
	$_SESSION['updated_status'] = $row['status'];

?>
<!-- Status of machines showing !-->
<div class="container">
	<form method="POST" action="home.php">
	<b>Status :</b><br><select class="form-control" name="st_update">
        <option value=
        "<?php  if(empty($row['status'])) {echo 'Available';} else{echo $row['status'];} ?>">
        	<?php  if(empty($row['status'])){echo 'Available';} else{echo $row['status'];} ?></option>
        <option value="borrowed">borrowed</option>
        <option value="returned">returned</option>
      </select>

      <input type="hidden" name="emp_id" class="btn btn-info btn-md" value="<?php echo $emp_id;?>">
      <input type="hidden" name="machine_id" class="btn btn-info btn-md" value="<?php echo $machine_id;?>">
      <input type="hidden" name="title" class="btn btn-info btn-md" value="<?php echo $row['title'];?>">
      <br>
      <input type="submit" name="checkout" class="btn btn-success" value="Checkout">
    
      </form>
</div>
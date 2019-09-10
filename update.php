<?php

$pdo = new PDO("mysql:host=localhost;dbname=mobile_shop", "root", "");

$del_id = $_GET['id'];
//update section
if(isset($_POST['submit'])){

	$name=$_POST['Product_name'];
	$Price=$_POST['Price'];
	$Version=$_POST['Version'];


	$q = "UPDATE items SET Product_name='$name',Price='$Price',Version='$Version' WHERE id='$del_id'";
	$statement = $pdo->prepare($q);
	$statement->execute();
	header("location:index.php");
}


//getData
$get_data_sql = "SELECT * FROM items WHERE id='$del_id' ";
$get_statement = $pdo->prepare($get_data_sql);
$get_statement->execute();
$result = $get_statement->fetchAll();
?>


<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
			<?php
				foreach($result as $value){
			?>
			<form class="form-group" method="POST" action="">
			

				<input class="form-control" type="name" name="Product_name" value="<?php 
				echo $value['Product_name'] ?>"><br>
				<input class="form-control" type="number" name="Price" value="<?php echo $value['Price'] ?>">
				<br>
				<input class="form-control" type="text" name="Version" value="<?php echo $value['Version'] ?>"><br>
				<input class="btn btn-success" type="submit" name="submit" value="update">
			</form>
			<?php
				}
			?>

</body>
</html>
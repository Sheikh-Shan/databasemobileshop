<?php

$pdo = new PDO("mysql:host=localhost;dbname=mobile_shop", "root", "");

//if($pdo){
	//echo "connected";
//}



if(isset($_GET['delete'])){
$id=$_GET['delete'];
$Price=$_POST['Price'];

//delete begins
$del_q="DELETE FROM items WHERE id='$id'";
$del_st=$pdo->prepare($del_q);
$del_st->execute();
echo "Delete Successful";
//delete end

}



if(isset($_POST['submit'])){
$name=$_POST['Product_name'];
$Price=$_POST['Price'];
$Version=$_POST['Version'];




//insert begins
$q="INSERT INTO items (Product_name,Price,Version) VALUES ('$name','$Price','$Version')";
$statement=$pdo->prepare($q);
$statement->execute();
echo "Done!!";
//insert end

}



?>
<!DOCTYPE html>
<html>
<head>
	<title>Mobile-Shop</title>
</head>
<body>
<center><h1><u>Southern Telecom BD</u></h1></center>
	<form method="POST" action="" padding=10px>
		<input type="name" name="Product_name" placeholder="Product_name">
		<input type="number" name="Price" placeholder="Price">
		<input type="text" name="Version" placeholder="Version">
		<input type="submit" name="submit" value="save">
	</form>



<?php
$get_data_sql=" SELECT * FROM items ";
$get_statement=$pdo->prepare($get_data_sql);
$get_statement->execute();
$result= $get_statement->fetchAll();

?>

	<table border="2" style="width: 100%" bgcolor="yellow" class="text-center">
		<tr>
			
			<th>Product_name</th>
			<th>Price</th>
			<th>Version</th>
			<th>Operations</th>

		</tr>
		<?php
			foreach ($result as $value) {
				?>


				<tr>
					<td align="center"><?php echo $value['Product_name'];?></td>
					<td align="center"><?php echo $value['Price'];?></td>
					<td align="center"><?php echo $value['Version'];?></td>
					<td align="center">
						<a  href="?delete=<?php echo $value['id'];?>"><button style="width:150px;height:30px; background-color:red;color: white">Delete</button></a>	<br>
						<a href="update.php?id=<?php echo  $value['id'];?>">
							<button style="width:190px;height:35px;color:yellow;background-color: green">Update</button></a></td>
				</tr>
			
			<?php
			}
		?>
	</table>

</body>
</html>

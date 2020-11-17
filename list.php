<?php 
session_start();
if(!isset($_SESSION['username']))

{
	header('location:form.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>List of All Product </h1>
		<table align= "centre" border="1px">
			<thead>
				<t>
					<!-- <th>Sn</th> -->
					<th>Name</th>
					<th>Discription</th>
					<th>Price</th>
					<th>product image</th>
					<th colspan="3">Operation</th>
				</t>



	<?php include 'db.php';
      

      $query=$connect->prepare("SELECT * FROM prod");
      $query->execute();
      while($row = $query->fetch(PDO::FETCH_OBJ)){

	?>
      	<tr>
			<td><?php echo $row->pname ?></td>
			<td><?php echo $row->pdis ?></td>
			<td><?php echo $row->pprice ?></td>
			<td><img src="<?php echo $row->pimage ?>"></td>
			<!-- <td><a href="view.php?ID=<?php echo $row->Sn; ?>">View</a></td> -->
			<td><a href="edit.php?ID=<?php echo $row->Sn; ?>">Edit</a></td>
			<td><a href="delete.php?del=<?php echo $row->Sn; ?>">Delete</a></td>
		</tr>
	
	<?php
     }

?>
<a href="login.php">Back</a>
			
			</thead>
		</table>
</body>
</html>

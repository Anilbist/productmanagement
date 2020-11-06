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
					<th colspan="2">Operation</th>
				</t>



	<?php include 'db.php';
      
      
      	$Squery = "SELECT * FROM prod";
      	$query = mysqli_query($connect,$Squery);
      	while($disp = mysqli_fetch_array($query)){
      		$Pro_sn = $disp['Sn'];
      		$Pro_name = $disp['pname'];
      		$Pro_dis = $disp['pdis'];
      		$Pro_price = $disp['pprice'];
      		$Pro_image =$disp['pimage'];
      		
	?>
      	<tr>
      		<!-- <td><?php echo $Pro_sn ?></td> -->
			<td><?php echo $Pro_name ?></td>
			<td><?php echo $Pro_dis ?></td>
			<td><?php echo $Pro_price ?></td>
			<td><img src="<?php echo $Pro_image ?>"></td>
			<td><a href="edit.php?ID=<?php echo $Pro_sn ?> ">Edit</a></td>
			<td><a href="delete.php? del=<?php echo $Pro_sn ?>">Delete</a></td>
	</tr>
	
	<?php 
     }

?>
			
			</thead>
		</table>
</body>
</html>

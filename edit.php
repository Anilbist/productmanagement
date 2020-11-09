<?php include 'db.php';
      	
      	$Pro_sn=$_GET['ID'];
		$query =$connect->prepare("SELECT * FROM prod where Sn =?");
      	// $query = mysqli_query($connect,$Squery);
            $query->execute([$Pro_sn]);
      	
      	while ($row = $query->fetch(PDO::FETCH_OBJ)) {
      		 $Pro_sn = $row->Sn;
      		$Pro_name = $row->pname;
      		$Pro_dis = $row->pdis;
      		$Pro_price = $row->pprice;
                  $Pro_image = $row->pimage;	
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
	<form action="update.php?id=<?php echo $Pro_sn ?>" method = "post">
	<b>Product Name:</b> <input type="text" name="p_name" value="<?php echo $Pro_name ?>"><br>
	<b>Product Discription:</b> <input type="text" name="p_dis"  value="<?php echo $Pro_dis?>"><br>
	<b>Product Price:</b> <input type="text" name="p_price" value="<?php echo $Pro_price?>"><br>
      <b>Product Price:</b> <input type="file" name="p_image" value="<?php echo $Pro_image?>"><br>
	<input type="submit" name="update" value ="Update">
	</form>
</body>
</html>

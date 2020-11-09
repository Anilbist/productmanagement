 <?php include 'db.php';
      
      if (isset($_POST['add_p']))
     {	 
     	$v1=rand(1,99999);
     	$v2=md5($v1);
     	$fna = $_FILES['p_image']['name'];
     	$dest="./product_image/".$v2.$fna;
     	$dst="product_image/".$v2.$fna;
     	move_uploaded_file($_FILES['p_image']['tmp_name'],$dst);

        $Name = $_POST['p_name'];
      	$Disp = $_POST['p_dis'];
      	$Price = $_POST['p_price'];
      	// $query= $connect->prepare("INSERT INTO prod(pname,pdis,pprice,pimage) values(?,?,?,?)");
      	// $query->execute($Name,$Disp,$Price,$dst);
      	$add_product = $connect->prepare("INSERT INTO prod(pname,pdis,pprice,pimage) values(?,?,?,?)");
      	$add_product->execute([$Name,$Disp,$Price,$dst]);
         // $add_pro = mysqli_query($connect,$add_product);
         if($add_product){
         	
         	header('location:login.php'); 
         }
         else{
         	echo "failed";
         }
        
     	 
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
	<form action="addproduct.php" method = "post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Product Name:</td>
				<td> <input type="text" name="p_name"></td>
			</tr>
			<tr>
				<td>Product Discription:</td>
				<td><input type="text" name="p_dis"></td>
			</tr>
			<tr>
				<td>Product Price:</td>
				<td> <input type="text" name="p_price"></td>
			</tr>
			<tr>
				<td>Product Image:</td>
				<td> <input type="file" name="p_image">	</td>
			</tr>
			<tr>
				<td><input type="submit" name="add_p" value ="Add Product"></td>
			</tr>
		</table>
	</form>
</body>
</html>
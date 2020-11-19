 <?php include 'db.php';

session_start();
if(!isset($_SESSION['username']))
{
	header('location:form.php');
	die();
}
      if (isset($_POST['add_p']))
      {
      	
		$Name = $_POST['p_name'];
      	$Disp = $_POST['p_dis'];
      	$Price = $_POST['p_price'];
      	$add_product = $connect->prepare("INSERT INTO prod(pname,pdis,pprice) values(?,?,?)");
      	$add_product->execute([$Name,$Disp,$Price]);
      	 $last_id = $connect->lastInsertId();
      	for($i=0; $i< count($_FILES['p_image']['name']); $i++){
      	
     	$v1=rand(1,99999);
     	$v2=md5($v1);
     	$fna = $_FILES['p_image']['name'][$i];
     	
     	$dst="product_image/".$v2.$fna;
     	
     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
     	
      	$add_product1 = $connect->prepare("INSERT INTO pro_image(proid,pimage) values(?,?) ");
      	$add_product1->execute([$last_id,$dst]);
    
        if($add_product AND $add_product1 )
 	  	{
         	
         	header('location:login.php'); 
        }
         else
         {
         	echo "failed";
         }
       
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
				
					<td> <input type='file' name='p_image[]' multiple/>	</td>
			
			</tr>
			<tr>
				<td><input type="submit" name="add_p" value ="Add Product"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php include 'db.php';
if (isset($_POST["submit"]))
{
	$Username = $_POST["username"];
	$Password = $_POST["password"];
	// echo "success ";
	$Username = mysqli_real_escape_string($connect,$Username);
	$Password = mysqli_real_escape_string($connect,$Password);
	$hash ="$1S$";
	$salt= "iamcominghome";
	$hash_salt = $hash . $salt;
	$Password = md5($Password,$hash_salt);
	$query = "INSERT INTO user(username,password) values('$Username','$Password')";
	$result = mysqli_query($connect,$query);
	if(!$result){
		die("query failed". mysqli_error());
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
<h1>PRODUCTS</h1>
<body>
	<form action="product.php" method="post">
	<input type="submit" name="add" value="Add Product"><br>
	<input type="submit" name="list" value ="List"><br>
	
	</form>
</body>
</html>
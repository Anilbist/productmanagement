<?php 
session_start();
if(!isset($_SESSION['username']))
// {
// 	echo "login success";
// }
// else
{
	header('location:form.php');
	die();
}
?>
<!-- <?php include 'db.php';
if (isset($_POST["submit"]))
{
	$Username = $_POST["username"];
	$Password = $_POST["password"];
	$hash ="$1S$";
	$salt ="iamcominghome";
	$hash_salt = $hash . $salt;
	$Password = md5($Password,$hash_salt);
	$query = $connect->prepare("INSERT INTO user(username,password) values(?,?)");
	$query->execute([$Username,$Password]);
	// $result = mysqli_query($connect,$query);
	// if(!$result){
	// 	die("query failed". mysqli_error());
	// }
}
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<h1>PRODUCTS</h1>
<body>
	<a href="addproduct.php">Add Product</a><br>
	<a href="list.php">List</a><br>
	<a href="logout.php">Logout</a>
	</form>
</body>
</html>
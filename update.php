
<?php include 'db.php';
	if (isset($_POST["update"]))
	{
		$Pro_sn=$_GET['id'];
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
		$query="UPDATE prod SET pname ='$Pro_name',pdis = '$Pro_dis',pprice='$Pro_price' WHERE Sn ='$Pro_sn'";
		$result=mysqli_query($connect,$query);
		if($result)
		{
			header('location:list.php');  
		}
		
	}
?>
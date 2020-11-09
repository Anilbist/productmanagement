
<?php include 'db.php';
	if (isset($_POST["update"]))
	{
		$Pro_sn=$_GET['id'];
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
		$query= $connect->prepare("UPDATE prod SET pname =?,pdis = ?,pprice=? WHERE Sn ='$Pro_sn'");
		// $result=mysqli_query($connect,$query);
		$query->execute([$Pro_name,$Pro_dis,$Pro_price]);
		if($query)
		{
			header('location:list.php');  
		}
		
	}
?>
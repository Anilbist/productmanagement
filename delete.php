<?php include 'db.php';
if (isset($_GET['del'])){
	$Pro_sn = $_GET['del'];
	$query = "DELETE FROM prod WHERE Sn='$Pro_sn' ";
	$result = mysqli_query($connect,$query);
	if($result)
	{	
		header("location:list.php");
	}
	else
	{
		echo "connection failed";
	}
}
?>
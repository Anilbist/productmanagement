<?php include 'db.php';
// if (isset($_GET['del'])){
	$Pro_sn = $_GET['del'];
	$query = $connect->query("DELETE FROM prod WHERE Sn='$Pro_sn' ");
	// $query->execute(['del'=> $Pro_sn]);
	// // $result = mysqli_query($connect,$query);
	if($query)
	{	
		header("location:list.php");
	}
	else
	{
		echo "connection failed";
	}
// }
?>
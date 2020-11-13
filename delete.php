<?php include 'db.php';
if (isset($_GET['del'])){
	$Pro_sn = $_GET['del'];
	$query =$connect->prepare("SELECT * FROM prod where Sn =?");
    $query->execute([$Pro_sn]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    unlink($row['pimage']);
	$Query = $connect->prepare("DELETE FROM prod WHERE Sn=?");
	$Query->execute([$Pro_sn]);
	// $result = mysqli_query($connect,$query);
	if($Query)
	{	
		header("location:list.php");
	}
	else
	{
		echo "connection failed";
	}
}
?>
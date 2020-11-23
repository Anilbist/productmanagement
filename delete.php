<?php include 'db.php';
if (isset($_GET['del'])){
	$Pro_sn = $_GET['del'];
	$query =$connect->prepare("SELECT * FROM pro_image where proid =?");
    $query->execute([$Pro_sn]);
    while($row = $query->fetch(PDO::FETCH_OBJ)){
    unlink($row->pimage);}
	$Query = $connect->prepare("DELETE FROM prod WHERE Sn=?");
	$Query->execute([$Pro_sn]);
	$Query1 = $connect->prepare("DELETE FROM pro_image WHERE proid=?");
	$Query1->execute([$Pro_sn]);
	// $result = mysqli_query($connect,$query);
	if($Query AND $Query1)
	{	
		header("location:list.php");
	}
	else
	{
		echo "connection failed";
	}
}
?>
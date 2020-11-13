
<?php include 'db.php';
	if (isset($_POST["update"]))
	{
		$Pro_sn=$_GET['id'];
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
		$v1=rand(1,99999);
     	$v2=md5($v1);
     	$fna = $_FILES['p_image']['name'];
     	// $dest="./product_image/".$v2.$fna;
     	$dst="product_image/".$v2.$fna;
     	$query =$connect->prepare("SELECT pimage FROM prod where Sn =?");
    	$query->execute([$Pro_sn]);
    	$row = $query->fetch(PDO::FETCH_OBJ);
    	unlink($row->pimage);
     	move_uploaded_file($_FILES['p_image']['tmp_name'],$dst);
		$Query= $connect->prepare("UPDATE prod SET pname =?,pdis = ?,pprice=?,pimage=? WHERE Sn ='$Pro_sn'");
		// $result=mysqli_query($connect,$query);
		$Query->execute([$Pro_name,$Pro_dis,$Pro_price,$dst]);
		if($Query)
		{
			header('location:list.php');  
		}
		else{
			echo "connection failed";
		}
	}
?>
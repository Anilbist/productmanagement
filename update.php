
<?php include 'db.php';
	if (isset($_POST["update"]))
	{
		$Pro_sn=$_GET['id'];
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
	if(!empty($_FILES['p_image']['name'])){
      	for($i=0; $i<count($_FILES['p_image']['name']); $i++){
     	$v1=rand(1,99999);
     	$v2=md5($v1);
     	$fna = $_FILES['p_image']['name'][$i];
     	$dst="product_image/".$v2.$fna;
		// $v1=rand(1,99999);
  //    	$v2=md5($v1);
  //    	$fna = $_FILES['p_image']['name'];
  //    	$dest="./product_image/".$v2.$fna;
  //    	$dst="product_image/".$v2.$fna;
     		$query =$connect->prepare("SELECT * FROM pro_image where proid=?");
    		$query->execute([$Pro_sn]);
    		while($row = $query->fetch(PDO::FETCH_OBJ)){
    		unlink($row->pimage);}
     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
		$Query= $connect->prepare("UPDATE pro_image SET pimage=? WHERE proid ='$Pro_sn'");
		$Query->execute([$dst]);
	
}}
	else{
		$Query= $connect->prepare("UPDATE prod SET pname =?,pdis = ?,pprice=? WHERE Sn ='$Pro_sn'");
		// $result=mysqli_query($connect,$query);
		$Query->execute([$Pro_name,$Pro_dis,$Pro_price]);
	}
		if($Query)
		{
			header('location:list.php');  
		}
		else{
			echo "connection failed";
		}
	}
?>

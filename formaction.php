<!-- add product -->
<?php include 'db.php';
session_start();
if(!isset($_SESSION['username']))
{
	header('location:form.php');
	die();
}
//addproduct
 if (isset($_POST['add_p']))
      {
      	
		$Name = $_POST['p_name'];
      	$Disp = $_POST['p_dis'];
      	$Price = $_POST['p_price'];
      	$add_product = $connect->prepare("INSERT INTO prod(pname,pdis,pprice) values(?,?,?)");
      	$add_product->execute([$Name,$Disp,$Price]);
      	$last_id = $connect->lastInsertId();
      	for($i=0; $i< count($_FILES['p_image']['name']); $i++){
      	
     	$v1=rand(1,99999);
     	$v2=md5($v1);
     	$fna = $_FILES['p_image']['name'][$i];
     	
     	$dst="product_image/".$v2.$fna;
     	
     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
     	
      	$add_product1 = $connect->prepare("INSERT INTO pro_image(proid,pimage) values(?,?) ");
      	$add_product1->execute([$last_id,$dst]);
    
        if($add_product AND $add_product1 )
 	  	{
         	
         	header('location:login.php'); 
        }
         else
         {
         	echo "failed";
         }
       
     	} 
     	
 	 }

//update
	if (isset($_POST["update"]))
	{
		$Pro_sn=$_POST['Id'];
		// print_r($Pro_sn);}
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
		$Query= $connect->prepare("UPDATE prod SET pname =?,pdis = ?,pprice=? WHERE Sn ='$Pro_sn'");
		$Query->execute([$Pro_name,$Pro_dis,$Pro_price]);
		$last_id = $connect->lastInsertId();
		for($i=0; $i< count($_FILES['p_image']['name']); $i++){
		$v1=rand(1,99999);
     	$v2=md5($v1);
     	$fna = $_FILES['p_image']['name'][$i];
     	$dst="product_image/".$v2.$fna;
     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
     	$query1 = $connect->prepare("INSERT INTO pro_image(proid,pimage) values(?,?) ");
      	$query1->execute([$Pro_sn,$dst]);
		
	}	
		if($Query OR $query1)
		{
			header('location:list.php');  
		}
		else{
			echo "connection failed";
		}
	}

//delete
if (isset($_GET['del'])){
	$Pro_sn = $_GET['del'];
	$query =$connect->prepare("SELECT * FROM pro_image where proid =?");
    $query->execute([$Pro_sn]);
    while($row = $query->fetch(PDO::FETCH_OBJ)){
    unlink($row->pimage);}
	$Query = $connect->prepare("DELETE FROM prod WHERE Sn=?");
	$Query->execute([$Pro_sn]);
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
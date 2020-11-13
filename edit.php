<?php include 'db.php';

      	$Pro_sn=$_GET['ID'];
		$query =$connect->prepare("SELECT * FROM prod where Sn =?");
      	// $query = mysqli_query($connect,$Squery);
            $query->execute([$Pro_sn]);
      	$row = $query->fetch(PDO::FETCH_OBJ);
            
      	// while ($row) {
      	// 	 $Pro_sn = $row->Sn;
      	// 	$Pro_name = $row->pname;
      	// 	$Pro_dis = $row->pdis;
      	// 	$Pro_price = $row->pprice;
       //            $Pro_image = $row->pimage;	
      	// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form action="update.php?id=<?php echo $row->Sn ?>" method = "post" enctype="multipart/form-data">
            <table>
                  <tr>
	                 <td><b>Product Name:</b></td>
                        <td>
                               <input type="text" name="p_name" value="<?php echo $row->pname ?>">
                        </td>
                  </tr>
	<tr>
            <td><b>Product Discription:</b></td>
            <td>
                  <input type="text" name="p_dis"  value="<?php echo $row->pdis?>">
            </td>
      </tr>
	<tr>
            <td><b>Product Price:</b></td>
            <td>
                  <input type="text" name="p_price" value="<?php echo $row->pprice?>">
             </td>
      </tr>
      <tr>
            <td><b>Product Image:</b> </td>
                  <td><img src="<?php echo $row->pimage ?>"></td>
                        <td>
                              <input type="file" name="p_image">
                        </td>
      </tr>
      <tr>
	     <td><input type="submit" name="update" value ="Update"></td>
      </tr>

</table>
      </form>
</body>
</html>

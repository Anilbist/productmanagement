<?php include 'db.php';
if (isset($_POST["add"])){
 // echo "Add Items";
include ('addproduct.php');
}
 if (isset($_POST["list"])){
// echo "List Items";
include ('list.php');
}
?>

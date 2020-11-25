<?php 
session_start();
if(!isset($_SESSION['username']))

{
	header('location:form.php');
	die();
}
?>
<?php 
session_start();
unset($_SESSION['username']);
header('location:form.php');
die();

?>
<?php
$dbconn = mysqli_connect('localhost','root','','db_issm'); 
if(isset($_GET['id']))
{
$id = $_GET['id'];
$comm = $_POST['comment'];
$email = $_POST['email'];
$query = mysqli_query($dbconn,"UPDATE comment SET comment='$comm' WHERE id = '$id'");
$query1 = mysqli_query($dbconn,"UPDATE comment SET lec_email='$email' WHERE id = '$id'");


if($query)
{
	?>
	<script type="text/javascript">
		window.alert("Log Book Updated");
		window.location.href="lecture_home.php";
	</script>
	<?php
}
else
{
	?>
	<script type="text/javascript">
		window.alert("Failed");
		window.location.href="lecture_home.php";
	</script>
	<?php
}
}

?>
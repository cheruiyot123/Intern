<html>
<body>
<?php
$con = mysqli_connect("localhost","root","","db_issm");


 
$sql="INSERT INTO fill_details (company_name, first_name, last_name,email,gender,file,department,university,internship,status)
VALUES
( '$_POST[company_name]','$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[gender]','$_POST[file]','$_POST[dept]','$_POST[university]','$_POST[internship]','APPLIED')";
if($sql)
{
	?>
	<script type="text/javascript">
		window.alert("Internship Successfully Aplied.");
		window.location.href="stu_intern.php";
	</script>
	<?php
}
else
{
?>
	<script type="text/javascript">
		window.alert("Failed. \n Try again.");
		window.location.href="stu_intern.php";
	</script>
	<?php	
}
 
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
//header('location:file_uploading/index.php');

?>
</body>
</html>
 
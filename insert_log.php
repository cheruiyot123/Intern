<?php
if(isset($_GET['id']))
{
$dbconn = mysqli_connect('localhost','root','','db_issm');
$id = $_GET['id']; 
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$department = $_POST['dept'];
$email = $_POST['email'];
$work = $_POST['work'];
$date = $_POST['date'];
$cyn = mysqli_query($dbconn,"SELECT * FROM fill_details WHERE id ='$id'");
while($row=mysqli_fetch_array($cyn))
{
	if($row['status']=='ACCEPTED')
{
	$query = mysqli_query($dbconn,"INSERT INTO comment(first_name,last_name,department,work,email,date)VALUES('$first_name','$last_name','$department','$work','$email','$date')");

if($query)
{
	?>
	<script type="text/javascript">
		window.alert("Log Book Updated");
		window.location.href="app_requests.php";
	</script>
	<?php
}
else
{
	?>
	<script type="text/javascript">
		window.alert("Failed");
		window.location.href="app_requests.php";
	</script>
	<?php
}
}
else
{
	?>
	<script type="text/javascript">
		window.alert("Wait for approval to begin filling the log book");
		window.location.href="app_requests.php";
	</script>
	<?php
}
}
}



?>
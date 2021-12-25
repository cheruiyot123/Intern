
<?php
if(isset($_GET['id']))
{
  $conn = mysqli_connect('localhost','root','','db_issm'); 
  $id = $_GET['id'];
  $cynthia = mysqli_query($conn , "SELECT * FROM activity WHERE activity_id = '$id'");
  $cyn_result = mysqli_fetch_array($cynthia);
}
?>
<?php include 'head.php';?>
<br>
<br>
<br>
<?php
$dbconn = mysqli_connect('localhost','root','','db_issm'); 
session_start();
$username = $_SESSION['user_name'];
$query5 = mysqli_query($dbconn, "SELECT * FROM registered_users WHERE user_name = '$username'");
$result5 = mysqli_fetch_array($query5);
?>
<br>
Welcome: <font color="blue"> <?php echo $result5['user_name']?></font>
<br>
<?php
if(!empty($_POST["insert_button"])) {
  /* Form Required Field Validation */
  foreach($_POST as $key=>$value) {
    if(empty($_POST[$key])) {
    $error_message = "All Fields are required";
    break;
    }
  }
 

  /* Email Validation */
  if(!isset($error_message)) {
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $error_message = "Invalid Email Address";
    }
  }

  /* Validation to check if gender is selected */
  if(!isset($error_message)) {
  if(!isset($_POST["gender"])) {
  $error_message = " All Fields are required";
  }
  }

  /* Validation to check if Terms and Conditions are accepted */
  if(!isset($error_message)) {
    if(!isset($_POST["terms"])) {
    $error_message = "Accept Terms and Conditions to Register";
    }
  }

  
  }

?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css" />
    <link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
 <style>
  body{
  width:610px;
  font-family:calibri;
}
.error-message {
  margin-top: 30px;
  padding: 50px 20px;
  background: #fff1f2;
  border: #ffd5da 1px solid;
  color: #d6001c;
  border-radius: 4px;
}
.success-message {
  padding: 7px 10px;
  background: #cae0c4;
  border: #c3d0b5 1px solid;
  color: #027506;
  border-radius: 4px;
}
.demo-table {
  background: white;
  width: 100%;
  border-spacing: initial;
  margin: 2px 0px;
  word-break: break-word;
  table-layout: auto;
  line-height: 1.8em;
  color: #333;
  border-radius: 4px;
  padding: 20px 40px;
    text-align: center;
}
.demo-table td {
  padding: 15px 0px;
 
}
.demoInputBox {
  padding: 10px 30px;
  border: #a9a9a9 1px solid;
  border-radius: 4px;
}
.btnRegister {
  padding: 10px 30px;
  background-color: #3367b2;
  border: 0;
  color: #FFF;
  cursor: pointer;
  border-radius: 4px;
  margin-left: 10px;
}
</style>
</head>
<body>

  <h1>Apply for Internship</h1>
  <form name="frmRegistration" method="post" action="inserty.php">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?> 
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?> 
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<tr>
<td>company_name</td>
<td><input type="text" class="demoInputBox" value="TENWEK MISSION HOSPITAL" name="company_name"readonly="readonly" minlength="3" maxlength="16" value=" <?php if(isset($_POST['company_name'])) echo $_POST['company_name']; ?>" required ></td>
</tr>
<tr>
<td>first_name</td>
<td><input type="text" class="demoInputBox" value="<?php echo $result5['first_name'] ?>" name="first_name"minlength="3" maxlength="16"  value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" required ></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" class="demoInputBox" name="last_name" value="<?php echo $result5['last_name'] ?>" minlength="3" maxlength="16" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" required ></td>
</tr>
<tr>
<td>email</td>
<td><input type="email" class="demoInputBox" value="<?php echo $result5['email'] ?>" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required ></td></tr>
<tr>
<td>Department</td>
<td><input type="text" class="demoInputBox" name="dept" value="<?php if(isset($_POST['dept'])) echo $_POST['dept']; ?>" required ></td></tr>
<tr>
<td>University Name</td>
<td><input type="text" class="demoInputBox" name="university" placeholder="Enter University Name" ></td></tr>
<tr>
<td>Selected Internship</td>
<td><input type="text" class="demoInputBox" name="internship" value="<?php echo $cyn_result['title'];  ?>" readonly="readonly" required ></td></tr>
<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?> required > Male
<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?> required > Female
</td>
</tr>
<tr>
<td>Upload cv:</td>
<td>
   <input type="file" name="file" required  />
</td>
</tr>
<tr>
<td colspan=2>
<input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="insert_button" value="Apply" class="btnRegister" required ></td>
</tr>

  
    </body>

</html>
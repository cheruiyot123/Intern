<?php include 'head2.php';?>
<br>
<br>
<br>
<?php
$dbconn = mysqli_connect('localhost','root','','db_issm'); 
if(isset($_GET['id']))
{
$id = $_GET['id'];
$query5 = mysqli_query($dbconn, "SELECT * FROM comment WHERE id ='$id'");
$result5 = mysqli_fetch_array($query5);
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
  <form name="frmRegistration" method="post" action="insert_leclog.php?id=<?php echo $result5['id']?>">
<table border="0" width="500" align="center" class="demo-table">
  <tr>
<td>Id</td>
<td><input type="text" class="demoInputBox" value="<?php echo $result5['id'] ?>" name="first_name"minlength="3" maxlength="16"  required ></td>
</tr>
<tr>
<td>first_name</td>
<td><input type="text" class="demoInputBox" value="<?php echo $result5['first_name'] ?>" name="first_name"minlength="3" maxlength="16"  required ></td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" class="demoInputBox" name="last_name" value="<?php echo $result5['last_name'] ?>" minlength="3" maxlength="16"  required ></td>
</tr>
<tr>
<td>email</td>
<td><input type="email" class="demoInputBox" value="<?php echo $result5['email'] ?>" name="email"  required ></td></tr>
<tr>
  <tr>
<td>Comment</td>
<td><textarea type="textarea" class="demoInputBox" name="comment"  required ></textarea></td></tr>
<tr>
  <tr>
<td>Lecture Convenient Email</td>
<td><input type="email" class="demoInputBox" name="email" required ></td></tr>
<tr>
  <td>
 <input type="submit" name="insert_button" value="SUBMIT" class="btnRegister" required ></td>
</tr>

  
    </body>

</html>
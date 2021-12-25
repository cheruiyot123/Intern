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
$my_email = $result5['email'];
?>
<br>
Welcome: <font color="blue"> <?php echo $result5['user_name']?></font>
<br>

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
  <h1>Important! Begin feeling the log book immediately.</h1>
 <table id = "table" class = "table table-bordered">
              <thead>
                <tr>
                  <th>company name</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Department</th>
                  <th>University</th>
                  <th>Internship</th>
                  <th>CV</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $s_query = $dbconn->query("SELECT * FROM fill_details WHERE email = '$my_email'") or die(mysqli_error());
                  while($s_fetch = $s_query->fetch_array()){  
                ?>
                <tr>
                  <td><?php echo $s_fetch['company_name']?></td>
                  <td><?php echo $s_fetch['first_name']?></td>
                  <td><?php echo $s_fetch['last_name']?></td>
                  <td><?php echo $s_fetch['email']?></td>
                  <td><?php echo $s_fetch['gender']?></td>
                  <td><?php echo $s_fetch['department']?></td>
                   <td><?php echo $s_fetch['university']?></td>
                  <td><?php echo $s_fetch['internship']?></td>
                                    
                  <td><?php echo $s_fetch['file']?></td>
                   <td><?php echo $s_fetch['status']?></td>
                  <td><center><a href="fill_log.php?id=<?php echo $s_fetch['id'] ?>"><font color="black"><font color="blue">FILL LOG BOOK</font></font></a> </center></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
  
    </body>

</html>
<?php include 'head2.php';?>
<br>
<br>
<br>
<?php
$dbconn = mysqli_connect('localhost','root','','db_issm'); 
session_start();
$username = $_SESSION['user_name'];
$query5 = mysqli_query($dbconn, "SELECT * FROM lecture WHERE user_name = '$username'");
$result5 = mysqli_fetch_array($query5);








?>
<br>
Welcome Lecturer: <font color="blue"> <?php echo $result5['user_name']?></font>

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

  <h1>Lecturer Email: <font color="blue"><?php echo $result5['email'] ?> </font><br> Department: <font color="blue"><?php echo $result5['department']?></font> <br> Search Student: <font color="blue"></font></h1>
  <br>
<form action="" method="post">
  <table>
    <tr>
      <td>Enter University Name</td>
      <td><input type="text" name="university" placeholde="seach your students"></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="Search">
</form>
  <a href="view_log.php"><font color="blue"><u>STUDENTS</u></font></a>
 <a href="print.php"><font color="red">Print</font></a>
  <table id = "table" class = "table table-bordered">
              <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                   <th>Department</th>               
                    <th>Email</th>
                    <th>Gender</th>
                     <th>Internship</th>            
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(isset($_POST['submit']))
                       {
                        $university = $_POST['university'];
      $a_query = $dbconn->query("SELECT * FROM fill_details WHERE university = '$university'") or die(mysqli_error($dbconn));
                  while($a_fetch = $a_query->fetch_array()){
                    
                ?>
                <tr>
                 
                                    <td><?php echo $a_fetch['first_name']?></td>
                                    <td><?php echo $a_fetch['last_name']?></td>
                                   
                                      <td><?php echo $a_fetch['department']?></td>

                                    <td><?php echo $a_fetch['email']?></td>
                  <td><?php echo $a_fetch['gender']?></td>
                  <td><?php echo $a_fetch['internship']?></td>
                  

                  <td><center><a href = "assess.php?admin_id=<?php echo $a_fetch['id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span>ASSESS</a></center></td>
                </tr>
                <?php
                  }
                
         }
           ?>      
              </tbody>
            </table>

    </body>

</html>
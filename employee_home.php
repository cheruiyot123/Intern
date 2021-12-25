<?php include 'head3.php';?>
<br>
<br>
<br>
<?php
$dbconn = mysqli_connect('localhost','root','','db_issm'); 
session_start();
$username = $_SESSION['user_name'];
$query5 = mysqli_query($dbconn, "SELECT * FROM employee WHERE user_name = '$username'");
$result5 = mysqli_fetch_array($query5);
$student_assigned = $result5['student_assigned'];

$query6 = mysqli_query($dbconn, "SELECT * FROM registered_users WHERE email = '$student_assigned'");
$result6 = mysqli_fetch_array($query6);
$student_assigned = $result5['student_assigned'];



?>
<br>
Welcome Suprvisor: <font color="blue"> <?php echo $result5['user_name']?></font>

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

  <h1>Employee Email: <font color="blue"><?php echo $result5['email'] ?> </font></font> <br> Student Assigned: <font color="blue"><?php echo $student_assigned ?></font></h1></h1>
  <br>

  <a href="view_log.php"><font color="blue">VIEW HIS PROGRESS</font></a>
 <a href="print.php"><font color="red">Print</font></a>
  <table id = "table" class = "table table-bordered">
              <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                   <th>Department</th>               
                    <th>Email</th>
                    <th>Work Done</th>
                     <th>Supervisor Comment</th> 
                      <th>Supervisor Name</th> 
                    <th>Date</th> 
                     <th>Lecturers Comment</th>            
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 

                  $a_query = $dbconn->query("SELECT * FROM comment WHERE email = '$student_assigned'") or die(mysqli_error());
                  while($a_fetch = $a_query->fetch_array()){
                    
                ?>
                <tr>
                 
                                    <td><?php echo $a_fetch['first_name']?></td>
                                    <td><?php echo $a_fetch['last_name']?></td>
                                   
                                      <td><?php echo $a_fetch['department']?></td>

                                    <td><?php echo $a_fetch['email']?></td>
                  <td><?php echo $a_fetch['work']?></td>
                   <td><?php echo $a_fetch['sup_comment']?></td>
                    <td><?php echo $a_fetch['sup_email']?></td>
                  <td><?php echo $a_fetch['date']?></td>
                   <td><?php echo $a_fetch['comment']?></td>

                  <td><center><a href = "log_comment_emp.php?admin_id=<?php echo $a_fetch['id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span>Comment</a></center></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>

    </body>

</html>
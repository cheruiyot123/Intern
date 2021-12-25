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
<?php
  $date = date("Y-m-d", strtotime("+8 HOURS"));
  $q_activity = $dbconn->query("SELECT * FROM `activity` WHERE '$date' BETWEEN `start` AND `end`") or die(mysqli_error());
  $f_activity = $q_activity->fetch_array();
  $v_activity = $q_activity->num_rows;
  if($v_activity > 0){  
    echo '<marquee><h4 class = "text-danger">'.$f_activity['title'].' - '.$f_activity['description'].'</h4></marquee>';
  }
?>
  
  <div  class = " panel-heading"> 
          <table id = "table" class = "table table-bordered">
            <thead>
              <tr>
                <th>Internship</th>
                <th>Description</th>
                <th>Start</th>
                <th>End</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $act_query = $dbconn->query("SELECT * FROM `activity`") or die(mysqli_error());
              while($act_fetch = $act_query->fetch_array()){
              ?>
              <tr>
                <td><?php echo $act_fetch['title']?></td>
                <td><?php echo $act_fetch['description']?></td>
                <td><?php echo "<label class = 'text-info'>".date("M d, Y", strtotime($act_fetch['start']))."</label>"?></td>
                <td><?php echo "<label class = 'text-info'>".date("M d, Y", strtotime($act_fetch['end']))."</label>"?></td>
                <td><center><a href ="fill_details.php?id=<?php echo $act_fetch['activity_id'] ?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Apply Now</a> </center></td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
    </body>

</html>
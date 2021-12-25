<?php 
$dbconn = mysqli_connect('localhost','root','','db_issm'); 
session_start();
$username = $_SESSION['user_name'];
$query5 = mysqli_query($dbconn, "SELECT * FROM registered_users WHERE user_name = '$username'");
$result5 = mysqli_fetch_array($query5);
$my_email = $result5['email'];
?>


<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<a href="javascript:Clickheretoprint()"><font color="red">Print</font></a>
<div id="print_content">
<h1>Internship at Tenwek Mission Hospital</h1>
<h1>Log Book </h1>
                       
                                <table id = "table" class = "table table-bordered">
              <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Email</th>
                  <th>Department</th>
                  <th>Task Done</th>
                  <th>Date</th>
                  <th>Supervisor Comment</th>
                  <th>Supervisor Email</th>
                  <th>Lectures Comment</th>
                  <th>Lectures Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $s_query = $dbconn->query("SELECT * FROM `comment` WHERE email = '$my_email'") or die(mysqli_error());
                  while($s_fetch = $s_query->fetch_array()){  
                ?>
                <tr>
                  <td><?php echo $s_fetch['first_name']?></td>
                  <td><?php echo $s_fetch['last_name']?></td>
                  <td><?php echo $s_fetch['email']?></td>
                  <td><?php echo $s_fetch['department']?></td>
                  <td><?php echo $s_fetch['work']?></td>
                                    
                  <td><?php echo $s_fetch['date']?></td>
                   <td><?php echo $s_fetch['sup_comment']?></td>
                    <td><?php echo $s_fetch['sup_email']?></td>
                  <td><?php echo $s_fetch['comment']?></td>
                  <td><?php echo $s_fetch['lec_email']?></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
                               
                        </div>

</div>
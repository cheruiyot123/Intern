_<?php
        if (isset($_POST['submit']))
            { 
         $dbconn = mysqli_connect('localhost','root','','db_issm');    
        //include("config.php");
        session_start();
        $username=$_POST['user_name'];
        $password = $_POST["password"];
        $_SESSION['user_name']=$username; 
        $query = mysqli_query( $dbconn, "SELECT * FROM employee WHERE user_name='$username' and password='$password'");
         if (mysqli_num_rows($query) != 0)
        {
         echo "<script language='javascript' type='text/javascript'> location.href='employee_home.php' </script>";   
          }
          else
          {
        echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
        }
        }
        ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/jquery.dataTables.css">
  <link rel ="stylesheet" type="text/css" href ="css/bootstrap.min.css">
<script type="text/javascript" src="js/script1.js"></script>
</head>
<?php include("head1.php");?>
<div class="container">
  
  <div class="row" id="pwd-container">

    <div class="col-md-8">
      <section class="login-form">
        <form method="post" action="#" role="login">
          <img src="img/icho.jpg" class="img-responsive" alt="" />
          <input type="text" name="user_name" placeholder="enter username " required class="form-control input-lg" value="" />
          
          <input type="password"  name="password" class="form-control input-lg" id="password" placeholder="Password" required="" />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <div>
           <a href="index.php">Home  </a>   
          </div>
          
        </form>
      </section>  
      </div>
      <div class ="col-md-4">
      </div>
      
    
      
</div>

</html>
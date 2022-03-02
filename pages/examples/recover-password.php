<?php
  $servername = "sql301.epizy.com";
  $username = "epiz_31138520";
  $password = "Ixtvp14vm8";
  $dbname = "epiz_31138520_dashboard_db";
    

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if($conn){
  //   echo"connection stablished successfully";
  }else{
     echo"there was an error". mysqli_connect_error();
  }  

$gencode=rand(1111,9999);
  // echo $gencode;
    

if(isset($_POST['forgot_email'])){

   $email=$_POST['forgot_email'];
  //email verification
 $sqle="SELECT email FROM `register` WHERE email LIKE BINARY '%$email%' ";
   $querye= mysqli_query($conn,$sqle);
   $rowe=mysqli_num_rows($querye);
   $detail=mysqli_fetch_row($querye);
  if($detail>0){
  
 
// $subject = "Password Reset";
//  $txt = "here is your 4-digit code:".$gencode;
//  $headers = "From: abhishektech2022@gmail.com" ;

// mail($email,$subject,$txt,$headers);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Recover Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="enter code from email" name="reset-code">
          <div class="input-group-append">
            <div class="input-group-text">
              
            </div>
          </div>
        </div>
       
          <input type="hidden" class="form-control" placeholder="enter code from email" name="reset-code-mail" value="<?php echo $gencode; ?>">
           <input type="hidden" class="form-control" placeholder="enter code from email" name="new_email" value="<?php echo $email; ?>">
              
            
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="new_pass" id="pass">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="far fa-eye" id="togglePassword" style="margin-right: 20px;" onclick="show_password()"></i>
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="new_confirm" id="rpass" >
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="far fa-eye" id="togglePassword" style="margin-right: 20px;" onclick="show_repassword()"></i>
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span id='message'></span>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<script type="text/javascript">
 $('#pass, #rpass').on('keyup', function () {
  if ($('#pass').val() == $('#rpass').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
function show_password(){
  var x= document.getElementById("pass");
  if (x.type== "password") {
    x.type="text";
  }else{
    x.type= "password";
  }
}
function show_repassword(){
  var x= document.getElementById("rpass");
  if (x.type== "password") {
    x.type="text";
  }else{
    x.type= "password";
  }
}
</script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php

   }else{
 echo "<div style='text-align:center; background-color:red;'><h3>this email is not registered, please try again<a href='forgot-password.html' style='display:block'>Try-again</h3></a></div>";
 die;
}
 //main-if
}


if(isset($_POST['reset-code']) && isset($_POST['new_pass'])){
$email= $_POST['new_email'];
$mynewpassword=$_POST['new_pass'];
$mynewconfmpassword=$_POST['new_confirm'];
if($_POST['reset-code']==$_POST['reset-code-mail']){
$upsql="UPDATE `register` SET `password`='$mynewpassword',`repassword`= '$mynewconfmpassword' WHERE email='$email' ";
  $que=mysqli_query($conn, $upsql);
   if($que){
 //$message= "<h3>Password change successfully!</h3>";
 header('location:errorshow.php?upmsg');
 
  }else{
      echo "there was an error".mysqli_error($conn);
   }
  }else{
  $error= "<h3>Wrong code, please try again</h3>";
      header('location:errorshow.php?err');
   }
}
 ?>
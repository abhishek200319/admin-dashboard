

<?php
  session_start();
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
  if(isset($_POST)){
  $Name= mysqli_real_escape_string($conn,$_POST['fname']);
  
  $email=$_POST['email'];
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     echo"<script>alert('invalid email')</script>";
     die;
  }
 $password= mysqli_real_escape_string($conn,$_POST['password']);
 $repassword= mysqli_real_escape_string($conn,$_POST['repassword']);
 if ($password!==$repassword) {
 	echo"<script>alert('password and confirm password should be same')</script>";
     die;
 }
 // echo $Name;
     $ip=$_SERVER['REMOTE_ADDR'];
 // $sql="INSERT INTO `register`(`id`, `fname`,  `email`, `password`, `repassword`) VALUES ('null','$Name','$email','$password','$repassword')";
    $sql="INSERT INTO `register` (`id`, `fname`, `email`, `password`, `repassword`, `ipadd`) VALUES (null, '$Name', '$email', '$password', '$repassword', INET_ATON('$ip') )";
   $query= mysqli_query($conn,$sql);
   if($query){
     //  echo "data inserted";
      $_SESSION['message']="user registerd successfully!";
     header('location:login.php');
     }else{
       echo "there was an error".mysqli_error($conn);
   }
  }
?>














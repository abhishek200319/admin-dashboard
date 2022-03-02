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
 if(isset($_POST['lemail'])){
  
  $lemail=$_POST['lemail'];
  
 $lpassword= $_POST['lpassword'];

 
  //email verification
 $sqle="SELECT email,fname FROM `register` WHERE email LIKE BINARY '%$lemail%' ";
   $querye= mysqli_query($conn,$sqle);
   $rowe=mysqli_num_rows($querye);
   $detail=mysqli_fetch_row($querye);
   $dlogin= $detail[1];

   //password verification
   $sqlp="SELECT password FROM `register` WHERE password LIKE BINARY '%$lpassword%' ";
   $queryp= mysqli_query($conn,$sqlp);
   $rowp=mysqli_num_rows($queryp);

if ($rowe==1 && $rowp==0) {
  echo "<div style='text-align:center; background-color:red;'><h3>wrong password!<a href='login.php' style='display:block'>Try-again</h3></a></div>";
  die;
}if ($rowe==0 && $rowp==0) {
  echo "this user does not exist please register here:";
  header('location:User-register.php?msgreg');
} else {
    $_SESSION['dlogin']=$dlogin;
   // echo $_SESSION['dlogin'];
  //header("location: /phpproject/AdminLTE-3.2.0/index.php");
  header("Refresh: 0, url = http://abhishek2003.epizy.com/phpprojects/AdminLTE-3.2.0/index.php");
}

  /* if($query){
  // echo "<script>alert('matched user')</script>";
    
    if ($row==1) {
   
   header('Refresh: 0, url = /phpproject/AdminLTE-3.2.0/index.html');
    }
   else{
	header('location:User-register.php');
  echo "please register";
   }
}*/
 }

?>




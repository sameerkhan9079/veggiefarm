<?php
  $userNameError = $mobileError = $emailError = $passError = $cpassError = "";
  $userName = $mobile = $email = $password = $confirmPass = "";
  $user = 0;
  $success = 0;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('connect.php');
    
  // $lname = $_POST["lname"];
  // First name validation
  if (empty($_POST['username'])) {
    $userNameError = "User Name is Mandatory";
  } else {
    $userName = test_input($_POST['username']);
    // Check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $userName)) {
      $userNameError = "Only letters and white space allowed";
    }
  }

  // Mobile validation
  if (empty($_POST['mobile'])) {
    $mobileError = "Mobile Number is Mandatory";
  } else {
    $mobile = test_input($_POST['mobile']);
    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
      $mobileError = "Invalid mobile number format";
    }
  }

  // Email validation
  if (empty($_POST['email'])) {
    $emailError = "Email is Mandatory";
  } else {
    $email = test_input($_POST['email']);
    // Check if email is well formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format";
    }
  }

  // Password validation
  if (empty($_POST['pass']) || empty($_POST['con_pass'])) {
    $passError = "Password is Mandatory";
  } elseif ($_POST['pass'] != $_POST['con_pass']) {
    $cpassError = "Passwords do not match";
  } else {
    $password = test_input($_POST['pass']);
    $confirmPass = test_input($_POST['con_pass']);
    
    if (strlen($password) <= 8) {
      $passError = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[0-9]+#", $password)) {
      $passError = "Your Password Must Contain At Least 1 Number!";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
      $passError = "Your Password Must Contain At Least 1 Capital Letter!";
    } elseif (!preg_match("#[a-z]+#", $password)) {
      $passError = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    
// current date
date_default_timezone_set('Asia/Kolkata');
$date =  date('d-F-Y : H:i a');
  //for database
  $sql = "Select * from `registration` where user_name = '$userName'";
  $result = mysqli_query($conn,$sql);
  if($result){
    $num = mysqli_num_rows($result);
    if($num>0){
      // echo "user already exist";
      $user = 1;
    }else{
    $sql = "insert into `registration` (user_name,phone,email,password,c_password,reg_date)
    values('$userName',$mobile,'$email','$password','$confirmPass','$date')";
    $result = mysqli_query($conn,$sql);
    
    if($result){
      // echo "register successful";
      $success = 1;
    }
    else{
      die(mysqli_error($conn));
    }}
  }
  if($user==0){
    // redirect();
    session_start();
    $_SESSION['username']=$userName;
    header("location:index.php");
  }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!doctype html>
<html lang="en">
  <head>
  <meta name="viewport" content="width=device-width">
    <!-- Bootstrap CSS and icons -->
    
   <?php include('boots_icon.php');?>
   <?php include('css/style.php');?>
   <?php include('css/media.php');?>

    <title>Register</title>
    <style>
      *{
        margin: 0;
        padding: 0;
      }
      body{
        height:100%;
        background:url(images/regist_bg.jpeg);
        background-repeat:no-repeat;
      }
      .error{
        color: #d30000;
        font-size:0.8rem
      }
     
      .gotohome{
        padding:10px 10px;
      }
      .position-absolute{
        top:0.4rem;
        left:34.6rem;
      }
      /* @media screen and (max-width: 900px) {
    .login-full-con .login-row-2 {
     width: 70%;
    }} */
    </style>
  </head>
  <body>
  
<?php 
// function redirect(){
//   echo "<script type='text/javascript'>
// let b = setTimeout(function(){
// document.location.href='index.php';
// },2000);
// conse.log(b);
// </script>";
// }
?>
<!--  success message for insert data in database  -->
<?php
if($user){
  // echo "<script type='text/javascript'>alert('user already exist'); </script>";
  echo '<div class="alert alert-warning  position-absolute  alert-dismissible fade show" role="alert">
  <strong> User already exist!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
<?php
if($success){
  echo '<div class="alert alert-success position-absolute alert-dismissible fade show" role="alert">
  <strong> Register Successful</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
<!-- ------------------------------- -->
    <div class="full-con login-full-con">
    
      <div class="row-1">
        <!-- <h6> <?php //echo $message;?></h6> -->
      <h3>REGISTER HERE</h3>
      </div>
      <div class="row-2">
        <form action="registerForm.php" method="post">
        <div class="form-container">
          <div class="p_hd">
            <h5>PROFILE INFORMATION</h5>
          </div>

            <div>
                      <input type="text" class="form-control" name="username"id=" firstname" placeholder="Enter User Name"required>
                      <span class="error"> 
                        <?php
                   echo $userNameError;
                        ?>
                      </span>
              </div>
              <!-- <div>
                      <input type="text" class="form-control" name="lname"placeholder="Last name">

                    </div> -->
                    <div>
                      <input type="number" class="form-control" name = "mobile" placeholder="Enter mobile number"required>
                      <span class="error">
                        <?php
                        echo $mobileError;
                        ?>
                      </span>
                    </div>
        
        </div>
        <div class="form-container">
          <div class="p_hd">
            <h5>LOGIN INFORMATION</h5>
          </div>
     
            <div>
                      <input type="email" class="form-control" name = "email" placeholder="Enter email"required>
                      <span class="error">
                        <?php
                        echo $emailError;
                        ?>
                      </span>
              </div>
              <div>
                      <input type="password" class="form-control" name = 
                      "pass" placeholder="Enter password"required>
                      <span class="error">
                        <?php
                        echo $passError;
                        ?>
                      </span>
                    </div>
                    <div>
                      <input type="password" class="form-control" name ="con_pass"placeholder="Confirm password"required>
                      <span class="error">
                        <?php
                        echo $cpassError;
                        ?>
                      </span>
                    </div>
                    <div>
                      <input type="submit" class="form-control btnn btn-success" value="REGISTER">
                    </div>
                    <div class="gotohome">
                      <a href="index.php"style="color:#ffb703;font-weight:500"
                      >Go to Home</a>
                    </div>
                    </div>
          </form>
          <?php
          // echo $fname."<br/>";
          // echo $mobile."<br/>";
          // echo $email."<br/>";
          // echo $password."<br/>";
          // echo $confirmPass."<br/>";
          
          ?>
        </div>
        </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <?php include('js/boot_script.php'); ?>
  </body>
</html>
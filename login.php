<?php
session_start();
include('connect.php');

$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    
    
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    // Authenticate user
    $sql = "SELECT * FROM registration WHERE user_name = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['user_name'];

        $login = 1;

        // Redirect to homepage or another page
        header("Location: index.php");
        exit;
    } else {
        $invalid = 1;
    }
}
// Update session wishlist count on login
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $sql = "SELECT id FROM registration WHERE user_name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $user_result = $stmt->get_result();
  $user = $user_result->fetch_assoc();

  if ($user) {
      $user_id = $user['id'];
      $sql = "SELECT COUNT(*) as count FROM wishlist WHERE user_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param('i', $user_id);
      $stmt->execute();
      $count_result = $stmt->get_result();
      $count_row = $count_result->fetch_assoc();
      $_SESSION['wishlist_count'] = $count_row['count'];
  }
}

?>

<!doctype html>
<html lang="en">
  
<head>
<meta name="viewport" content="width=device-width">

    <?php include('boots_icon.php');?>
    <?php include('css/style.php');?>
    <?php include('css/media.php');?>
    <title>Login</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      body {
        height: 100%;
        background:url(images/regist_bg.jpeg);
        /* background-repeat:no-repeat; */
      }
      .position-absolute {
        top: 0.6rem;
        left: 36rem;
      }
      @media screen and (max-width: 600px) {
    body {
        /* background: none !important; */
    }
}
 
      

    </style>
</head>
<body>
<!-- message for login -->
<?php if ($login): ?>
  <div class="alert alert-success position-absolute alert-dismissible fade show" role="alert">
    <strong>Login Successful</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if ($invalid): ?>
  <div class="alert alert-warning position-absolute alert-dismissible fade show" role="alert">
    <strong>Invalid Data</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<div class="full-con login-full-con">
  <div class="row-1 login-row1">
    <h3 class="name">LOGIN HERE</h3>
  </div>
  <div class="row-2 login-row-2">
    <form action="login.php" method="post">
      <div class="form-container">
        <div class="p_hd">
          <h5>LOGIN INFORMATION</h5>
        </div>
        <div>
          <input type="text" class="form-control" name="username" placeholder="Enter User Name" required>
        </div>
        <div style="margin-top:1rem;">
          <input type="password" class="form-control" name="pass" placeholder="Enter password" required>
        </div>
        <div class="login-row3 mt-2">
          <a href="forgot_password.php" style="color:#ffb703;font-weight:500;">Forgot Password?</a>
        </div>
        <div style="margin-top:1rem;">
          <input type="submit" class="form-control btnn btn-success" value="LOGIN">
        </div>
        <div class="login-row-3">
          <div>
            <h5>For New People</h5>
          </div>
          <div>
            <span class="reg_here"><a href="registerForm.php" style="color:#ffb703;font-weight:500">Register Here</a></span>
            <span class="back">(OR) Go Back to</span>
            <span><a href="index.php" style="color:#ffb703;font-weight:500">Home</a></span>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include('js/boot_script.php'); ?>
</body>
</html>

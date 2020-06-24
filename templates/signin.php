<?php
include_once 'modules/config.php';
include_once "app/helpers.php";

error_reporting(0);
session_start();

$error = '';
$msg = '';

if (auth_user()) {
  header( 'Location: https://mrsheldon.me/cms' );
} else {
if (isset($_POST['submit'])) {
  if (isset($_SESSION['csrf_token']) && isset($_POST['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $email = trim($email);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = trim($password);
  
    if (!$email || strlen($password) >= 320) {
      $error = '* A valid email is required';
    } else if (!$password || strlen($password) >= 48)  {
      $error = '* A valid password is required';
    } else if ($password && $email) {
      require_once 'modules/mysql.php';
      $email = mysqli_real_escape_string($conn, $email);
      $password = mysqli_real_escape_string($conn, $password);
      $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
      $result = $conn->query($sql);
      if (!$result) {
        $error = 'Error, Please refresh the page and try again.';
      } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['id'] && password_verify($password, $row['password'])) {
          create_user($row['id'], $row['name'], $row['email'], $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT']);
          header( 'Location: https://mrsheldon.me/cms' );
        } else if (!$row['id']) {
          $error = "Wrong email or password, please try again.";
        }
      }
      $conn->close();
    }
  }
  $token = csrf_token();
} else {
  $token = csrf_token();
}
}
?>

<!doctype html>
<html lang="en">
<head>
<?php include_once "includes/head.php"; ?>
</head>
<body>
<div class="page-container">
<div class="content-wrap">
  <header>
  </header>
  <main>
    <div class="container">
    <br/>
    <br/>
    <br/>
    <br/>

      <div class="row">
         <div class="col-lg-6">
         <form id="signin-form" class="singin-form" action="" method="POST" autocomplete="off" novalidate="novalidate">
         <input type="hidden" name="csrf_token" value="<?= $token; ?>">
         <div class="form-group">
          <label for="email-field">* Email</lable>
          <input value="<?= old('email'); ?>" type="email" name="email" id="email-field" class="form-control">
          </div>
          <div class="form-group">
          <label for="password-field">* Password</lable>
          <input type="password" name="password" id="password-field" class="form-control">
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Signin</button>
          <span class="text-danger"><?= $error; ?></span>
          <span class="text-success"><?= $msg; ?></span>
         </form>
         </div>
      </div>
    </div>
  </main>
   </div>
</div>
</body>

</html>
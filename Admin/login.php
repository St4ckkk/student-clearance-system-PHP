<?php
session_start();
error_reporting(1);
include('../connect.php');

$username = $_SESSION['admin-username'];
date_default_timezone_set('Africa/Lagos');
$current_date = date('Y-m-d H:i:s');

if (isset($_POST['btnlogin'])) {

  $username = $_POST['txtusername'];
  $password = $_POST['txtpassword'];
  $status = 'Active';


  $sql = "SELECT * FROM admin WHERE username='" . $username . "' and password = '" . $password . "' and status = '" . $status . "'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $_SESSION["admin-username"] = $row['username'];

  $count = mysqli_num_rows($result);
  if (isset($_SESSION["admin-username"])) { {

      header("Location: index.php");
    }
  } else {
    $_SESSION['error'] = ' Wrong Username and Password';
  }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login Form | Student Online Clearance System</title>
  <link rel="icon" type="image/png" sizes="16x16" href="../images/fav.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style type="text/css">
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }

    .wave {
      position: fixed;
      bottom: 0;
      left: 0;
      height: 100%;
      z-index: -1;
    }

    .container {
      width: 100vw;
      height: 100vh;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 7rem;
      padding: 0 2rem;
    }

    .img {
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .login-content {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      text-align: center;
    }

    .img img {
      width: 500px;
    }

    form {
      width: 360px;
    }

    .login-content img {
      height: 100px;
    }

    .login-content h2 {
      margin: 15px 0;
      color: #333;
      text-transform: uppercase;
      font-size: 2.9rem;
    }

    .login-content .input-div {
      position: relative;
      display: grid;
      grid-template-columns: 7% 93%;
      margin: 25px 0;
      padding: 5px 0;
      border-bottom: 2px solid #d9d9d9;
    }

    .login-content .input-div.one {
      margin-top: 0;
    }

    .i {
      color: #d9d9d9;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .i i {
      transition: .3s;
    }

    .input-div>div {
      position: relative;
      height: 45px;
    }

    .input-div>div>h5 {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 18px;
      transition: .3s;
    }

    .input-div:before,
    .input-div:after {
      content: '';
      position: absolute;
      bottom: -2px;
      width: 0%;
      height: 2px;
      background-color: #38d39f;
      transition: .4s;
    }

    .input-div:before {
      right: 50%;
    }

    .input-div:after {
      left: 50%;
    }

    .input-div.focus:before,
    .input-div.focus:after {
      width: 50%;
    }

    .input-div.focus>div>h5 {
      top: -5px;
      font-size: 15px;
    }

    .input-div.focus>.i>i {
      color: #38d39f;
    }

    .input-div>div>input {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      border: none;
      outline: none;
      background: none;
      padding: 0.5rem 0.7rem;
      font-size: 1.2rem;
      color: #555;
      font-family: 'poppins', sans-serif;
    }

    .input-div.pass {
      margin-bottom: 4px;
    }

    a {
      display: block;
      text-align: right;
      text-decoration: none;
      color: #999;
      font-size: 0.9rem;
      transition: .3s;
    }

    a:hover {
      color: #38d39f;
    }

    .btn {
      display: block;
      width: 100%;
      height: 50px;
      border-radius: 25px;
      outline: none;
      border: none;
      background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
      background-size: 200%;
      font-size: 1.2rem;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      text-transform: uppercase;
      margin: 1rem 0;
      cursor: pointer;
      transition: .5s;
    }

    .btn:hover {
      background-position: right;
    }


    @media screen and (max-width: 1050px) {
      .container {
        grid-gap: 5rem;
      }
    }

    @media screen and (max-width: 1000px) {
      form {
        width: 290px;
      }

      .login-content h2 {
        font-size: 2.4rem;
        margin: 8px 0;
      }

      .img img {
        width: 400px;
      }
    }

    @media screen and (max-width: 900px) {
      .container {
        grid-template-columns: 1fr;
      }

      .img {
        display: none;
      }

      .wave {
        display: none;
      }

      .login-content {
        justify-content: center;
      }
    }
  </style>
</head>

<img class="wave" src="images/adminwave.png">
<div class="container">
  <div class="img">
    <img src="images/adminbg.svg">
  </div>
  <div class="login-content">
    <form method="POST">
      <img src="images/adminavatar.svg">
      <h2 class="title">Welcome</h2>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5>Username</h5>
          <input type="text" name="txtusername" class="input">
        </div>
      </div>
      <div class="input-div pass">
        <div class="i">
          <i class="fas fa-lock"></i>
        </div>
        <div class="div">
          <h5>Password</h5>
          <input type="password" name="txtpassword" class="input">
        </div>
      </div>
      <a href="#">Forgot Password?</a>
      <button type="submit" name="btnlogin" class="btn btn-primary btn-block">Sign In</button>
    </form>
  </div>
</div>

<?php include('../footer.php'); ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<link rel="stylesheet" href="popup_style.css">
<?php if (!empty($_SESSION['success'])) { ?>
  <div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        <strong>Success</strong>
        </h1>
        <p>
          <?php echo $_SESSION['success']; ?>
        </p>
        <p>
          <button class="button button--success" data-for="js_success-popup">Close</button>
        </p>
    </div>
  </div>
  <?php unset($_SESSION["success"]);
} ?>
<?php if (!empty($_SESSION['error'])) { ?>
  <div class="popup popup--icon -error js_error-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
      <h3 class="popup__content__title">
        <strong>Error</strong>
        </h1>
        <p>
          <?php echo $_SESSION['error']; ?>
        </p>
        <p>
          <button class="button button--error" data-for="js_error-popup">Close</button>
        </p>
    </div>
  </div>
  <?php unset($_SESSION["error"]);
} ?>
<script>
  const inputs = document.querySelectorAll(".input");


  function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
  }

  function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
      parent.classList.remove("focus");
    }
  }


  inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
  });
  var addButtonTrigger = function addButtonTrigger(el) {
    el.addEventListener('click', function () {
      var popupEl = document.querySelector('.' + el.dataset.for);
      popupEl.classList.toggle('popup--visible');
    });
  };

  Array.from(document.querySelectorAll('button[data-for]')).
    forEach(addButtonTrigger);
</script>
</body>

</html>
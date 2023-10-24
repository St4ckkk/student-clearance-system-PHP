<?php
session_start();
error_reporting(1);
include('connect2.php');

if (isset($_POST['btnlogin'])) {
  if ($_POST['txtmatric_no'] != "" || $_POST['txtpassword'] != "") {

    $matric_no = $_POST['txtmatric_no'];
    $password = $_POST['txtpassword'];

    $sql = "SELECT * FROM `students` WHERE `matric_no`=? AND `password`=? ";
    $query = $dbh->prepare($sql);
    $query->execute(array($matric_no, $password));
    $row = $query->rowCount();
    $fetch = $query->fetch();
    if ($row > 0) {

      //  $_SESSION['matric_no'] = $fetch['matric_no'];
      //$_SESSION['dept'] = $fetch['dept'];
      //$_SESSION['faculty'] = $fetch['faculty'];
      //	$_SESSION['session'] = $fetch['session'];
      //	$_SESSION['ID'] = $fetch['ID'];

      //Get Get all session value
      foreach ($fetch as $items => $v) {
        if (!is_numeric($items))
          $_SESSION[$items] = $v;
      }

      header("Location: index.php");

    } else {
      $_SESSION['error'] = ' Invalid Matric No/Password';
    }
  } else {
    $_SESSION['error'] = ' Must Fill-in All Fields';

  }
}

?>



<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login Form | Student Online Clearance System</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="16x16" href="images/fav.png">
  <style type="text/css">
    body {
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
      position: relative;
    }

    .container {
      width: 100vw;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .login-content {
      text-align: center;
    }

    .login-content img {
      height: 100px;
    }

    .login-content h2 {
      color: #333;
      text-transform: uppercase;
      font-size: 2.9rem;
      margin: 15px 0;
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

    .input-div {
      margin: 25px 0;
      position: relative;
      padding: 10px 0;
    }

    .input-div h5 {
      color: #999;
      font-size: 18px;
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      transition: .3s;
    }

    .input-div input {
      width: 100%;
      height: 45px;
      border: none;
      outline: none;
      background: none;
      padding: 0.5rem 0.7rem;
      font-size: 1.2rem;
      color: #555;
      font-family: 'poppins', sans-serif;
      border-bottom: 2px solid #d9d9d9;
    }

    .input-div:before,
    .input-div:after {
      content: '';
      position: absolute;
      bottom: -2px;
      width: 0%;
      height: 2px;
      background-color: #f57500;
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

    .input-div.focus h5 {
      top: -5px;
      font-size: 15px;
    }

    .btnlogin {
      display: block;
      width: 100%;
      height: 50px;
      border-radius: 25px;
      outline: none;
      border: none;
      background-image: linear-gradient(to right, #32be8f, #f57500, #f57500);
      background-size: 200%;
      font-size: 1.2rem;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      text-transform: uppercase;
      margin: 1rem 0;
      cursor: pointer;
      transition: .5s;
    }

    .btnlogin:hover {
      background-position: right;
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
      color: #f57500;
    }


    .img {
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .img img {
      width: 500px;
    }

    .wave {
      position: fixed;
      bottom: 0;
      left: 0;
      height: 100%;
      z-index: -1;
    }

    /* Media queries */
    @media screen and (max-width: 1050px) {
      .container {
        flex-direction: column;
      }

      .img img {
        width: 400px;
      }
    }

    @media screen and (max-width: 900px) {
      .img {
        display: none;
      }
    }
  </style>
</head>
<img src="images/wave.png" alt="" class="wave">

<body class="white-bg">
  <div class="container">
    <div class="img">
      <img src="images/bg.svg">
    </div>
    <div class="login-content">
      <h1>Student Online Clearance System</h1>
      <form action="" method="POST">
        <img src="images/south-east-asian-institute-of-technology-logo-removebg-preview.png">
        <h2 class="title">Welcome</h2>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Matric No</h5>
            <input type="text" name="txtmatric_no" class="input">
          </div>
        </div>
        <div class="input-div pass">
          <div class="div">
            <h5>Password</h5>
            <input type="password" name="txtpassword" class="input">
          </div>
        </div>
        <a href="#" class="text-center">Forgot Password?</a>
        <input type="submit" class="btnlogin" name="btnlogin" value="Login">
      </form>
    </div>
  </div>

  <?Php include('footer.php'); ?>
  <!-- Mainly scripts -->
  <script src="js/jquery-2.1.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="popup_style.css">
  <?php if (!empty($_SESSION['success'])) { ?>
    <div class="popup popup--icon -success js_success-popup popup--visible">
      <div class="popup__background"></div>
      <div class="popup__content">
        <h3 class="popup__content__title">
          <strong>Success</strong>
        </h3>
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
        </h3>
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

  <?Php include('footer.php'); ?>
  <!-- Mainly scripts -->
  <script src="js/jquery-2.1.1.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
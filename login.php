<?php

require_once('core/init.php');
if (isset($_SESSION['has_login'])) {
    header('location: /basdat_bimbel');
}

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login - Sistem Informasi Bimbel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <link rel="stylesheet" href="assets/css/styleLogin.css">
    <link rel="stylesheet" href="assets/css/main.css">

</head>

<body>
  <img src="images/background.jpg">

  <div class="demo">
    <div class="login">
      <div class="login__form">
        <form action="controllers/login_controller.php" method="post" onsubmit="return validateForm()">

        <div class="login__row">
            <input type="text" name="username" id="username" class="login__input name" placeholder="Username"/>
            <small class="hide">* Isi ini dulu yuk</small>
        </div>

        <div class="login__row">
            <input type="password" name="password" id="password" class="login__input pass" placeholder="Password"/>
            <small class="hide">* Isi ini dulu yuk</small>
        </div>

        <button type="submit"  value="Masuk" class="login__submit">Masuk</button>
  
      </div>
    </div>
    
  </div>
</div>

<script src="assets/js/login.js"></script>

</body>

</html>

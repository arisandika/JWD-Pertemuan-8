<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

require 'connect.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  //cek username
  $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      //set session
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="index.css">
  <title>Login</title>
</head>

<body>
  <div class="hero min-h-screen bg-base-200 lg:px-14">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left p-12">
        <h1 class="text-5xl font-bold">Hi, Welcome</h1>
        <p class="py-6">Silahkan login, masukkan username & password Anda.</p>
        <p class="py-6">Dibuat oleh <span class="bg-primary text-white font-semibold">Ari Sandika</span></p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body p-7">
          <form action="" method="post">
            <div class="text-center">
              <div class="text-2xl font-semibold pb-1">LOGIN</div>
              <div class="text-xs pb-3">Please enter your username and password</div>
            </div>
            <div class="form-control">
              <label class="label" for="username">
                <span class="label-text font-semibold">Username</span>
              </label>
              <input type="text" placeholder="username" name="username" id="username" class="input input-bordered"
                required />
            </div>
            <div class="form-control">
              <label class="label" for="password">
                <span class="label-text font-semibold">Password</span>
              </label>
              <input type="text" placeholder="password" name="password" id="password" class="input input-bordered"
                required />
            </div>
            <?php
            if (isset($error)): ?>
              <label class="label"></label>
              <div class="alert rounded-[0.5rem]">
                <span class="text-red-500 text-xs">Incorrect email or password.</span>
              </div>
            <?php endif; ?>
            <div class="form-control mt-6">
              <button class="btn btn-primary" name="login" id="login">Login</button>
            </div>
            <div class="text-center pt-3">
              <p class="text-xs">Don't have an account?
                <a href="register.php" className="label-text-alt link link-hover">
                  <span class="text-primary">Create one</span>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
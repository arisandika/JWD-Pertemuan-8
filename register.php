<?php

session_start();

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

require 'connect.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    header("Location: login.php");
    exit;
  } else {
    echo mysqli_error($connect);
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="index.css">
  <title>Register</title>
</head>

<body>
  <div class="hero min-h-screen bg-base-200 lg:px-14">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left p-12">
        <h1 class="text-5xl font-bold">Hi, Welcome</h1>
        <p class="py-6">Buat akun anda, silahkan registrasi untuk membuat akun.</p>
        <p class="py-6">Dibuat oleh <span class="bg-primary text-white font-semibold">Ari Sandika</span></p>
      </div>
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body p-7">
          <form action="" method="post">
            <div class="text-center text-2xl font-semibold pb-1">REGISTER</div>
            <div class="text-center text-xs pb-3">Please fill in the information below</div>
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
            <div class="form-control">
              <label class="label" for="password2">
                <span class="label-text font-semibold">Confirm Password</span>
              </label>
              <input type="text" placeholder="Confirm password" name="password2" id="password2"
                class="input input-bordered" required />
            </div>
            <div class="form-control mt-6">
              <button class="btn btn-primary" name="register" id="register">Create my account</button>
            </div>
            <div class="text-center pt-3">
              <p class="text-xs">Already have an account?
                <a href="login.php" className="label-text-alt link link-hover">
                  <span class="text-primary">Login</span>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
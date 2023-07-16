<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="index.css">
  <title>Home</title>
  <style>
    .navbar {
      position: sticky;
      top: 0;
      z-index: 100;
    }
  </style>
</head>

<body>
  <div class="navbar bg-base-100">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost btn-circle">
          <ion-icon name="menu-outline" class="text-3xl"></ion-icon>
        </label>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="./index.php">Homepage</a></li>
          <li><a>Portfolio</a></li>
          <li><a>About</a></li>
        </ul>
      </div>
    </div>
    <div class="navbar-center">
      <a class="btn btn-ghost normal-case text-xl">Home</a>
    </div>
    <div class="navbar-end">
      <div class="dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
          <ion-icon name="person-circle-outline" class="text-3xl"></ion-icon>
        </label>
        <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
          <li><a>Profile</a></li>
          <li><a>Settings</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="hero min-h-screen bg-base-200 lg:px-14">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left p-12">
        <h1 class="text-5xl font-bold">Hi, Welcome</h1>
        <p class="py-6">Selamat datang di Website Tugas Pertemuan 8 JWD, Tugas kali ini adalah membuat Register & Login
          System.</p>
        <p class="py-6">Dibuat oleh <span class="bg-primary text-white font-semibold">Ari Sandika</span></p>
      </div>
    </div>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>
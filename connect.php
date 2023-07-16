<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "phpdasar";

$connect = mysqli_connect($host, $user, $pass);
if ($connect) {
  $buka = mysqli_select_db($connect, $database);
  if (!$buka) {
    echo "Db gagal terkoneksi";
  }
} else {
  echo "Mysql tdk terhubung";
}

function registrasi($data)
{
  global $connect;

  $username = strtolower(stripcslashes($data["username"]));
  $password = mysqli_real_escape_string($connect, $data["password"]);
  $password2 = mysqli_real_escape_string($connect, $data["password2"]);

  //cek password

  if ($password !== $password2) {
    echo "<script>
            alert('Passwords do not match');
        </script>";
    return false;
  }

  //cek username

  $result = mysqli_query($connect, "SELECT username FROM user WHERE username= '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
        alert('Username has already');
      </script>";
    return false;
  }

  //enkrpsi password

  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan user

  mysqli_query($connect, "INSERT INTO user VALUES('', '$username', '$password')");
  return mysqli_affected_rows($connect);

}

?>
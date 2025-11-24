<?php
require __DIR__ . '/../../config/database.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username,password,email)
            VALUES ('$username','$password','$email')";
    mysqli_query($conn, $sql);

    header("Location: index.php?page=user/list");
}
?>

<h2>Tambah User</h2>

<form method="POST">
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
Email: <input type="text" name="email"><br><br>

<button type="submit" name="submit">Simpan</button>
</form>

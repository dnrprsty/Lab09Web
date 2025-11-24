<?php
require __DIR__ . '/../../config/database.php';
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php?page=dashboard");
    } else {
        echo "<p style='color:red'>Username atau password salah</p>";
    }
}
?>

<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>

    <button type="submit" name="login">Login</button>
</form>

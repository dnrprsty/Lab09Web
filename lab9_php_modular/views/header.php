<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modular CRUD</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">

<header>
    <h1>Modular CRUD (Praktikum 9)</h1>
</header>

<?php
session_start();

$page = $_GET['page'] ?? 'dashboard';

// Izinkan halaman login tanpa harus login dulu
$allow = ['auth/login'];

// Jika belum login tapi akses halaman selain login
if (!isset($_SESSION['username']) && !in_array($page, $allow)) {
    header("Location: index.php?page=auth/login");
    exit;
}
?>


<nav>
    <a href="index.php?page=dashboard">Dashboard</a>
    <a href="index.php?page=barang/list">Data Barang</a>
    <a href="index.php?page=barang/add">Tambah Barang</a>
    <a href="index.php?page=user/list">User List</a>
    <a href="index.php?page=user/add">Tambah User</a>
    <a href="index.php?page=auth/login">Login</a>
    <a href="index.php?page=auth/logout">Logout</a>
</nav>

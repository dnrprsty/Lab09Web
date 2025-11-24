<?php
require __DIR__ . '/../../config/database.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Location: index.php?page=user/list");

<?php
require __DIR__ . '/../../config/database.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<h2>Daftar User</h2>
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['username'] ?></td>
    <td><?= $row['email'] ?></td>
    <td>
        <a href="index.php?page=user/delete&id=<?= $row['id'] ?>"
           onclick="return confirm('Hapus user ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

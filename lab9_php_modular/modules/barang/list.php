<?php
require __DIR__ . '/../../config/database.php';

$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);
?>

<h2>Data Barang</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Harga Jual</th>
    <th>Harga Beli</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php if ($result): ?>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><img src="assets/gambar/<?= $row['gambar'] ?>" width="80"></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['kategori'] ?></td>
    <td><?= $row['harga_jual'] ?></td>
    <td><?= $row['harga_beli'] ?></td>
    <td><?= $row['stok'] ?></td>
    <td>
        <a href="index.php?page=barang/edit&id=<?= $row['id_barang'] ?>">Edit</a> |
        <a href="index.php?page=barang/delete&id=<?= $row['id_barang'] ?>"
           onclick="return confirm('Hapus data ini?')">Hapus</a>
    </td>
</tr>
<?php endwhile; endif; ?>

</table>

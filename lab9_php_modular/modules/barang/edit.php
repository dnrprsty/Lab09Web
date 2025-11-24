<?php
require __DIR__ . '/../../config/database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = $id";
$data = mysqli_fetch_assoc(mysqli_query($conn, $sql));

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = $data['gambar'];

    if ($_FILES['file_gambar']['error'] == 0) {
        $filename = time() . "_" . $_FILES['file_gambar']['name'];
        $dest = "assets/img/" . $filename;
        move_uploaded_file($_FILES['file_gambar']['tmp_name'], $dest);
        $gambar = $dest;
    }

    $update = "UPDATE data_barang SET 
        nama='$nama',
        kategori='$kategori',
        harga_jual='$harga_jual',
        harga_beli='$harga_beli',
        stok='$stok',
        gambar='$gambar'
        WHERE id_barang=$id";

    mysqli_query($conn, $update);

    header("Location: index.php?page=barang/list");
}
?>

<h2>Edit Barang</h2>
<form method="POST" enctype="multipart/form-data">

Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br><br>

Kategori:
<select name="kategori">
    <option value="Komputer"   <?= $data['kategori']=="Komputer" ? "selected" : "" ?>>Komputer</option>
    <option value="Elektronik" <?= $data['kategori']=="Elektronik" ? "selected" : "" ?>>Elektronik</option>
    <option value="Hand Phone" <?= $data['kategori']=="Hand Phone" ? "selected" : "" ?>>Hand Phone</option>
</select><br><br>

Harga Jual: <input type="text" name="harga_jual" value="<?= $data['harga_jual'] ?>"><br><br>
Harga Beli: <input type="text" name="harga_beli" value="<?= $data['harga_beli'] ?>"><br><br>
Stok: <input type="text" name="stok" value="<?= $data['stok'] ?>"><br><br>

Gambar lama:<br>
<img src="<?= $data['gambar'] ?>" width="100"><br><br>

Ganti gambar: <input type="file" name="file_gambar"><br><br>

<button type="submit" name="submit">Simpan</button>
</form>

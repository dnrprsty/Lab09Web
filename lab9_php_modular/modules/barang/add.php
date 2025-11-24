<?php
require __DIR__ . '/../../config/database.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $file = $_FILES['file_gambar'];
    $gambar = '';

    if ($file['error'] == 0) {
        $filename = time() . "_" . str_replace(' ', '_', $file['name']);
        $destination = "assets/img/" . $filename;
        move_uploaded_file($file['tmp_name'], $destination);
        $gambar = $destination;
    }

    $sql = "INSERT INTO data_barang (nama,kategori,harga_jual,harga_beli,stok,gambar)
            VALUES ('$nama','$kategori','$harga_jual','$harga_beli','$stok','$gambar')";
    mysqli_query($conn, $sql);

    header("Location: index.php?page=barang/list");
}
?>

<h2>Tambah Barang</h2>
<form method="POST" enctype="multipart/form-data">

Nama: <input type="text" name="nama"><br><br>
Kategori:
<select name="kategori">
    <option value="Komputer">Komputer</option>
    <option value="Elektronik">Elektronik</option>
    <option value="Hand Phone">Hand Phone</option>
</select><br><br>

Harga Jual: <input type="text" name="harga_jual"><br><br>
Harga Beli: <input type="text" name="harga_beli"><br><br>
Stok: <input type="text" name="stok"><br><br>

Gambar: <input type="file" name="file_gambar"><br><br>

<button type="submit" name="submit">Simpan</button>

</form>

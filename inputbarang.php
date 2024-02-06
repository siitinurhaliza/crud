<h3 style ="color : red"> Form Input Barang </h3>
<form action="" method="post">
    <table>
        <tr>
            <td style ="color : blue" width="130"> Kode Barang </td>
            <td> <Input Type = "text" name="kode_barang"></td>
        </tr>
        <tr>
            <td style ="color : blue" width="130"> Nama Barang </td>
            <td> <Input Type = "text" name="nama_barang"></td>
        </tr>
            <td style ="color : blue" width="130"> Harga Barang </td>
            <td> <Input Type = "text" name="harga_barang"></td>
        </tr>
        <tr><td></td></tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="simpan" name="proses">
            <a href="index.php"><button>Home</a></button>
            <a href="tampilbarang.php"><button>Tampilan Data</a></button>
        </td>
    </tr>

    </table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "insert into barang set
    kode_barang = '$_POST[kode_barang]',
    nama_barang = '$_POST[nama_barang]',
    harga_barang = '$_POST[harga_barang]'");

    echo "Data Berhasil Di Tambahkan";

    if(mysqli_affected_rows($koneksi) > 0) {
        header('Location: data.php');
    }
}
?>
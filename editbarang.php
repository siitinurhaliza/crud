<?php
include "koneksi.php";
$sql=mysqli_query($koneksi,"select * from barang where kode_barang='$_GET[kode]'");
$data=mysqli_fetch_array($sql);
?>

<h3 style ="color : red"> Form Edit Barang </h3>
<form action="" method="post">
    <table>
        <tr>
            <td style ="color : blue" width="130"> Kode Barang </td>
            <td> <Input Type = "text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>"> </td>
        </tr>
        <tr>
            <td style ="color : blue" width="130"> Nama Barang </td>
            <td> <Input Type = "text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>"></td>
        </tr>
            <td style ="color : blue" width="130"> Harga Barang </td>
            <td> <Input Type = "text" name="harga_barang" value="<?php echo $data['harga_barang']; ?>"></td>
        </tr>
        <tr><td></td></tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Update" name="proses">
            <a href="index.php"><button>Home</a></button>
            <a href="tampilbarang.php"><button>Tampilan Data</a></button>
        </td>
    </tr>

    </table>
</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
    mysqli_query($koneksi, "UPDATE barang set
    nama_barang = '$_POST[nama_barang]',
    harga_barang = '$_POST[harga_barang]'
    WHERE kode_barang = '$_GET[kode]'");

    echo "Data barang baru telah terubah";
    echo "<meta http-equiv=refresh content=1;URL='tampilbarang.php'>";
}
?>
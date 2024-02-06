<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Siti nurhaliza</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css
 integrity="sha512-MV7K8+y+gLIBoVD591QIYicR65iaqukzvf/nwasF0nqhPay5w/91JmvM2hMDcnK1OnMGCdVK+iQrJ71zPJQd1w==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            #map{
                height: 80vh;
            }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Pelalawan sehat</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Data </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">User </a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="https://wa.me/68974395648">HelpDesk</a>
                   
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link Profil-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sosmed</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="https://sn613819@gmail.com">Gmail</a>
                                        <a class="dropdown-item" href="https://www.instagram.com/siitinrhlz/?igshid=NzZlODBkYWE4Ng%3D%3D">Instagram</a>
                                       
                                        <a class="dropdown-item" href="https://wa.me/68974395648">WhatsApp</a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link Profil-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Login</a>
                                        <a class="dropdown-item" href="#!">Registrasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#!">Log Out</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
<center><br>
<h4>Data Barang</h4>
<a href="<?=base_url('admin/barang/tambah?id=0&status=0')?>" class="btn btn-primary">Tambah</a>
<hr>
<table class="table data-table" id="dtable">
<thead>
    <tr>
    <th scope="col">No</th>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Website</th>
                            <th scope="col">latitude</th>
                            <th scope="col">longitude</th>
        <th>Aksi</th>
    </tr>
</thead>
<?php
    $barang=$this->db->query("select * from tbl_data")->result_array();
    $no=1;
    foreach($barang as $row){
?>
<tr>
<td>$no</td>
                        <td>$tampil[id]</td>
                        <td>$tampil[nama]</td>
                        <td>$tampil[alamat]</td>
                        <td>$tampil[website]</td>
                        <td>$tampil[latitude]</td>
                        <td>$tampil[longitude]</td>
    <td>
        <a href="<?=base_url('admin/barang/tambah?id='.$row['barang_id'].'&status=1')?>"
        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
        <button class="btn btn-danger btn-sm" onClick="hapus(<?=$row['barang_id']?>)"><i class="fa fa-trash"></i></button>
    </td>
</tr>
<?php
    $no++;
    }
?>
</table>
 
<script>
$('#dtable').DataTable(
    {                       
        dom: 'Bfrtip',
        lengthMenu: [[10, 50, 100, 200, -1], [10, 50, 100, 200, "All"]],
        'pageLength': 50,
        'responsive':false,                         
        buttons: [
            'pageLength','copy', 'csv', 'excel','pdf','print'                 
        ]           
    }
);
 
function hapus(barang_id)
{
  swal({
    title: "Anda Yakin ?",
    text: "Untuk menghapus data barang",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya",
    cancelButtonText: "Batal",
    closeOnConfirm: false,
    closeOnCancel: true
  },
  function(isConfirm){
    if (isConfirm) {
        $.ajax({
                url: "<?= base_url('admin/barang/hapus')?>", 
                type: "POST", 
                data:  {barang_id:barang_id},           
                success:function(getreturn){                    
                    swal("Deleted!", "Data berhasil dihapus", "success");
                    location.reload();
                }
            });        
    } 
    });
}
 
</script>
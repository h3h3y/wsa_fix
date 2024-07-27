<?php

//mengambil data
$targetUrl = "http://localhost:90/wsa0080/web/mahasiswa";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $targetUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//untuk berarer
$header = [
    'Authorization: Bearer abc-123'
];
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$out = curl_exec($ch);
curl_close($ch);
$data = json_decode($out);
?>

<h1>Data Buku</h1>
<a href="curl_post.php" class="btn-success">Tambah Data</a>
<br><br>
<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>No Telepon</th>
        <!-- <th>Aksi</th> -->
    </tr>
    <?php $no=1; ?>
    <?php foreach($data as $d): ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $d->nim ?></td>
            <td><?= $d->nama_mahasiswa ?></td>
            <td><?= $d->no_telepon ?></td>
            <!-- <td>
                <a href="curl_edit.php?id=<?= $d->id?>" class="btn-edit">Edit</a>
                <a href="curl_delete.php?id=<?= $d->id?>" class="btn-hapus">Hapus</a>
            </td> -->
        </tr>
        <?php $no++ ?>
    <?php endforeach ?>
</table>

<style>
    th,td{
        border: 1px solid black;
        padding: 1em;
    }
    tr:nth-child(odd){
        background-color: #ccc;
    }
    table{
        border-collapse: collapse;
        padding: 1em;
        box-shadow: 5px 10px #ccc;
    }
    .btn-success{
        padding: 10px;
        margin-bottom: 2px;
        box-shadow: 5px, 5px, #ccc;
        background-color: #ccd5ae;
    }
    .btn-success:hover{
        color: white;
        background-color: #344e41;
        transition: 0.5s;
    }
    .btn-hapus{
        padding: 5px;
        box-shadow: 2px 2px #ccc;
        background-color: red;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
    .btn-edit{
        padding: 5px;
        box-shadow: 2px 2px #ccc;
        background-color: orange;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
</style>
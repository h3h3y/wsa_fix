<?php
$id = $_GET['id'] ?? '';
if($_SERVER['REQUEST_METHOD'] != "POST"){
    $url = "http://localhost:90/wsa0080/web/buku/$id";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $header = [
        'Authorization: Bearer 100-token'
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $output = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($output);
}else if($_SERVER['REQUEST_METHOD'] == "POST"){
    $url = "http://localhost:90/wsa0080/web/buku/$id";
    $data = urldecode(http_build_query($_POST));
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $header = [
        'Authorization: Bearer 100-token'
    ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $out = curl_exec($ch);
    curl_close($ch);
    echo $out;
    header('Location: curl_get.php');
}

?>


<h1>Edit data buku</h1>
    <form method="post">
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data->judul ?>">
        </div>
        <div class="form-group">
            <label for="">Penulis</label>
            <input type="text" name="penulis" class="form-control" value="<?= $data->penulis ?>">
        </div>
        <div class="form-group">
            <label for="">Tanggal Terbit</label>
            <input type="date" name="tanggal_terbit" class="form-control" value="<?= $data->tanggal_terbit ?>">
        </div>
        <button type="submit">Simpan Data</button>
    </form>
    <style>
        label{
            display: block;
        }
        .form-control{
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        button[type=submit]{
            padding: 10px;
            background-color: #a3b18a;
        }
        .error{
            background-color: #d62828;
            color: white;
            width: 100%;
            padding: 10px;
        }
        .error>li{
            padding-left: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            list-style: none;
        }
    </style>
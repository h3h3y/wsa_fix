<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // ambil data dari POST    
        $data = urldecode(http_build_query($_POST)); 
        // inisialisasi curl
        $targetUrl = "http://localhost:90/wsa0080/web/buku";
        $ch = curl_init($targetUrl);
        // set option
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $header = [
            'Authorization: Bearer 100-token'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // eksekusi
        $out = curl_exec($ch);
        // tutup
        curl_close($ch);

        $respon = json_decode($out);
        if(!isset($respon->id)){
            echo '<div class="error">';
            foreach($respon as $r){
                echo '<li>'.$r->message.'</li>';
            }
            echo '</div>';
        }else{
            header('Location: curl_get.php');
        }
    }
    ?>
    <h1>Input data buku</h1>
    <form method="post">
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Penulis</label>
            <input type="text" name="penulis" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Tanggal Terbit</label>
            <input type="date" name="tanggal_terbit" class="form-control">
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
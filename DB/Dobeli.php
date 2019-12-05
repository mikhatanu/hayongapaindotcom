<?php
    require_once("connect.php");

    $idbarang = $_POST['id'];
    
    $resultbeli = $con->query("SELECT * FROM products WHERE id=$idbarang");

    foreach ($resultbeli as $key) {
        echo '<img src="'.'uploads/'.$key['image'].'">';
        echo '<br><b>Nama Produk: </b>'.$key['name'];
        echo '<br><b>Stok tersedia: </b>'.$key['stock'];
        echo '<br><b>Harga Produk: </b>'.$key['price'];
        echo '<br><b>Jumlah pemesanan:</b><input type="number" name="qty" value=1 min="1" max="'.$key['stock'].'">';
    }
?>
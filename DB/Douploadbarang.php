<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Barang Mu</title>
</head>
<body>
    <?php
    require_once("connect.php");
    require_once("Dologin.php");
    $namabarang = htmlentities($_POST['namabarang']);
    $hargabarang = htmlentities($_POST['hargabarang']);
    $stokbarang = htmlentities($_POST['stokbarang']);
    $gambarbarang = $_FILES['gambarbarang']['name'];
    $namapenjual = $_SESSION['Username'];
    $targetsave = "uploads/";
    $targetfile = $targetsave.basename(($_FILES['gambarbarang']['name']));
    $imagefiletype = strtolower(pathinfo($targetfile,PATHINFO_EXTENSION));
    $newnamepic = md5($gambarbarang).'.'.$imagefiletype;
    $ekstensi = array("jpg","jpeg","png","gif");
    if(in_array($imagefiletype,$ekstensi)){
        if($_FILES['gambarbarang']['size']<=1048576){
            $hasilhashnamagambar = md5($gambarbarang).'.'.$imagefiletype;
            $result = $con->query("INSERT INTO products(name,price,stock,image,seller) 
                                   VALUES('$namabarang',$hargabarang,$stokbarang,'$newnamepic'
                                   ,'$namapenjual')");
            move_uploaded_file($_FILES['gambarbarang']['tmp_name'],$targetsave.$hasilhashnamagambar);
            echo "Berhasil Menambah Barang";
            ?>
            <a href="index.php">Kembali Ke Menu Utama</a>
            }
            <?php
           
        }
        else{
            echo "Maks 1MB :)";
        }
    }
    else{
        echo "Cuman boleh ekstensi jpg,png dan jpeg :)";
    }
?>
    
</body>
</html>
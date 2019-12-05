<!DOCTYPE html>
<?php
    require_once("Dologin.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Walmart</title>
</head>
<body>
    <div class="loginregisterbar"> 
    <?php
        if(isset($_SESSION['Username'])){
            echo "Hi, ".$_SESSION['Username'];
    ?>
    <br>
    <form action="Dologout.php">
        <input type="submit" value="Logout">
    </form>
    <?php
        }
        else{
    ?>
        <form action="Dologin.php" method="post">
            Username: <input type="text" name="username" placeholder="Username">
            Password: <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Login">
            <a href="register.php">Don't Have Account ? Register Now!</a>
        </form>
    <?php } ?>
    </div>
    <hr>
    <div class="tambahbarang">
        <form action="uploadbarang.php">
            <input type="submit" value="Upload Barang untuk Dijual">
        </form>
    </div>
    <div class="whitebar">
    <table>
        <tr>
            <td class="tabelbarang"> Gambar </td>
            <td class="tabelbarang"> Nama </td>
            <td class="tabelbarang"> Harga </td>
            <td class="tabelbarang"> Stok </td>
            <td class="tabelbarang"> Seller </td>
        <?php
        require_once("connect.php");
        $resultbarang = $con->query("SELECT * FROM products");
        foreach ($resultbarang as $key) {
        ?>  
            <tr>
                <td class="tabelbarang"> <img src="<?= 'uploads/'.$key['image'] ?>"></a></td>
                <td class="tabelbarang"> <?= $key['name']?> </td>
                <td class="tabelbarang"> <?= $key['price']?> </td>
                <td class="tabelbarang"> <?= $key['stock']?> </td>
                <td class="tabelbarang"> <?= $key['seller']?> </td>
                <td class="tabelbarang">
                    <form action="Dobeli.php" method="post">
                        <input type="hidden" name="id" value="<?=$key['id']?>">
                        <input type="submit" value="Buy Now">
                    </form>
                </td>
            </tr>
        <?php }

        $con->close();
        ?>
    </table>
    </div>
</body>



    <style>
        .loginregisterbar{
            background-color: #ffffff;
            height: 45px;
        }
        .whitebar{
            background-color: #ffffff;
            height: 1000px;
        }
        .tabelbarang{
            border: 1px solid #00f;
            padding: 5px;x
            border-block-color: #000080;
        }
    </style>
</html>
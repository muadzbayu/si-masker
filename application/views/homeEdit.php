<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Edit Barang</h1>
            <?php foreach($produk->result() as $row){ ?>
            <form action="<?php echo base_url('home/updateBarang');?>" method="post" class="fform">
                <label for="nama_produk">Nama Barang</label>
                <input type="text" name="nama_produk" value="<?= $row->nama_produk;?>">
                <label for="harga_produk">Harga Barang</label>
                <input type="text" name="harga_produk" value="<?= $row->harga_produk;?>">
                <label for="jumlah_produk">Jumlah Barang</label>
                <input type="text" name="jumlah_produk" value="<?= $row->jumlah_produk;?>">
                <input type="hidden" name="id_produk" value="<?= $row->id_produk;?>">
                <button type="submit">Edit</button>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/css/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
	<link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico');?>" type="image/x-icon">
    <title>Document</title>
    <style>
        .kembali{
            display: inline-block;
            text-align:right;
            margin:0 15% 0 0;
            text-decoration:none;
            font-size:15px;
            color:blue;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <main class="cek_product" id="cek_product">
        <div class="container">
            <div class="row">
                <h2>Keranjang | <span style="color: gray"><?= $this->session->userdata('user');?></span></h2>
                <?php foreach($keranjangku as $row){ ?>
                    <div class="cart">
                        <img src="<?php echo base_url('assets/img/'.$row->nama_produk.'.jpg')?>" alt="Kunai">
                        <div class="cart-detail">
                            <h3><?php echo $row->nama_produk; ?></h3>
                        </div>
                        <div class="add-cart">	
                            <a href="<?= base_url('home/deleteCart/'.$row->id_produk);?>">Delete</a>
                        </div>
                    </div>
                    <?php } ?>
                <a class="kembali" href="<?= base_url('home');?>">Kembali<~</a>
            </div>
        </div>
	</main>
</body>
</html>
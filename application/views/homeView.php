<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<meta http-equiv="refresh" content="3">-->
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
	<title>Home | Perusahaan Ida</title>
</head>
<body>
	<!--section = display:block -->
	<section class="header" id="header">
		<a href="#" class="logo">IdaCorp</a>
		<span class="navigation"></span>
		<nav class="menu">
			<ul>
				<li><a href="#home">Home</a></li>
				<?php if($this->session->userdata('statusku') != 'Admin') {?>
				<li><a href="#product">Product</a></li>
				<?php }?>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
				<?php 
				if($this->session->userdata('status') != 'login'){
				?>
				<li><a href="<?php echo base_url('login');?>">Login</a></li>
				<?php }else{ ?>
					<li><a class="userProfile" onClick="show()" href="#"><?php echo $this->session->userdata('user') ?></a>
						<ul class="subMenu">
						<?php if($this->session->userdata('statusku') == 'Customer') {?>
							<li class="sub"><a href="<?php echo base_url('home/cart');?>">Cart</a></li>
						<?php } ?>
							<li class="sub"><a href="<?php echo base_url('home/keluar');?>">Logout</a></li>
						</ul>
					</li>
				<?php }
				?>
			</ul>
		</nav>
		
		<i class="bi-list"></i>
	</section>
		
		<section class="home" id="home">
			<div class="content">
				<h1>Kami Menyediakan Berbagai<br> Macam Masker Medis</h1>
				<div class="garis garis-orange"></div>
				<p>Tersedia Sensi Masker Black, Sensi Masker Duckbill dll. Tunggu Apalagi belilah sekarang
				</p>
				<a href="#product" class="btn btn-orange">Find Out More</a>
			</div>	
		</section>
		
		<?php if($this->session->userdata('statusku') != 'Admin') {?> 
		<section class="product" id="product">
			<div class="productContent">
				<h1>Many Products Available for You</h1>
				<p style="color:#c5c5c5;">see and buy our products make you cool</p>
				<a href="#cek_product" class="btn-white">Check it!</a>
			</div>	
		</section>
		<?php }?>
		
		<?php if($this->session->userdata('statusku') == 'Admin') {?>
		<main class="cekProductAdmin" id="cek_product">
			<div class="containerAdmin">
				<div class="rowAdmin">
					<div class="card">
						<form enctype="multipart/form-data" action="<?php echo base_url('home/upload') ?>" method="post" onsubmit="return checkSize(1048576);">
							<div class="card-header">
								<h2>Upload Gambar</h2>
							</div>
							
							<div class="card-footer">
								<label>Upload File Max 1 MB</label>
								<div class="custom-file mb-3">
									<input type="file" name="uploadedfile" class="custom-file-input" id="fileupload">
								</div>

								<button type="submit" class="btn-card">Unggah File <i class="fa fa-save"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="rowAdmin">
					<div class="card">
						<div class="card-header">
							<h2>File Gambar</h2>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<th>File Name</th>
										<th>Upload Date</th>
										<th>Type</th>
										<th>Size</th>
										<th>Aksi</th>
									</thead>
									<tbody>
										<?php
											if($handle = opendir('./assets/img/'))	
											{
												while(true==($file = readdir($handle)))
												{
													if($file!=="." && $file!=="..")
													{
														echo "<tr><td>$file</td>";
														echo "<td>".date("m/d/Y H:i",filemtime("assets/img/".$file)).'</td>';
														echo "<td>.".pathinfo("assets/img/".$file,PATHINFO_EXTENSION).'</td>';
														echo "<td>".round(filesize("assets/img/".$file)/1024).'KB</td>';
														echo "<td><a href='".base_url('home/delete/' .$file)."'>Delete</a></td></tr>";
													}
									
												}
												closedir($handle);
											}			
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="rowAdmin">
					<div class="card">
						<div class="card-header">
							<h2>Tabel Barang</h2>
						</div>
						<table>
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama Barang</th>
									<th>Harga Barang</th>
									<th>Jumlah Barang</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 0;
								foreach($produk as $row){
									$no++;?>
								<tr>
									<td><?php echo $no ?></td>
									<td><?php echo $row->nama_produk; ?></td>
									<td><?php echo $row->harga_produk; ?></td>
									<td><?php echo $row->jumlah_produk; ?></td>
									<td>
										<a href="<?php echo base_url('home/editBarang/'.$row->id_produk);?>">Edit</a>
										<span> | </span>
										<a href="<?php echo base_url('home/deleteBarang/'.$row->id_produk);?>">Delete</a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="rowAdmin">
					<div class="card">
						<h2>Tambah Barang</h2>
						<form class="fform" action="<?php echo base_url('home/tambah');?>" method="post">
							<label for="nama_produk">Nama Barang</label>
							<input type="text" name="nama_produk">
							<label for="harga_produk">Harga Barang</label>
							<input type="text" name="harga_produk">
							<label for="jumlah_produk">Jumlah Barang</label>
							<input type="text" name="jumlah_produk">
							<button type="submit">Tambah</button>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php }else{?>	
		
		<main class="cek_product" id="cek_product">
			<div class="container">
				<div class="row">
				<?php foreach($produk as $row){ ?>
					<div class="cart">
						<img src="<?php echo base_url('assets/img/'.$row->nama_produk.'.jpg')?>" alt="Kunai">
						<div class="cart-detail">
							<h3><?php echo $row->nama_produk; ?></h3>
							<div class="star">
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
								<div class="bi-star-fill"></div>
							</div>
							<p>Rp. <?php echo $row->harga_produk; ?>,-</p>
						</div>
						<div class="add-cart">	
							<a href="<?php echo base_url('home/addCart/'.$row->id_produk);?>">Add to Cart</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</main>
		<?php }?>			

		<section class="about" id="about">
			<div class="container">
				<div class="ta fc-white">
					<h2>About Us</h2>
					<p>My Blog</p>
				</div>
				<div class="garis garis-putih"></div>
				</div class="row">
					<p class="ta fs-12 m-3">Start Bootstrap was built on the idea that quality,<br>
						functional website templates and themes should be
						available to everyone.<br> Use our open source,
						free products, or support us by purchasing
						one of our premium products or services.
					</p>
				<div>
			</div>
		</section>

		<section class="contact" id="contact">
			<div class="contactContent">
				<div>
					<h2>Contact Us</h2>
					<p>My Contact</p>
				</div>
				<div class="garis garis-orange"></div>
				<div class="row-grid">
					<div class="col-grid">
						<div class="feature bg-bi"><i class="bi bi-whatsapp"></i></div>
						<h4>My Whatsapp</h5>
						<p class="fs-11">08123456789</p>
					</div>
					<div class="col-grid">
						<div class="feature bg-bi">
							<i class="bi bi-instagram"></i>
						</div>
							<h4>My Instagram</h4>
							<p class="fs-11">@UchihaStore</p>
					</div>
					<div class="col-grid">
						<div class="feature bg-bi">
							<i class="bi bi-facebook"></i>
						</div>
							<h4>My Facebook</h4>
							<p class="fs-11">Uchiha Store</p>
					</div>
					<div class="col-grid">
						<div class="feature bg-bi">
							<i class="bi bi-telephone"></i>
						</div>
							<h4>My Telephone</h4>
							<p class="fs-11">08122222222</p>
					</div>
				</div>
			</div>
		</section>

		<section class="footer">
			<div class="footer">
				<span>Copyright <strong>&copy;</strong> 2021 - Ida Kurnia</span>
			</div>
		</section>
</body>
<script>
	let aa = document.querySelector('.subMenu');
	const userProfile = document.querySelector('.userProfile');
	function show(){
		aa.classList.toggle('active');
	}
</script>
<script src="assets/js/script.js"></script>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script>
	  let menu = document.querySelector('.menu');
      $(".bi-list").click(function () {
      menu.classList.toggle('active');
      });

    </script>
</html>
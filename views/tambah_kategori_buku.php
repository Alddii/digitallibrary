<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Tambah Kategori Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=kategori_buku">Kategori Buku</a></li>
        <li class="breadcrumb-item active text-dark">Tambah Kategori Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="card-body">
                    <h5 class="card-title text-dark">Tambah Kategori Buku</h5>
                        <form action="./proses/proses_tambah_kategori_buku.php" method="post">
                            <div class="mb-3">
                            <label for="" class="form-label ">Nama Kategori Buku</label>
                            <input type="text" name="nama_kategori_buku" class="form-control mb-3" require placeholder="Masukan Kategori Buku">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
				</div>
			</div>
		</div>
	</div>
</section>
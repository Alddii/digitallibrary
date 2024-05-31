<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Tambah Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=buku">Buku</a></li>
        <li class="breadcrumb-item active text-dark">Tambah Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="card-body">
                    <h5 class="card-title text-dark">Tambah Buku</h5>
                        <form action="./proses/proses_tambah_buku.php" method="post">
                            <div class="mb-3">
                            <label for="" class="form-label ">Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control mb-3  " placeholder="Masukan Judul Buku" require>


                            <?php
								$sql = "SELECT * FROM kategoribuku";
								$query = $koneksi->query($sql);
								$data = $query->fetch_all(MYSQLI_ASSOC);
							?>
                            <label for="" class="form-label ">Kategori Buku</label>
                            <select name="kategori_buku" class="form-select" aria-label="Default select example" require>
                                <option selected>Pilih Kategori Buku</option>
                                <?php foreach ($data as $row): ?>
                                    <option value="<?php echo $row['KategoriID']; ?>">
                                    <?php echo $row['NamaKategori']; ?> </option>
                                <?php endforeach; ?>
                            </select>

                            <label for="" class="form-label ">Penulis</label>
                            <input type="text" name="penulis_buku" class="form-control mb-3" require placeholder="Masukan Penulis Buku">

                            <label for="" class="form-label ">Penerbit</label>
                            <input type="text" name="penerbit_buku" class="form-control mb-3" require placeholder="Masukan Penerbit Buku">

                            <label for="" class="form-label ">Tahun Terbit</label>
                            <input type="number" name="tahunterbit" class="form-control mb-3" require placeholder="Masukan Tahun Terbit Buku">

                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
				</div>
			</div>
		</div>
	</div>
</section>
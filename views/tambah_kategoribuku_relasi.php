<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1>Tambah Kategori Buku Relasi</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?halaman=kategoribuku_relasi">Kategori Buku Relasi</a></li>
        <li class="breadcrumb-item active">Tambah Kategori Buku Relasi</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="card-body">
                    <h5 class="card-title">Tambah Kategori Buku Relasi</h5>
                        <form action="./proses/proses_tambah_kategoribuku_relasi.php" method="post">
                            <div class="mb-3">

                            <?php
								$sql = "SELECT * FROM kategoribuku_relasi INNER JOIN buku ON kategoribuku_relasi.BukuID = buku.BukuID
                                INNER JOIN kategoribuku ON buku.KategoriID = kategoribuku.KategoriID";
								$query = $koneksi->query($sql);
								$dt = $query->fetch_all(MYSQLI_ASSOC);
							?>
                            
                            <?php
								$sql = "SELECT * FROM buku";
								$query = $koneksi->query($sql);
								$dt1 = $query->fetch_all(MYSQLI_ASSOC);
							?>

                            <label for="" class="form-label mb-3 ">Judul Buku</label>
                            <select name="buku" class="form-select mb-3" aria-label="Default select example" require>
                                <option selected>Pilih Buku</option>
                                <?php foreach ($dt1 as $row): ?>
                                    <option value="<?php echo $row['BukuID']; ?>">
                                    <?php echo $row['Judul']; ?> </option>
                                <?php endforeach; ?>
                            </select>

                            <?php
								$sql = "SELECT * FROM kategoribuku";
								$query = $koneksi->query($sql);
								$dt2 = $query->fetch_all(MYSQLI_ASSOC);
							?>

                            <label for="" class="form-label mb-3">Kategori Buku</label>
                            <select name="kategori" class="form-select mb-3" aria-label="Default select example" require>
                                <option selected>Pilih Kategori</option>
                                <?php foreach ($dt2 as $row): ?>
                                    <option value="<?php echo $row['KategoriID']; ?>">
                                    <?php echo $row['NamaKategori']; ?> </option>
                                <?php endforeach; ?>
                            </select>

                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
				</div>
			</div>
		</div>
	</div>
</section>
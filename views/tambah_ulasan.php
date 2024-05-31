<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Tambah Ulasan Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=ulasan">Ulasan Buku</a></li>
        <li class="breadcrumb-item active text-dark">Tambah Ulasan Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="card-body">
                    <h5 class="card-title text-dark">Tambah Ulasan Buku </h5>
                        <form action="./proses/proses_tambah_ulasan.php" method="post">
                            <div class="mb-3">

                            <?php
								$sql = "SELECT * FROM ulasan_buku INNER JOIN user ON ulasan_buku.UserID = user.UserID
                                INNER JOIN buku ON ulasan_buku.BukuID = buku.BukuID";
								$query = $koneksi->query($sql);
								$dt = $query->fetch_all(MYSQLI_ASSOC);
							?>
                            
                            <?php
								$sql = "SELECT * FROM user";
								$query = $koneksi->query($sql);
								$dt1 = $query->fetch_all(MYSQLI_ASSOC);
							?>

                            <label for="" class="form-label mb-3 ">Peminjam</label>
                            <select name="user" class="form-select mb-3" aria-label="Default select example" require>
                                <option selected>Pilih Peminjam</option>
                                <?php foreach ($dt1 as $row): ?>
                                    <option value="<?php echo $row['UserID']; ?>">
                                    <?php echo $row['Username']; ?> </option>
                                <?php endforeach; ?>
                            </select>

                            <?php
								$sql = "SELECT * FROM buku";
								$query = $koneksi->query($sql);
								$dt2 = $query->fetch_all(MYSQLI_ASSOC);
							?>

                            <label for="" class="form-label mb-3">Judul Buku</label>
                            <select name="buku" class="form-select mb-3" aria-label="Default select example" require>
                                <option selected>Pilih Judul Buku</option>
                                <?php foreach ($dt2 as $row): ?>
                                    <option value="<?php echo $row['BukuID']; ?>">
                                    <?php echo $row['Judul']; ?> </option>
                                <?php endforeach; ?>
                            </select>

                            <label for="" class="form-label ">Ulasan</label>
                            <textarea name="ulasan" class="form-control mb-3" id="exampleFormControlTextarea1" rows="3" require placeholder="Masukan Ulasan"></textarea>

                            <label for="" class="form-label ">Rating</label>
                            <input type="number" name="rating" class="form-control mb-3" require placeholder="Masukan Rating">

                            <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
				</div>
			</div>
		</div>
	</div>
</section>
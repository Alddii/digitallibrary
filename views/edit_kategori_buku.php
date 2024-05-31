<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Edit Kategori Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=kategori_buku">Kategori Buku</a></li>
        <li class="breadcrumb-item active text-dark">Edit Kategori Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="card-body">
                    <h5 class="card-title text-dark">Edit Kategori Buku</h5>
					<!--Form-->
                    <?php
                    $kategoriID = $_GET['id'];
                    $sql = "SELECT * FROM kategoribuku WHERE KategoriID = '$kategoriID'";
                    $query = $koneksi->query($sql);
                    $row = $query->fetch_assoc();
                    ?>
                    <form action="./proses/proses_edit_kategori_buku.php" method="post">
                        <div class="mb-3">
                        <label for="" class="mb-3">Kategori Buku</label>
                        <input type="hidden" name="kategori_id" value="<?php echo $row['KategoriID'];?>" >
                        <input type="text" name="kategori_buku" value="<?php echo $row['NamaKategori'];?>" class="form-control mb-3">
                        <button type="submit" class="btn btn-sm btn-success">Edit</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</section>
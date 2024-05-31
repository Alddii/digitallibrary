<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Kategori Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item active text-dark">Kategori Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="d-flex mt-3 mb-5 me-3 position-relative">
					<a href="index.php?halaman=tambah_kategori_buku" class="btn btn-sm btn-primary position-absolute top-0 end-0"><i class="bi bi-plus-lg"></i> Tambah</a>
				</div>
				<div class="card-body">

					<!--Table-->
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Kategori Buku</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * FROM kategoribuku";
								$query = $koneksi->query($sql);
								$data = $query->fetch_all(MYSQLI_ASSOC);
							?>
							<?php
							$no = 1;
							foreach ($data as $row):
							?>
							<tr>
								<th scope="row"><?php echo $no++ ?></th>
								<td><?php echo $row['NamaKategori']?></td>
								<td>
									<div class="d-flex">
										<a href="index.php?halaman=edit_kategori_buku&id=<?php echo $row['KategoriID'];?>" class="btn btn-sm me-3 btn-success"><i class="bi bi-pencil-square"></i></a>
										<a href="./proses/proses_hapus_kategori_buku.php?id=<?php echo $row['KategoriID'];?>" onclick="return confirm('Akan Dihapus!!')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
									</div>
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>

				</div>
			</div>
		</div>
	</div>
</section>
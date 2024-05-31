<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1>Kategori Buku Relasi</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item active">Kategori Buku Relasi</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="d-flex mt-3 mb-5 me-3 position-relative">
					<a href="index.php?halaman=tambah_kategoribuku_relasi" class="btn btn-sm btn-primary position-absolute top-0 end-0"><i class="bi bi-plus-lg"></i>Tambah</a>
				</div>
				<div class="card-body">

					<!--Table-->
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Judul Buku</th>
								<th scope="col">Jenis Kategori</th>
                                <th scope="col">Aksi</th>

							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * FROM kategoribuku_relasi INNER JOIN buku ON kategoribuku_relasi.BukuID = buku.BukuID
                                INNER JOIN kategoribuku ON buku.KategoriID = kategoribuku.KategoriID;";
								$query = $koneksi->query($sql);
								$data = $query->fetch_all(MYSQLI_ASSOC);
							?>
							<?php
							$no = 1;
							foreach ($data as $row):
							?>
							<tr>
								<th scope="row"><?php echo $no++ ?></th>
								<td><?php echo $row['Judul']?></td>
								<td><?php echo $row['NamaKategori']?></td>
								<td>
									<div class="d-flex">
										<a href="index.php?halaman=edit_kategoribuku_relasi&id=<?php echo $row['KategoriBukuID'];?>" class="btn btn-sm me-3 btn-success"><i class="bi bi-pencil-square"></i></a>
										<a href="./proses/proses_hapus_relasi.php?id=<?php echo $row['KategoriBukuID'];?>" onclick="return confirm('Akan Dihapus!!')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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
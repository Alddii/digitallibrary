<?php
	$db = new Database();
	$koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1>Edit Koleksi Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item "><a href="index.php?halaman=koleksi">Koleksi Buku</a></li>
        <li class="breadcrumb-item active">Edit Koleksi Buku </li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="card">
				<div class="card-body">
                    <h5 class="card-title">Edit Koleksi Buku</h5>
					<!--Form-->
                    
                    <?php
                    $koleksiID = $_GET['id'];
                    $sql = "SELECT * FROM koleksipribadi INNER JOIN user ON koleksipribadi.UserID = user.UserID INNER JOIN buku ON koleksipribadi.BukuID = buku.BukuID WHERE KoleksiID = '$koleksiID'";
                    $query = $koneksi->query($sql);
                    $row = $query->fetch_assoc();
                    ?>
                    
                    <form action="./proses/proses_edit_koleksi.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="koleksi_id" value="<?php echo $row['KoleksiID'];?>" >
                    
                    <?php
                    $sql_user = "SELECT * FROM user";
                    $query_user = $koneksi->query($sql_user);
                    $dt1 = $query_user->fetch_all(MYSQLI_ASSOC);
                    ?>
                    
                    <label for="" class="form-label">Peminjam</label>
                    <select name="peminjam" class="form-select mb-3" aria-label="Default select example">
                    <?php foreach ($dt1 as $user): ?>
                        <option value="<?php echo $user['UserID']; ?>" <?php echo ($user['UserID'] ==
                        $row['UserID']) ? 'selected' : ''; ?>>
                        <?php echo $user['Username']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                
                <?php
                $sql_buku = "SELECT * FROM buku";
                $query_buku = $koneksi->query($sql_buku);
                $dt2 = $query_buku->fetch_all(MYSQLI_ASSOC);
                ?>
                
                <label for="" class="form-label">Judul Buku</label>
                <select name="buku" class="form-select mb-3" aria-label="Default select example">
                <?php foreach ($dt2 as $buku): ?>
                    <option value="<?php echo $buku['BukuID']; ?>" <?php echo ($buku['BukuID'] == $row['BukuID']) ? 'selected' : ''; ?>>
                    <?php echo $buku['Judul']; ?>
                </option>
                <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
				</div>
			</div>
		</div>
	</div>
</section>
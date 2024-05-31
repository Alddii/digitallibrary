<?php
    $db = new Database();
    $koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1>Edit Kategori Buku Relasi</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?halaman=kategoribuku_relasi">Kategori Buku Relasi</a></li>
        <li class="breadcrumb-item active">Edit Kategori Buku Relasi</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Kategori Buku Relasi</h5>
                    <!--Form-->

                    <?php
                    $relasiID = $_GET['id'];

                    // Query untuk mendapatkan data Kategori Buku Relasi berdasarkan ID
                    $sql = "SELECT * FROM kategoribuku_relasi INNER JOIN buku ON kategoribuku_relasi.BukuID = buku.BukuID INNER JOIN kategoribuku ON buku.KategoriID = kategoribuku.KategoriID WHERE KategoriBukuID = '$relasiID'";
                    $query = $koneksi->query($sql);
                    $row = $query->fetch_assoc();

                    // Query untuk mendapatkan semua data kategori buku
                    $sql_kategori = "SELECT * FROM kategoribuku";
                    $query_kategori = $koneksi->query($sql_kategori);
                    $dt_kategori = $query_kategori->fetch_all(MYSQLI_ASSOC);

                    // Query untuk mendapatkan semua data buku
                    $sql_buku = "SELECT * FROM buku";
                    $query_buku = $koneksi->query($sql_buku);
                    $dt_buku = $query_buku->fetch_all(MYSQLI_ASSOC);
                    ?>
                    
                    <form action="./proses/proses_edit_kategoribuku_relasi.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="relasi_id" value="<?php echo $row['KategoriBukuID']; ?>" >

                            <!-- Menampilkan dropdown untuk memilih buku baru -->
                            <label for="" class="form-label">Pilih Buku Baru</label>
                            <select name="buku" class="form-select" aria-label="Default select example">
                                <!-- Menambahkan opsi untuk buku saat ini -->
                                <option value="<?php echo $row['BukuID']; ?>" selected><?php echo $row['Judul']; ?></option>
                                <!-- Menambahkan opsi untuk buku lainnya -->
                                <?php foreach ($dt_buku as $buku): ?>
                                    <?php if ($buku['BukuID'] != $row['BukuID']): ?>
                                        <option value="<?php echo $buku['BukuID']; ?>"> <?php echo $buku['Judul']; ?> </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>

                            
                            <!-- Menampilkan dropdown untuk memilih kategori buku baru -->
                            <label for="" class="form-label">Pilih Kategori Buku Baru</label>
                            <select name="kategori" class="form-select" aria-label="Default select example">
                                <?php foreach ($dt_kategori as $kategori): ?>
                                    <option value="<?php echo $kategori['KategoriID']; ?>" <?php echo ($kategori['KategoriID'] == $row['KategoriID']) ? 'selected' : ''; ?>>
                                    <?php echo $kategori['NamaKategori']; ?>
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

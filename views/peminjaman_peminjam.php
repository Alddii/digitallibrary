<?php
        $db = new Database();
        $koneksi = $db->connect();
    ?>

    <div class="pagetitle">
        <h1 class="text-dark">Peminjaman Buku</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
            <li class="breadcrumb-item active text-dark">Peminjaman Buku</li>
        </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                                <?php
                                    $sql = "SELECT * FROM buku INNER JOIN kategoribuku ON buku.KategoriID = kategoribuku.KategoriID";
                                    $query = $koneksi->query($sql); 
                                    $data = $query->fetch_all(MYSQLI_ASSOC);
                                ?>

                                <div class="row">
                                <?php
                                $no = 1;
                                foreach ($data as $row):
                                ?>
                                
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header bg-secondary mb-3">
                                                <h5 class="text-center text-light" style="color:navy"><?php echo $row['Judul'] ?></h5>
                                            </div>
                                            <div class="card-body">
                                                <ul style="list-style: none;">
                                                <li>Kategori : <?php echo $row['NamaKategori'] ?></li>
                                                <li>Penulis : <?php echo $row['Penulis'] ?></li>
                                                <li>Penerbit : <?php echo $row['Penerbit'] ?></li>
                                                <li>Tahun Terbit : <?php echo $row['TahunTerbit'] ?></li>
                                                <a href="index.php?halaman=tambah_peminjaman_peminjam&id_buku=<?php echo $row['BukuID'] ?>" class="btn btn-primary mt-3 ">Pinjam</a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                </div>
                </div>
            </div>
        </div>
    </section>
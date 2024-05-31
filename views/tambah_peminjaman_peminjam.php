<?php
        $db = new Database();
        $koneksi = $db->connect();
    ?>

    <div class="pagetitle">
        <h1>Tambah Peminjaman Buku</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?halaman=dashboard">Peminjaman Buku</a></li>
            <li class="breadcrumb-item active">Tambah Peminjaman Buku</li>
        </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $id = $_GET['id_buku'];
                $sqlbuku = "SELECT * FROM buku WHERE BukuID = '$id'";
                $querybuku = $koneksi->query($sqlbuku);
                $row = $querybuku->fetch_assoc();
                ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Peminjaman <?php echo $row['Judul'] ?></h5>
                        <form action="./proses/proses_tambah_peminjaman_peminjam.php" method="post">
                            <input type="hidden" class="form-control" name="id_buku" value="<?php echo $row['BukuID'] ?>">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Dipinjam</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_dipinjam">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal_dikembalikan">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button name="submit" type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </section>
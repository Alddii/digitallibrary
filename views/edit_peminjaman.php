<?php
    $db = new Database();
    $koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Edit Peminjaman Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=peminjaman">Peminjaman Buku</a></li>
        <li class="breadcrumb-item active text-dark">Edit Peminjaman Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Edit Peminjaman Buku</h5>
                    <!--Form-->
                    <?php
                        $peminjamanID = $_GET['id'];
                        $sql = "SELECT * FROM peminjaman WHERE PeminjamanID = '$peminjamanID'";
                        $query = $koneksi->query($sql);
                        $row = $query->fetch_assoc();
                    ?>
                    <form action="./proses/proses_edit_peminjaman.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="peminjaman_id" value="<?php echo $row['PeminjamanID'];?>" >

                            <label for="" class="form-label ">Peminjam</label>
                            <select name="peminjam" class="form-select" aria-label="Default select example">
                                <?php
                                    $sql_user = "SELECT * FROM user";
                                    $query_user = $koneksi->query($sql_user);
                                    $users = $query_user->fetch_all(MYSQLI_ASSOC);
                                    foreach ($users as $user) {
                                        $selected = ($user['UserID'] == $row['UserID']) ? 'selected' : '';
                                        echo "<option value='".$user['UserID']."' $selected>".$user['Username']."</option>";
                                    }
                                ?>
                            </select>

                            <label for="" class="form-label ">Buku</label>
                            <select name="buku" class="form-select" aria-label="Default select example">
                                <?php
                                    $sql_buku = "SELECT * FROM buku";
                                    $query_buku = $koneksi->query($sql_buku);
                                    $bukus = $query_buku->fetch_all(MYSQLI_ASSOC);
                                    foreach ($bukus as $buku) {
                                        $selected = ($buku['BukuID'] == $row['BukuID']) ? 'selected' : '';
                                        echo "<option value='".$buku['BukuID']."' $selected>".$buku['Judul']."</option>";
                                    }
                                ?>
                            </select>

                            <label for="" class="form-label ">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control mb-3" value="<?php echo $row['TanggalPeminjaman'];?>">

                            <label for="" class="form-label ">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_pengembalian" class="form-control mb-3" value="<?php echo $row['TanggalPengembalian'];?>">

                            <label for="" class="form-label ">Status</label>
                            <input type="text" name="status" class="form-control mb-3" value="<?php echo $row['StatusPeminjaman'];?>">

                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $db = new Database();
    $koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Edit Ulasan Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=Ulasan">Ulasan Buku</a></li>
        <li class="breadcrumb-item active text-dark">Edit Ulasan Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Edit Ulasan Buku</h5>
                    <!--Form-->
                    <?php
                        $ulasanID = $_GET['id'];
                        $sql = "SELECT * FROM Ulasan_buku WHERE UlasanID = '$ulasanID'";
                        $query = $koneksi->query($sql);
                        $row = $query->fetch_assoc();
                    ?>
                    <form action="./proses/proses_edit_ulasan.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="ulasan_id" value="<?php echo $row['UlasanID'];?>" >

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


                            <label for="" class="form-label ">Ulasan</label>
                            <textarea name="ulasan" class="form-control mb-3" id="exampleFormControlTextarea1" rows="3" require placeholder="Masukan Ulasan"><?php echo $row['Ulasan'];?></textarea>

                            <label for="" class="form-label ">Rating</label>
                            <input type="number" name="rating" class="form-control mb-3" value="<?php echo $row['Rating'];?>">

                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

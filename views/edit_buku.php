<?php
    $db = new Database();
    $koneksi = $db->connect();
?>

<div class="pagetitle">
    <h1 class="text-dark">Edit Buku</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=dashboard">Home</a></li>
        <li class="breadcrumb-item text-dark"><a href="index.php?halaman=buku">Buku</a></li>
        <li class="breadcrumb-item active text-dark">Edit Buku</li>
    </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-dark">Edit Buku</h5>
                    <!--Form-->
                    <?php
                    $bukuID = $_GET['id'];
                    $sql = "SELECT * FROM buku WHERE BukuID = '$bukuID'";
                    $query = $koneksi->query($sql);
                    $row = $query->fetch_assoc();
                    ?>
                    <form action="./proses/proses_edit_buku.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="buku_id" value="<?php echo $row['BukuID'];?>" >

                            <label for="" class="form-label ">Judul</label>
                            <input type="text" name="judul_buku" class="form-control mb-3" value="<?php echo $row['Judul'];?>">

                            <!-- Query untuk mendapatkan semua data kategori buku -->
                            <?php
                            $sql_kategori = "SELECT * FROM KategoriBuku";
                            $query_kategori = $koneksi->query($sql_kategori);
                            $data_kategori = $query_kategori->fetch_all(MYSQLI_ASSOC);
                            ?>

                            <label for="" class="form-label ">Kategori Buku</label>
                            <select name="kategori_buku" class="form-select" aria-label="Default select example">
                                <?php foreach ($data_kategori as $kategori): ?>
                                    <option value="<?php echo $kategori['KategoriID']; ?>" <?php echo ($kategori['KategoriID'] == $row['KategoriID']) ? 'selected' : ''; ?>>
                                    <?php echo $kategori['NamaKategori']; ?> </option>
                                <?php endforeach; ?>
                            </select>

                            <label for="" class="form-label ">Penulis</label>
                            <input type="text" name="penulis_buku" class="form-control mb-3" value="<?php echo $row['Penulis'];?>">

                            <label for="" class="form-label ">Penerbit</label>
                            <input type="text" name="penerbit_buku" class="form-control mb-3" value="<?php echo $row['Penerbit'];?>">

                            <label for="" class="form-label ">Tahun Terbit</label>
                            <input type="number" name="tahunterbit" class="form-control mb-3" value="<?php echo $row['TahunTerbit'];?>">

                            <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

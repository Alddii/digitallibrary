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
                
                <div class="card">
                    
                    <div class="card-body">

                        <!--Table-->
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Status</th>  
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $user = $_SESSION['UserID'];
                                    $sql = "SELECT * FROM peminjaman INNER JOIN user ON peminjaman.UserID = user.UserID
                                    INNER JOIN buku ON peminjaman.BukuID = buku.BukuID Where user.UserID = '$user'";
                                    $query = $koneksi->query($sql); 
                                    $data = $query->fetch_all(MYSQLI_ASSOC);
                                ?>
                                <?php
                                $no = 1;
                                foreach ($data as $row):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row['Username']?></td>
                                    <td><?php echo $row['Judul']?></td>
                                    <td><?php echo $row['TanggalPeminjaman']?></td>
                                    <td><?php echo $row['TanggalPengembalian']?></td>
                                    <td><?php echo $row['StatusPeminjaman']?></td>
                                    
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
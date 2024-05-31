<aside id="sidebar" class="sidebar ">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link text-dark" href="index.php?halaman=dashboard">
          <i class="bi bi-grid text-dark"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <?php
      $user = $_SESSION['Level'];
      if ($user == 'ADMINISTRATOR') :
        
      
      ?>
      <li class="nav-heading text-dark">Data Master</li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="index.php?halaman=buku">
        <i class="bi bi-book text-dark"></i>
          <span>Buku</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark" href="index.php?halaman=kategori_buku">
          <i class="bi bi-archive text-dark"></i>
          <span>Kategori Buku</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark" href="index.php?halaman=peminjaman">
        <i class="bi bi-person text-dark"></i>
          <span>Peminjaman</span>
        </a>
      </li>
    
<?php
endif
?>
 <?php
      $user = $_SESSION['Level'];
      if ($user == 'PEMINJAM') :
        
      
      ?>
      <li class="nav-heading ">Data Master</li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="index.php?halaman=koleksi">
        <i class="bi bi-collection text-dark"></i>
          <span>Koleksi Pribadi</span>
        </a>
      </li>

      

      <li class="nav-item text-dark">
        <a class="nav-link text-dark" href="index.php?halaman=peminjaman_peminjam">
        <i class="bi bi-person text-dark"></i>
          <span>Peminjaman</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link text-dark" href="index.php?halaman=ulasan">
        <i class="bi bi-bar-chart text-dark"></i>
          <span>Ulasan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-dark" href="index.php?halaman=history_peminjaman">
        <i class="bi bi-clock-history text-dark"></i>
          <span>History Peminjaman</span>
        </a>
      </li>
<?php
endif
?>
    </ul>

  </aside>
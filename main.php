<!-- SideBar & Content -->
<div id="layoutSidenav">
  <!-- Sidebar -->
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <?= kategori($kategori_id) ?>
        </div>
      </div>
    </nav>
  </div>
  <!-- End Sidebar -->

  <!-- Content -->
  <div id="layoutSidenav_content">
    <main>
      <div class="container">
        <!-- Banner -->
        <div class="" id="slides2">
          <?php
          $query_banner = mysqli_query($con, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");

          while ($row = mysqli_fetch_assoc($query_banner)) : ?>
            <a href="<?= BASE_URL . $row['link'] ?>">
              <img src="<?= BASE_URL ?>assets/img/slide/<?= $row['gambar'] ?>" style="width: 100%">
            </a>
          <?php endwhile ?>
          <a href="#" class="slidesjs-previous slidesjs-navigation mb-3"><i class="icon-chevron-left"></i></a>
          <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right"></i></a>
        </div>
        <!-- End Banner -->

        <!-- Content Barang -->
        <div class="card-columns">
          <?php
          if ($kategori_id) {
            $query = mysqli_query($con, "SELECT * FROM ebook WHERE status='on' AND kategori_id='$kategori_id' ORDER BY rand() DESC");
          } else {
            $query = mysqli_query($con, "SELECT * FROM ebook WHERE status='on' ORDER BY rand() ASC");
          }

          while ($row = mysqli_fetch_assoc($query)) :
          ?>
            <div class="card card-shadow mb-3">
              <a href="<?= BASE_URL ?>index.php?page=detail&ebook_id=<?= $row['ebook_id'] ?>">
                <img class="card-img-top img-content" src="<?= BASE_URL ?>assets/img/ebook/<?= $row['gambar'] ?>" alt="Card image cap">
              </a>
              <div class="card-body">
                <h6 class="card-title"><?= $row['nama_ebook'] ?></h6>
                <h6 class="card-text text-danger"><?= rupiah($row['harga']) ?></h6>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-outline-primary col">
                <i class="fas fa-cart-plus"></i> Keranjang
                </a>
              </div>
            </div>
          <?php
          endwhile;
          ?>
        </div>
        <!-- Content Barang -->
      </div>
    </main>
    <!-- Footer -->
    <?php
    require_once("footer.php");
    ?>
    <!-- End Footer -->
  </div>
  <!-- End Content -->

</div>
<!-- End SideBar & Content -->
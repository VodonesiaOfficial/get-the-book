<div class="mt-3">
  <div class="row">
    <div class="col-lg-6 col-sm-6">
      <h2><i class="fas fa-box"></i> Data EBook</h2>
    </div>
    <div class="col-lg-6 col-sm-6">
      <a href="<?= BASE_URL . "index.php?page=my_profile&module=ebook&action=form" ?>" class="btn btn-primary mb-4 float-right">Tambah Data EBook</a>
    </div>
  </div>
</div>

<?php
# JOIN
$query_ebook = mysqli_query($con, "SELECT ebook.*, kategori.kategori FROM ebook JOIN kategori ON ebook.kategori_id=kategori.kategori_id ORDER BY nama_ebook ASC");

if (mysqli_num_rows($query_ebook) == 0) {
  echo "<h3>Tidak Ada Data</h3>";
} else {
?>

  <div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>ebook</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Kategori</th>
              <th>Nama E-Book</th>
              <th>Penulis</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($query_ebook)) :
            ?>
              <tr>
                <td><?= $no ?></td>
                <td><?= $data['kategori'] ?></td>
                <td><?= $data['nama_ebook'] ?></td>
                <td><?= $data['penulis'] ?></td>
                <td><?= rupiah($data['harga']) ?></td>
                <td><?= $data['status'] ?></td>
                <td>
                  <a href="<?= BASE_URL . "index.php?page=my_profile&module=ebook&action=form&ebook_id=$data[ebook_id]" ?>" class="btn btn-sm btn-warning">Edit</a>
                </td>
              </tr>
            <?php
              $no++;
            endwhile;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php
}
?>
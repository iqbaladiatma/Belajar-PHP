<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "db_keuangan");

// Cek koneksi
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses tambah transaksi
if (isset($_POST['tambah'])) {
  $tanggal = $_POST['tanggal'];
  $keterangan = $_POST['keterangan'];
  $jumlah = $_POST['jumlah'];
  $tipe = $_POST['tipe'];

  mysqli_query($conn, "INSERT INTO transaksi (tanggal, keterangan, jumlah, tipe) 
                        VALUES ('$tanggal', '$keterangan', '$jumlah', '$tipe')");

  header("location: index.php");
}

// Proses hapus transaksi
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM transaksi WHERE id = '$id'");
  header("location: index.php");
}

// Proses edit transaksi
if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $tanggal = $_POST['tanggal'];
  $keterangan = $_POST['keterangan'];
  $jumlah = $_POST['jumlah'];
  $tipe = $_POST['tipe'];

  mysqli_query($conn, "UPDATE transaksi SET 
                        tanggal = '$tanggal',
                        keterangan = '$keterangan',
                        jumlah = '$jumlah',
                        tipe = '$tipe'
                        WHERE id = '$id'");

  header("location: index.php");
}

// Ambil data untuk form edit
$tanggal_edit = '';
$keterangan_edit = '';
$jumlah_edit = '';
$tipe_edit = '';
$id_edit = '';

if (isset($_GET['edit'])) {
  $id_edit = $_GET['edit'];
  $query_edit = mysqli_query($conn, "SELECT * FROM transaksi WHERE id = '$id_edit'");
  $row_edit = mysqli_fetch_array($query_edit);

  $tanggal_edit = $row_edit['tanggal'];
  $keterangan_edit = $row_edit['keterangan'];
  $jumlah_edit = $row_edit['jumlah'];
  $tipe_edit = $row_edit['tipe'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Keuangan Pribadi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>

<body class="bg-light">

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Manajemen Keuangan Pribadi</h4>
          </div>
          <div class="card-body">
            <!-- Form Tambah Transaksi -->
            <form method="POST" class="mb-4">
              <div class="row">
                <div class="col-md-3">
                  <input type="text" name="tanggal" class="form-control" placeholder="Tanggal" required>
                </div>
                <div class="col-md-3">
                  <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" required>
                </div>
                <div class="col-md-2">
                  <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required>
                </div>
                <div class="col-md-2">
                  <select name="tipe" class="form-control" required>
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <button type="submit" name="tambah" class="btn btn-success w-100">
                    <i class="bi bi-plus-circle"></i> Tambah
                  </button>
                </div>
              </div>
            </form>

            <!-- Tabel Transaksi -->
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="table-primary">
                  <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
                  $total_pemasukan = 0;
                  $total_pengeluaran = 0;

                  while ($row = mysqli_fetch_array($query)) {
                    if ($row['tipe'] == 'Pemasukan') {
                      $total_pemasukan += $row['jumlah'];
                    } else {
                      $total_pengeluaran += $row['jumlah'];
                    }
                  ?>
                    <tr>
                      <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                      <td><?= $row['keterangan'] ?></td>
                      <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                      <td>
                        <span class="badge bg-<?= ($row['tipe'] == 'Pemasukan') ? 'success' : 'danger' ?>">
                          <?= $row['tipe'] ?>
                        </span>
                      </td>
                      <td>
                        <a href="index.php?edit=<?= $row['id'] ?>"
                          class="btn btn-warning btn-sm"
                          data-bs-toggle="modal"
                          data-bs-target="#editModal">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <a href="index.php?hapus=<?= $row['id'] ?>"
                          class="btn btn-danger btn-sm"
                          onclick="return confirm('Yakin ingin menghapus data ini?')">
                          <i class="bi bi-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot class="table-primary">
                  <tr>
                    <th colspan="2">Total</th>
                    <th>Pemasukan: Rp <?= number_format($total_pemasukan, 0, ',', '.') ?></th>
                    <th>Pengeluaran: Rp <?= number_format($total_pengeluaran, 0, ',', '.') ?></th>
                    <th>Saldo: Rp <?= number_format($total_pemasukan - $total_pengeluaran, 0, ',', '.') ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Setelah card-header, tambahkan modal edit -->
  <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form method="POST">
            <input type="hidden" name="id" value="<?= $id_edit ?>">
            <div class="mb-3">
              <label class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control" value="<?= $tanggal_edit ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Keterangan</label>
              <input type="text" name="keterangan" class="form-control" value="<?= $keterangan_edit ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" name="jumlah" class="form-control" value="<?= $jumlah_edit ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Tipe</label>
              <select name="tipe" class="form-control" required>
                <option value="Pemasukan" <?= ($tipe_edit == 'Pemasukan') ? 'selected' : '' ?>>Pemasukan</option>
                <option value="Pengeluaran" <?= ($tipe_edit == 'Pengeluaran') ? 'selected' : '' ?>>Pengeluaran</option>
              </select>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    <?php if (isset($_GET['edit'])) { ?>
      document.addEventListener('DOMContentLoaded', function() {
        var editModal = new bootstrap.Modal(document.getElementById('editModal'));
        editModal.show();
      });
    <?php } ?>
  </script>
</body>

</html>
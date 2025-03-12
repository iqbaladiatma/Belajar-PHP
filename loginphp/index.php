<?php
require 'db_connect.php'; // Menggunakan require untuk memastikan file koneksi ada

$message = ""; // Variabel untuk menyimpan pesan sukses atau error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password); // "sss" berarti tiga string

    if ($stmt->execute()) {
        $message = "Registrasi berhasil!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi Pengguna</title>
</head>
<body>
    <h2>Form Registrasi Pengguna</h2>

    <?php if ($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Kata Sandi:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Daftar">
    </form>
</body>
</html>
<!-- untuk nanti -->
<!-- // Create
if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";
    mysqli_query($conn, $sql);
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tasks WHERE id = $id";
    mysqli_query($conn, $sql);
}

// Update status
if (isset($_GET['complete'])) {
    $id = $_GET['complete'];
    $sql = "UPDATE tasks SET status = 1 WHERE id = $id";
    mysqli_query($conn, $sql);
} -->
    <!--  <!-- Read/Display -->
    <ul>
    <?php
    $sql = "SELECT * FROM tasks ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'] ? 'completed' : '';
        echo "<li class='$status'>";
        echo $row['task'];
        echo " <a href='?complete=" . $row['id'] . "'>[Selesai]</a>";
        echo " <a href='?delete=" . $row['id'] . "' onclick='return confirm(\"Yakin hapus?\")'>[Hapus]</a>";
        echo "</li>";
    }
    ?>
    </ul> -->

    <!-- nanti  <style>
        .completed { text-decoration: line-through; color: gray; }
    </style>-->

    <!-- ini juga mysqli_query($conn, $sql_create); // Buat tabel jika belum ada (jalankan sekali saja)
$sql_create = "CREATE TABLE IF NOT EXISTS todo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status TINYINT DEFAULT 0
)"; -->
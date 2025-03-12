<?php
include 'conn.php';

if (isset($_GET['delete_all'])) {
    $sql = "DELETE FROM tb_todo";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tb_todo WHERE id = $id";
    mysqli_query($conn, $sql);
}


$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tb_todo WHERE task LIKE '%$search%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM tb_todo ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-400 via-pink-500 to-red-500">
    <div class="container mx-auto p-8 bg-white rounded-xl shadow-2xl max-w-4xl">
        <div class="flex justify-between mb-6">
            <a href="tambah.php">
                <button class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:-translate-y-1">
                    Tambah Pekerjaan
                </button>
            </a>
            <a href="index.php?delete_all=true" onclick="return confirm('Yakin ingin menghapus semua task?')">
                <button class="bg-gradient-to-r from-red-500 to-pink-600 text-white px-6 py-3 rounded-lg shadow-lg hover:from-red-600 hover:to-pink-700 transition duration-300 transform hover:-translate-y-1">
                    Delete All Tasks
                </button>
            </a>
        </div>
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8">TODO List</h1>

        <!-- Form Pencarian -->
        <form method="GET" class="flex justify-center mb-6">
            <input type="text" name="search" placeholder="Cari Pekerjaan" value="<?php echo $search; ?>" class="border border-gray-300 rounded-l-lg px-4 py-3 w-full max-w-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-r-lg hover:bg-blue-600 transition duration-300">Cari</button>
        </form>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse shadow-lg">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-700 to-gray-800 text-white">
                        <th class="px-6 py-4 text-left font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Pekerjaan</th>
                        <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && !empty($data)) : ?>
                        <?php $nomor = 1; ?>
                        <?php foreach ($data as $index) : ?>
                            <tr class="hover:bg-gray-100 transition duration-200">
                                <td class="border px-6 py-4"><?php echo $nomor; ?></td>
                                <td class="border px-6 py-4"><?php echo $index['task']; ?></td>
                                <td class="border px-6 py-4">
                                    <a href="edit.php?id=<?php echo $index['id']; ?>">
                                        <button id="edit" class="bg-teal-300 text-white px-4 py-2 rounded-lg hover:bg-teal-400 transition duration-300 transform hover:-translate-y-1">
                                            Edit
                                        </button>
                                    </a>
                                    <a href="index.php?delete=<?php echo $index['id']; ?>&search=<?php echo $search; ?>" onclick="return confirm('Yakin ingin menghapus?')">
                                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300 transform hover:-translate-y-1">
                                            Hapus
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php $nomor++; ?>  
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center py-6 text-gray-500">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
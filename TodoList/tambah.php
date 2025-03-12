<?php
include 'conn.php';

// if ini optional
if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO tb_todo (task) VALUES ('$task')";
    mysqli_query($conn, $sql);
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah TODO</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-400 via-pink-500 to-red-500">
    <div class="container mx-auto p-8 bg-white rounded-xl shadow-2xl max-w-lg">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8">Tambah Pekerjaan</h1>

        <form method="POST" autocomplete="off" class="flex flex-col items-center">
            <input type="text" name="task" placeholder="Tambah Pekerjaan" required class="border border-gray-300 rounded-lg px-4 py-3 mb-6 w-full max-w-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="submit" name="submit" value="Tambah" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:from-blue-600 hover:to-indigo-700 transition duration-300 transform hover:-translate-y-1">
        </form>

        <div class="mt-6 text-center">
            <a href="index.php">
                <button class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 py-3 rounded-lg shadow-lg hover:from-gray-600 hover:to-gray-700 transition duration-300 transform hover:-translate-y-1">
                    Kembali
                </button>
            </a>
        </div>
    </div>
</body>
</html>
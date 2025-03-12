<?php
include 'conn.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $task = $_POST['task'];
    $sql = "UPDATE tb_todo SET task = '$task' WHERE id = $id";
    mysqli_query($conn, $sql);
    header("Location: index.php"); 
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_todo WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit TODO</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-400 via-pink-500 to-red-500">
    <div class="container mx-auto p-8 bg-white rounded-xl shadow-2xl max-w-lg">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8">Edit Pekerjaan</h1>

        <form method="POST" autocomplete="off" class="flex flex-col items-center">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="text" name="task" value="<?php echo $data['task']; ?>" required class="border border-gray-300 rounded-lg px-4 py-3 mb-6 w-full max-w-md focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="submit" name="edit" value="Update" class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-6 py-3 rounded-lg shadow-lg hover:from-green-600 hover:to-teal-700 transition duration-300 transform hover:-translate-y-1">
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="calculator">
        <h2>Kalkulator PHP</h2>
        <form method="post">
            <input type="number" name="num1" placeholder="Masukkan Angka ke 1" required>
            <select name="operation">
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="kali">×</option>
                <option value="bagi">÷</option>
            </select>
            <input type="number" name="num2" placeholder="Masukkan Angka ke 2" required>
            <button type="submit" name="hitung">Hitung</button>
        </form>

        <?php
        if (isset($_POST['hitung'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = null;

            switch ($operation) {
                case 'tambah':
                    $result = $num1 + $num2;
                    break;
                case 'kurang':
                    $result = $num1 - $num2;
                    break;
                case 'kali':
                    $result = $num1 * $num2;
                    break;
                case 'bagi':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "ora iso dibagi karo 0!";
                    }
                    break;
                default:
                    $result = "Ngga valid! Mass";
                    break;
            }

            echo "<div class='result'>Hasil: $result</div>";
        }
        ?>
    </div>
</body>

</html>
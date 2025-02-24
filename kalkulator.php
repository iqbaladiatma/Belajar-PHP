<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            font-size: 1.2em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <form method="post">
            <input type="number" name="num1" placeholder="Angka pertama" required>
            <select name="operation">
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="kali">×</option>
                <option value="bagi">÷</option>
            </select>
            <input type="number" name="num2" placeholder="Angka kedua" required>
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
                        $result = "Tidak bisa dibagi dengan 0!";
                    }
                    break;
                default:
                    $result = "Operasi tidak valid!";
                    break;
            }

            echo "<div class='result'>Hasil: $result</div>";
        }
        ?>
    </div>
</body>
</html>
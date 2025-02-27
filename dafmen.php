<?php
$menu_makanan = [
    ["nama" => "Nasi Goreng", "harga" => 15000, "kategori" => "Makanan Berat"],
    ["nama" => "Mie Goreng", "harga" => 12000, "kategori" => "Makanan Berat"],
    ["nama" => "Es Teh", "harga" => 5000, "kategori" => "Minuman"],
    ["nama" => "Es Jeruk", "harga" => 7000, "kategori" => "Minuman"],
    ["nama" => "Pisang Goreng", "harga" => 8000, "kategori" => "Camilan"]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Makanan Resto Sederhana</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
</head>
<body>

<h2 class="text-2xl font-bold mb-4 text-center">Menu Makanan</h2>
<table class="w-1/2 border-collapse my-5 mx-auto">
    <thead>
        <tr class="bg-gray-300">
            <th class="border p-2 text-left">Makanan</th>
            <th class="border p-2 text-left">Harga</th>
            <th class="border p-2 text-left">Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($menu_makanan as $index => $item): ?>
        <tr>
            <td class="border p-2 text-left"><?php echo $item['nama']; ?></td>
            <td class="border p-2 text-left">Rp <?php echo ($item['harga']); ?></td>
            <td class="border p-2 text-left"><?php echo $item['kategori']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
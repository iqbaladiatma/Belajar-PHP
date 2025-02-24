<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Calculator</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex justify-center items-center min-h-screen bg-gray-100">
  <div class="bg-white p-6 rounded-lg shadow-lg w-80">
    <h1 class="text-2xl font-bold mb-4 text-center">Calculator</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="text"
        name="display"
        class="w-full text-center py-3 mb-4 border rounded"
        value="<?php if (isset($_POST['display'])) echo $_POST['display']; ?>"
        readonly>
      <div class="grid grid-cols-4 gap-3">
        <!-- Row 1 -->
        <input type="submit"
          name="btn"
          value="1"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="2"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="3"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="+"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">

        <!-- Row 2 -->
        <input type="submit"
          name="btn"
          value="4"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="5"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="6"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="-"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">

        <!-- Row 3 -->
        <input type="submit"
          name="btn"
          value="7"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="8"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="9"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="*"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">

        <!-- Row 4 -->
        <input type="submit"
          name="btn"
          value="0"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="C"
          class="bg-red-500 text-white p-3 rounded hover:bg-red-600">
        <input type="submit"
          name="btn"
          value="/"
          class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600">
        <input type="submit"
          name="btn"
          value="="
          class="bg-green-500 text-white p-3 rounded hover:bg-green-600">
      </div>
    </form>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $display = '';
    $btn = $_POST['btn'];

    if ($btn == '1' || $btn == '2' || $btn == '3' || $btn == '4' || $btn == '5' || $btn == '6' || $btn == '7' || $btn == '8' || $btn == '9' || $btn == '0' || $btn == '+' || $btn == '-' || $btn == '*' || $btn == '/') {
      $display = $_POST['display'] . $btn;
    } elseif ($btn == '=') {
      try {
        $display = eval($_POST['display']);
      } catch (Exception $e) {
        $display = "Error";
      }
    } elseif ($btn == 'C') {
      $display = '';
    }

    // Update the display value  
    echo "<script>  
            document.getElementsByName('display')[0].value = '$display';  
        </script>";
  }
  ?>
</body>

</html>
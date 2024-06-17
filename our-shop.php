<?php
session_start();
include_once 'Admin/db.php';

// Fetch all items
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

  <?php include 'navbar.php'; ?>

  <section class="mt-5">
    <div class="container mx-auto">
      <h1 class="text-3xl text-center my-4 font-semibold">Our Menu</h1>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="card bg-white p-6 border shadow-md rounded-md">
            <img src="Admin/uploads/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['recipe_name']) ?>"
              class="w-full h-48 object-cover rounded-t-md">
            <div class="mt-4">
              <h2 class="text-xl font-semibold"><?= htmlspecialchars($row['recipe_name']) ?></h2>
              <p class="text-gray-700 mt-2"><?= htmlspecialchars($row['details']) ?></p>
              <p class="text-lg font-bold mt-2">$<?= number_format($row['price'], 2) ?></p>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>

</body>

</html>
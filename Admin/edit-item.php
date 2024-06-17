<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
include_once 'db.php';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "Invalid request.";
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Item not found.";
    header("Location: index.php");
    exit;
}

$item = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section class="mt-5">
        <h1 class="text-3xl text-center my-4 font-semibold">Edit Item</h1>
    </section>

    <section class="m-10 p-10 border-2 bg-[#F3F3F3]">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="update-item.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <div>
                <label class="mb-4" for="recipe_name">Recipe Name*</label>
                <br>
                <input type="text" name="recipe_name" value="<?php echo $item['recipe_name']; ?>"
                    class="mt-4 input-success w-full border p-4" required />
            </div>

            <div class="flex gap-4 mt-4 w-full">
                <div class="w-full">
                    <label class="mb-4" for="category">Category*</label>
                    <br>
                    <input type="text" name="category" value="<?php echo $item['category']; ?>"
                        class="mt-4 input-success w-full border p-4" required />
                </div>

                <div class="w-full">
                    <label class="mb-4" for="price">Price*</label>
                    <br>
                    <input type="text" name="price" value="<?php echo $item['price']; ?>"
                        class="mt-4 input-success w-full border p-4" required />
                </div>
            </div>

            <div class="mt-4 w-full">
                <label class="mb-4" for="details">Recipe Details*</label>
                <br>
                <textarea name="details" class="mt-4 input-success w-full border p-4 pb-20"
                    required><?php echo $item['details']; ?></textarea>
            </div>

            <div class="mt-4 w-full">
                <label class="mb-4" for="image">Image*</label>
                <br>
                <input type="file" name="image" class="mt-4 input-success w-full border p-4" />
                <img src="uploads/<?php echo $item['image']; ?>" alt="<?php echo $item['recipe_name']; ?>"
                    class="w-20 h-20 object-cover mt-4">
                <input type="hidden" name="current_image" value="<?php echo $item['image']; ?>">
            </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" name="submit" class="btn bg-[#B58130] text-white">Update Item <i
                        class="fas fa-utensils"></i></button>
            </div>
        </form>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>
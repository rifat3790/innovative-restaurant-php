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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipe_name = $_POST['recipe_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Debugging output
    echo "Debug: target_file = $target_file <br>";

    // Check if file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $_SESSION['error'] = "File is not an image.";
        echo $_SESSION['error'];
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        $_SESSION['error'] = "Sorry, file already exists.";
        echo $_SESSION['error'];
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        $uploadOk = 0;
        $_SESSION['error'] = "Sorry, your file is too large.";
        echo $_SESSION['error'];
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $uploadOk = 0;
        $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo $_SESSION['error'];
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['error'] = "Sorry, your file was not uploaded.";
        echo $_SESSION['error'];
    } else {
        // More debugging output
        echo "Debug: tmp_name = " . $_FILES["image"]["tmp_name"] . "<br>";
        echo "Debug: target_file = $target_file <br>";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO items (recipe_name, category, price, details, image) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdss", $recipe_name, $category, $price, $details, $image);

            if ($stmt->execute()) {
                $_SESSION['success'] = "New item added successfully.";
                echo $_SESSION['success'];
            } else {
                $_SESSION['error'] = "Error: " . $stmt->error;
                echo $_SESSION['error'];
            }
            $stmt->close();
        } else {
            $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            echo $_SESSION['error'];
        }
    }
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include 'navbar.php'; ?>

    <section class="mt-5">
        <h1 class="text-3xl text-center my-4 font-semibold">Add New Item</h1>
    </section>

    <section class="m-10 p-10 border-2 bg-[#F3F3F3]">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="add-item.php" method="POST" enctype="multipart/form-data">
            <div>
                <label class="mb-4" for="recipe_name">Recipe Name*</label>
                <br>
                <input type="text" name="recipe_name" placeholder="Recipe Name"
                    class="mt-4 input-success w-full border p-4" required />
            </div>

            <div class="flex gap-4 mt-4 w-full">
                <div class="w-full">
                    <label class="mb-4" for="category">Category*</label>
                    <br>
                    <input type="text" name="category" placeholder="Category"
                        class="mt-4 input-success w-full border p-4" required />
                </div>

                <div class="w-full">
                    <label class="mb-4" for="price">Price*</label>
                    <br>
                    <input type="text" name="price" placeholder="Price" class="mt-4 input-success w-full border p-4"
                        required />
                </div>
            </div>

            <div class="mt-4 w-full">
                <label class="mb-4" for="details">Recipe Details*</label>
                <br>
                <textarea name="details" class="mt-4 input-success w-full border p-4 pb-20" placeholder="Recipe Details"
                    required></textarea>
            </div>

            <div class="mt-4 w-full">
                <label class="mb-4" for="image">Image*</label>
                <br>
                <input type="file" name="image" class="mt-4 input-success w-full border p-4" required />
            </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" name="submit" class="btn bg-[#B58130] text-white">Add Item <i
                        class="fas fa-utensils"></i></button>
            </div>
        </form>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>
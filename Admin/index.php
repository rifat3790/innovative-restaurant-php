<?php
session_start();
include_once 'db.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if (isset($_SESSION['success'])) {
    $success_message = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'navbar.php'; ?>
    <section class="mt-5">
        <h1 class="text-3xl text-center my-4 font-semibold">Admin Dashboard</h1>
    </section>
    <section class="m-10 p-10 border-2 bg-[#F3F3F3]">
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <div class="alert alert-error">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <div class="flex justify-between mb-5">
            <h2 class="text-2xl">Items List</h2>
            <a href="add-item.php" class="btn btn-primary">Add New Item</a>
        </div>
        <div>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Recipe Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['recipe_name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['details']; ?></td>
                                <td><img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['recipe_name']; ?>"
                                        class="w-20 h-20 object-cover"></td>
                                <td>
                                    <a href="edit-item.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="delete-item.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No items found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>

</html>
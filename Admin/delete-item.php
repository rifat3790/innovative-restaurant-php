<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}
include_once 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch item to delete image
    $stmt = $conn->prepare("SELECT image FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $item = $result->fetch_assoc();
    $stmt->close();

    // Delete item
    $stmt = $conn->prepare("DELETE FROM items WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete image file
        if ($item && $item['image'] && file_exists("uploads/" . $item['image'])) {
            unlink("uploads/" . $item['image']);
        }

        $_SESSION['success'] = "Item deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete item.";
    }

    $stmt->close();
}

header("Location: index.php");
exit;
?>
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

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $recipe_name = $_POST['recipe_name'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $details = $_POST['details'];

  // Check if all required fields are filled
  if (empty($recipe_name) || empty($category) || empty($price) || empty($details)) {
    $_SESSION['error'] = "All fields are required.";
    header("Location: edit-item.php?id=$id");
    exit;
  }

  // Check if image is uploaded
  if ($_FILES['image']['size'] > 0) {
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
      $_SESSION['error'] = "File is not an image.";
      header("Location: edit-item.php?id=$id");
      exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
      $_SESSION['error'] = "Sorry, file already exists.";
      header("Location: edit-item.php?id=$id");
      exit;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
      $_SESSION['error'] = "Sorry, your file is too large.";
      header("Location: edit-item.php?id=$id");
      exit;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
      $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      header("Location: edit-item.php?id=$id");
      exit;
    }

    // Upload image
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $_SESSION['error'] = "Sorry, there was an error uploading your file.";
      header("Location: edit-item.php?id=$id");
      exit;
    }
  } else {
    // If no new image is uploaded, retain the existing image
    $stmt_img = $conn->prepare("SELECT image FROM items WHERE id = ?");
    $stmt_img->bind_param("i", $id);
    $stmt_img->execute();
    $result_img = $stmt_img->get_result();
    $row_img = $result_img->fetch_assoc();
    $image = $row_img['image'];
  }

  // Update item details in database
  $stmt = $conn->prepare("UPDATE items SET recipe_name = ?, category = ?, price = ?, details = ?, image = ? WHERE id = ?");
  $stmt->bind_param("ssdssi", $recipe_name, $category, $price, $details, $image, $id);

  if ($stmt->execute()) {
    $_SESSION['success'] = "Item updated successfully.";
    header("Location: index.php");
    exit;
  } else {
    $_SESSION['error'] = "Error updating item: " . $stmt->error;
    header("Location: edit-item.php?id=$id");
    exit;
  }

  $stmt->close();
  $conn->close();
} else {
  // If accessed via GET or other method, redirect with error
  $_SESSION['error'] = "Invalid request.";
  header("Location: index.php");
  exit;
}
?>
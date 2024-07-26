<?php
include 'db_connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$account_ID = $_SESSION['account_ID'];
$product_id = $_POST['product_id'] ?? null;

if ($product_id === null) {
    die('Invalid product ID');
}

$quantity = 1; // Default quantity to add

// Check if the product exists
$sql_check_product = "SELECT product_ID FROM product_info WHERE product_ID = ?";
$stmt_check_product = $conn->prepare($sql_check_product);
$stmt_check_product->bind_param("i", $product_id);
$stmt_check_product->execute();
$result_check_product = $stmt_check_product->get_result();

if ($result_check_product->num_rows == 0) {
    die('Invalid product ID');
}

// Check if the user is an employee
$sql_check_employee = "SELECT * FROM employee WHERE account_ID = ?";
$stmt_check_employee = $conn->prepare($sql_check_employee);
$stmt_check_employee->bind_param("i", $account_ID);
$stmt_check_employee->execute();
$result_check_employee = $stmt_check_employee->get_result();

if ($result_check_employee->num_rows > 0) {
    echo "<script>alert('Only customers can add items to the wishlist.'); setTimeout(function() { window.location.href = 'inventory.php'; }, 3000);</script>";
    exit;
}

// Check if the item is already in the wishlist
$sql_check = "SELECT * FROM wishlist WHERE cust_id = (SELECT cust_ID FROM customer WHERE account_ID = ?) AND product_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $account_ID, $product_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // If the item is already in the wishlist, update the quantity
    $sql_update = "UPDATE wishlist SET quantity = quantity + ? WHERE cust_id = (SELECT cust_ID FROM customer WHERE account_ID = ?) AND product_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("iii", $quantity, $account_ID, $product_id);
    $stmt_update->execute();
} else {
    // If the item is not in the wishlist, insert a new record
    $sql_insert = "INSERT INTO wishlist (cust_id, product_id, quantity) VALUES ((SELECT cust_ID FROM customer WHERE account_ID = ?), ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iii", $account_ID, $product_id, $quantity);
    $stmt_insert->execute();
}

header('Location: inventory.php');
exit;
?>

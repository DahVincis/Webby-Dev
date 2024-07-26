<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php include 'db_connection.php'; ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$account_ID = $_SESSION['account_ID'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Decrease the quantity or delete the item if quantity is 1
    $sql_check_quantity = "SELECT quantity FROM wishlist WHERE cust_id = (SELECT cust_ID FROM customer WHERE account_ID = ?) AND product_id = ?";
    $stmt_check_quantity = $conn->prepare($sql_check_quantity);
    $stmt_check_quantity->bind_param("ii", $account_ID, $product_id);
    $stmt_check_quantity->execute();
    $result_check_quantity = $stmt_check_quantity->get_result();
    $row = $result_check_quantity->fetch_assoc();

    if ($row['quantity'] > 1) {
        $sql_update = "UPDATE wishlist SET quantity = quantity - 1 WHERE cust_id = (SELECT cust_ID FROM customer WHERE account_ID = ?) AND product_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ii", $account_ID, $product_id);
        $stmt_update->execute();
    } else {
        $sql_delete = "DELETE FROM wishlist WHERE cust_id = (SELECT cust_ID FROM customer WHERE account_ID = ?) AND product_id = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param("ii", $account_ID, $product_id);
        $stmt_delete->execute();
    }
}

// Query to select items in the wishlist
$sql = "SELECT w.product_id, p.product_name, p.product_price, SUM(w.quantity) AS total_quantity
        FROM wishlist w
        JOIN product_info p ON w.product_id = p.product_ID
        WHERE w.cust_id = (SELECT cust_ID FROM customer WHERE account_ID = ?)
        GROUP BY w.product_id, p.product_name, p.product_price";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $account_ID);
$stmt->execute();
$results = $stmt->get_result();
?>
<body>
    <div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row header-row" style="margin-top: 150px;">
            <div class="col-lg-12 fade-box border bg-light">
                <div id="wishlist-container">
                    <h2 style="padding-bottom: 5%;">Your Wishlist:</h2>
                    <?php
                    if ($results->num_rows > 0) {
                        echo "<table><thead><tr><th>Product </th><th>Price Per Unit</th><th>Quantity</th><th>Action</th></tr></thead><tbody>";
                        while ($row = $results->fetch_assoc()) {
                            echo "<tr><td>".$row["product_name"]."</td>" .
                                 "<td>"."$".$row["product_price"]."</td>" .
                                 "<td>".$row["total_quantity"]."</td>" .
                                 "<td>
                                     <form method='post' action='wishlist.php'>
                                         <input type='hidden' name='product_id' value='".$row["product_id"]."'>
                                         <input class='wishlist_button' type='submit' value='Delete'>
                                     </form>
                                 </td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<p>No items in your wishlist.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php include '../inc/footer.inc'; ?>
</body>

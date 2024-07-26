<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php include 'db_connection.php'; ?>
<?php session_start(); ?>
<body>
    <div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row header-row" style="margin-top: 150px;">
            <div class="col-lg-12 fade-box border bg-light">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
                    <div id="inventory-container">
                        <h2 style="padding-bottom: 5%;">Grocery Inventory:</h2>
                        <?php
                            $id_arr = [1, 2, 3, 4, 5];
                            $count = count($id_arr);
                            $sql = "SELECT i.branch_id, i.product_id, i.quantity, p.product_name, p.product_price 
                                    FROM inventory i 
                                    JOIN product_info p ON i.product_id = p.product_ID";
                            $order_by = " ORDER BY i.branch_id, p.product_name ASC";
                            if ($count) {
                                $placeholders = implode(',', array_fill(0, $count, '?'));
                                $stmt = $conn->prepare("$sql WHERE i.branch_id IN ($placeholders) $order_by");
                                $stmt->bind_param(str_repeat('i', $count), ...$id_arr);
                                $stmt->execute();
                                $results = $stmt->get_result();
                            } else {
                                $results = $conn->query("$sql $order_by"); // a prepared statement is unnecessary
                            }

                            function printTables($sql_result) {
                                $branches = [
                                    'Branch #1' => [],
                                    'Branch #2' => [],
                                    'Branch #3' => [],
                                    'Branch #4' => [],
                                    'Branch #5' => []
                                ];

                                if ($sql_result->num_rows > 0) {
                                    while ($row = $sql_result->fetch_assoc()) {
                                        $branches['Branch #' . $row['branch_id']][] = $row;
                                    }

                                    foreach ($branches as $branch => $rows) {
                                        if (count($rows) > 0) {
                                            echo "<h3>$branch</h3>";
                                            echo "<table><thead><tr><th>Product</th><th>Price Per Unit</th><th>Quantity</th><th>Action</th></tr></thead><tbody>";
                                            foreach ($rows as $row) {
                                                echo "<tr><td>".$row["product_name"]."</td>" .
                                                     "<td>"."$".$row["product_price"]."</td>" .
                                                     "<td>".$row["quantity"]."</td>" .
                                                     "<td>
                                                         <form method='post' action='add_to_wishlist.php'>
                                                             <input type='hidden' name='product_id' value='".$row["product_id"]."'>
                                                             <input class='wishlist_button' type='submit' value='Add to Wishlist'>
                                                         </form>
                                                      </td></tr>";
                                            }
                                            echo "</tbody></table><br>";
                                        }
                                    }
                                } else {
                                    echo "0 results";
                                }
                            }

                            printTables($results);

                            $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../inc/footer.inc'; ?>
</body>

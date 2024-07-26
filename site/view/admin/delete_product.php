<?php include '../../inc/tags.inc'; ?>
<?php include '../../inc/config.inc'; ?>
<body>
	<div class="container raleway-site-body">
        <?php include '../../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 150px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
					<?php
						
						$product_ID = $_REQUEST['product_id'];
		
						$check_delete_product = $conn->query("SELECT * FROM product_info WHERE product_id = '$product_ID'");
						$check_delete_inventory = $conn->query("SELECT * FROM inventory WHERE product_id = '$product_ID'");
						$num_rows_product = mysqli_num_rows($check_delete_product);
						$num_rows_inventory = mysqli_num_rows($check_delete_inventory);
						if($num_rows_inventory > 0) {
							$delete_inventory = $conn->query("DELETE FROM inventory WHERE product_id = '$product_ID'");
							if($delete_inventory) {
								echo "Product deleted from all inventories successfuly!<br>";
								echo "<a href='manage_products.php'>Back to Product Management</a>";
							} else {
								echo "ERROR: Hush! Sorry. "
								. mysqli_error($conn);
							}
						} else {
							echo "Product doesn't exist in any inventories.<br>";
						}
						
						if($num_rows_product > 0) {
							$delete_product = $conn->query("DELETE FROM product_info WHERE product_id = '$product_ID'");
							if($delete_product) {
								echo "Product deleted from the product_info table successfuly!<br>";
							} else {
								echo "ERROR: Hush! Sorry. "
								. mysqli_error($conn);
							}
						} else {
							echo "Product doesn't exist in the product_info table.<br>";
							echo "<a href='manage_products.php'>Back to Product Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
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
						$branch_ID = $_REQUEST['branch_id'];
						$quantity = $_REQUEST['quantity'];
						
						$sql_update = "UPDATE inventory SET quantity = '$quantity' WHERE product_id = '$product_ID' AND branch_id = '$branch_ID'";
						$result = $conn->query($sql_update);
						if($result) {
							echo "Product quantity in Branch #$branch_ID inventory updated!";
							$sql_show_update = "SELECT product_info.*, product_type.product_type_name, inventory.* 
												FROM product_info JOIN inventory
												ON product_info.product_ID = inventory.product_ID
												JOIN product_type
												ON product_info.product_type_ID = product_type.product_type_ID
												WHERE inventory.product_id = '$product_ID' AND inventory.branch_id = '$branch_ID'";
							$show_result = $conn->query($sql_show_update);
							while($row = mysqli_fetch_assoc($show_result)) {
								echo "<br><br> Branch: Branch #" . $row['branch_id'] . "<br>Product: " . $row['product_name'] . 
									 "<br> Product Type: " . $row['product_type_name'] . "<br> Price: $" . $row['product_price'] . "<br>Quantity: " . $row['quantity'];
								echo "<br><a href='manage_products.php'>Back to Product Management</a>";
							}
						} else {
							echo "Nope! Sorry!";
							echo "<br><a href='manage_inventory.php'>Back to Inventory Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
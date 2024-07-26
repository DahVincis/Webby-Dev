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
						$product_type_id = $_REQUEST['product_type_id'];
						$product_price = $_REQUEST['product_price'];
						
						$sql_update = "UPDATE product_info SET product_type_id = '$product_type_id', product_price = '$product_price' WHERE product_id = '$product_ID'";
						$result = $conn->query($sql_update);
						if($result) {
							echo "Product Updated!";
							$sql_show_update = "SELECT product_info.*, product_type.product_type_name 
												FROM product_info JOIN product_type 
												ON product_info.product_type_id = product_type.product_type_id 
												WHERE product_id = '$product_ID'";
							$show_result = $conn->query($sql_show_update);
							while($row = mysqli_fetch_assoc($show_result)) {
								echo "<br><br> Product: " . $row['product_name'] . "<br> Product Type: " . $row['product_type_name'] . "<br> Price: $" . $row['product_price'];
								echo "<br><a href='manage_products.php'>Back to Product Management</a>";
							}
						} else {
							echo "Nope! Sorry!";
							echo "<br><a href='manage_products.php'>Back to Product Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
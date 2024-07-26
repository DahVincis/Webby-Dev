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
						
						$branch_ID = $_REQUEST['branch_id'];
						$product_ID = $_REQUEST['product_id'];
		
						$check_delete_inventory = $conn->query("SELECT * FROM inventory WHERE branch_id = '$branch_ID' AND product_id = '$product_ID'");
						$num_rows_inventory = mysqli_num_rows($check_delete_inventory);
						if($num_rows_inventory > 0) {
							$delete_inventory = $conn->query("DELETE FROM inventory WHERE product_id = '$product_ID' AND branch_id = '$branch_ID'");
							if($delete_inventory) {
								echo "Product deleted from Branch #$branch_ID successfuly!<br>";
							} else {
								echo "ERROR: Hush! Sorry. "
								. mysqli_error($conn);
							}
						} else {
							echo "Product doesn't exist in Branch $branch_ID inventory.<br>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
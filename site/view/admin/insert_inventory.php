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
		
						$check_select = $conn->query("SELECT * FROM inventory WHERE branch_id = '$branch_ID' AND product_id = '$product_ID'");
						$num_rows = mysqli_num_rows($check_select);
						if($num_rows == 0){
							$sql_insert_inventory = $conn->query("INSERT INTO inventory VALUES ('$branch_ID','$product_ID','$quantity')");
							if($sql_insert_inventory){
								echo "Added to Branch # $branch_ID Successfully!<br>";
								echo "<a href='../admin/'>Back to Admin Menu</a>"; 
							} else{
								echo "ERROR: Hush! Sorry $sql. "
									. mysqli_error($conn);
							}
						} else {
							echo "The entered product already exists in the selected branch's inventory.<br>";
							echo "<a href='manage_inventory.php'>Back to Inventory Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
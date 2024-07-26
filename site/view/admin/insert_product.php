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
					
						$product_ID_start = 000000;
		
						$product_ID = $product_ID_start++;
						$product_name = $_REQUEST['product_name'];
						$product_type = $_REQUEST['product_type'];
						$price = $_REQUEST['product_price'];
		
						$check_select = $conn->query("SELECT * FROM product_info WHERE product_name = '$product_name'");
						$num_rows = mysqli_num_rows($check_select);
						if($num_rows == 0){
							$sql_insert_product_info = $conn->query("INSERT INTO product_info VALUES ('$product_ID','$product_name','$product_type','$price')");
							if($sql_insert_product_info){
								echo "Product Added Successfuly!<br>";
								echo "<a href='../admin/'>Back to Admin Menu</a>"; 
							} else{
								echo "ERROR: Hush! Sorry $sql. "
									. mysqli_error($conn);
							}
						} else {
							echo "The entered product already exists.<br>";
							echo "<a href='manage_product.php'>Back to Product Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
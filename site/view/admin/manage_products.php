<?php include '../../inc/tags.inc'; ?>
<?php include '../../inc/config.inc'; ?>
<body>
    <div class="container raleway-site-body">
        <?php include '../../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row header-row" style="margin-top: 150px;">
            <div class="col-lg-12 fade-box border bg-light">
                <div class="col-lg-8" style="margin: 0 auto;">
					<h3 style="padding: 10% 0% 5% 0%;">Admin - Product Management</h3>
					<form class="form-login" id="form-insert-product" action="insert_product.php" method="post">
						<h3>Add Product</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<label for="product_name">Product Name:*</label>
							<input type="text" placeholder="Enter product name" name="product_name" required>
							<!-- Product Type SQL -->
							<label for="product_type">Product Type:*</label>
							<?php
								$sql_product_type = "SELECT product_type_ID, product_type_name FROM product_type";
								$result = $conn->query($sql_product_type);
								echo "<select name='product_type' class='form-dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["product_type_ID"] . "'>" . $row["product_type_name"] . "</option>";
								}
								echo "</select>"
							?>
							<!-- Product Type SQL -->
							<label for="product_price">Price:*</label>
							<input type="text" placeholder="Enter price (0.00 format)" name="product_price" required>							
							<input type="submit" value="Add Product">
						</div>
					</form>
					<form class="form-login" id="form-update-product" action="update_product.php" method="post">
						<h3>Update Product</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<label for="product_id">Product Name:*</label>
							<?php
								$sql_product_name = "SELECT product_ID, product_name FROM product_info ORDER BY product_name ASC";
								$result = $conn->query($sql_product_name);
								echo "<select name='product_id' class='form-dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["product_ID"] . "'>" . $row["product_name"] . "</option>";
								}
								echo "</select>";
							?>
							<label for="product_type_id">Product Type:*</label>
							<?php
								$sql_product_type = "SELECT product_type_ID, product_type_name FROM product_type";
								$result = $conn->query($sql_product_type);
								echo "<select name='product_type_id' class='form-dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["product_type_ID"] . "'>" . $row["product_type_name"] . "</option>";
								}
								echo "</select>"
							?>
							<label for="product_price">Price:*</label>
							<input name="product_price" type="text" />
							<input type="submit" value="Update Product">
						</div>
					</form>
					<form class="form-login" id="form-delete-product" action="delete_product.php" method="post">
						<h3>Delete Product</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<! -- Must be Deleted from product_info AND inventory tables -->
							<label for="product_name">Product Name:*</label>
							<?php
								$sql_product_name = "SELECT product_ID, product_name FROM product_info ORDER BY product_name ASC";
								$result = $conn->query($sql_product_name);
								echo "<select name='product_id' class='form-dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["product_ID"] . "'>" . $row["product_name"] . "</option>";
								}
								echo "</select>";
							?>
							<input type="submit" value="Delete Product">
						</div>
					</form>
                </div>
            </div>
        </div>  
    </main>
    <?php include '../../inc/footer.inc'; ?>
</body>

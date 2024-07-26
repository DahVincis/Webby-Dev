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
					<h3 style="padding: 10% 0% 5% 0%;">Admin - Inventory Management</h3>
					<form class="form-login" id="form-insert-inventory" action="insert_inventory.php" method="post">
						<h3>Add Product to Inventory</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<label for="product_id">Product Name:*</label>
							<!-- Product Name SQL -->
							<?php
								$sql_product_ID = "SELECT product_ID, product_name FROM product_info";
								$result = $conn->query($sql_product_ID);
								echo "<select name='product_id' class='form-dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["product_ID"] . "'>" . $row["product_name"] . "</option>";
								}
								echo "</select>";
							?>
							<!-- Product Name SQL -->
							<!-- Branch SQL -->
							<label for="branch_id">Branch #:*</label><br>
							<?php
								$sql_branch = "SELECT branch_ID FROM supermarket_branch ORDER BY branch_ID ASC";
								$result = $conn->query($sql_branch);
								echo "<select name='branch_id' class='form_dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["branch_ID"] . "'>" . 'Branch #' . $row["branch_ID"] . "</option>";
								}
								echo "</select>";
							?>
							<!-- Branch SQL -->
							<label for="quantity">Quantity:*</label>
							<input type="text" placeholder="Enter quantity" name="quantity" required>
							<input type="submit" value="Add Product to Inventory">
						</div>
					</form>
					<form class="form-login" id="form-update-inventory" action="update_inventory.php" method="post">
						<h3>Update Product Quantity in Inventory</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<!-- Only the quantity will be updated -->
							<label for="branch_id">Branch #:*</label><br>
							<?php
								$sql_branch = "SELECT branch_ID FROM supermarket_branch ORDER BY branch_ID ASC";
								$result = $conn->query($sql_branch);
								echo "<select name='branch_id' class='form_dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["branch_ID"] . "'>" . 'Branch #' . $row["branch_ID"] . "</option>";
								}
								echo "</select>";								
							?>
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
							<label for="quantity">Quantity:*</label>
							<input type="text" name="quantity" placeholder="Enter a number" required />
							<input type="submit" value="Update Product Quantity">
						</div>
					</form>
					<form class="form-login" id="form-delete-from-inventory" action="delete_inventory.php" method="post">
						<h3>Delete Product from Inventory</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<label for="branch_id">Branch #:*</label><br>
							<?php
								$sql_branch = "SELECT branch_ID FROM supermarket_branch ORDER BY branch_ID ASC";
								$result = $conn->query($sql_branch);
								echo "<select name='branch_id' class='form_dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["branch_ID"] . "'>" . 'Branch #' . $row["branch_ID"] . "</option>";
								}
								echo "</select>";								
							?>
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

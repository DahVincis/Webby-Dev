<?php include '../../inc/tags.inc'; ?>
<?php include '../../inc/config.inc'; ?>
<body>
    <div class="container raleway-site-body">
        <?php include '../../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row header-row" style="margin-top: 150px;">
            <div class="col-lg-12 fade-box border bg-light">
				<div id="inventory-container">
					<h3 style="padding: 10% 0% 5% 0%;">Admin - Invoice/Supplier Management</h3>
					<!-- Display a table of current employees -->
					<h3 style="padding-bottom: 5%;">Supplier List:</h3>
					<?php
						$sql_supplier_list = "SELECT * FROM supplier_list_view ORDER BY supplier_name ASC";
						$results = $conn->query($sql_supplier_list);
						$table_tags = "<table><thead><tr><th>Supplier Name</th><th>Zip Code</th><th>Street</th>
											   <th>City</th><th>State</th><th>Product Type Sold</th><th>Phone Number</th></tr></thead><tbody><tr>";
						
						echo $table_tags;
						if($results) {
							while($row = $results->fetch_assoc()) {
								echo "<td>".$row["supplier_name"]."</td>" .
								"<td>".$row["zip_code"]."</td>" .
								"<td>".$row["city"]."</td>" .
								"<td>".$row["street"]."</td>" .								
								"<td>".$row["state"]."</td>" .
								"<td>".$row["product_type_name"]."</td>" .
								"<td>".$row["phone_num"]."</td></tr>";
							}
						} else {
							echo "0 results.";
						}
						echo "</tbody></thead></table><br>";
					
					?>
					<h3 style="padding-bottom: 5%;">Invoice List:</h3>
					<?php
						$sql_supplier_list = "SELECT * FROM invoice_list ORDER BY supplier_name ASC";
						$results = $conn->query($sql_supplier_list);
						$table_tags = "<table><thead><tr><th>Supplier Name</th><th>Invoice #</th><th>Branch #</th><th>Product Name</th><th>Amount Billed</th></tr></thead><tbody><tr>";
						
						echo $table_tags;
						if($results) {
							while($row = $results->fetch_assoc()) {
								echo "<td>".$row["supplier_name"]."</td>" .
								"<td>".$row["invoice_ID"]."</td>" .
								"<td>".$row["branch_ID"]."</td>" .
								"<td>".$row["product_name"]."</td>" .								
								"<td>"."$".$row["amount_billed"]."</td></tr>";
							}
						} else {
							echo "0 results.";
						}
						echo "</tbody></thead></table><br>";
					
					?>
				</div>
            </div>
        </div>  
    </main>
    <?php include '../../inc/footer.inc'; ?>
</body>

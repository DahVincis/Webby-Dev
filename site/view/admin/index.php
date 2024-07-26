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
					<h3 style="padding: 10% 0% 5% 0%;">Administration Pages</h3>
                    <ul id="admin-links" style="padding-bottom: 15%;">
						<li><a href="manage_products.php">Product Management</a></li>
						<li><a href="manage_inventory.php">Inventory Management</a></li>
						<li><a href="manage_employees.php">Employee Management</a></li>
						<li><a href="view_invoices_supplier.php">Invoice/Supplier Management</a></li>
					</ul>
                </div>
            </div>
        </div>  
    </main>
    <?php include '../../inc/footer.inc'; ?>
</body>

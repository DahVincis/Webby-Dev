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
						
						$employee_ID = $_REQUEST['employee_id'];
		
						$check_delete_employee = $conn->query("SELECT * FROM employee WHERE employee_id = '$employee_ID'");
						$check_delete_account = $conn->query("SELECT * FROM employee, account WHERE employee.account_ID = account.account_ID");
						$num_rows_employee = mysqli_num_rows($check_delete_employee);
						$num_rows_account = mysqli_num_rows($check_delete_account);
						if($num_rows_account > 0) {
							$delete_employee = $conn->query("DELETE employee, account FROM employee INNER JOIN account WHERE employee.account_ID = account.account_ID AND employee.employee_ID = '$employee_ID'");
							if($delete_employee) {
								echo "Account successfully deleted!<br>";
								echo "<a href='manage_employees.php'>Back to Employee Management</a>";
							} else {
								echo "ERROR: Hush! Sorry. "
								. mysqli_error($conn);
							}
						} else {
							echo "Account doesn't exist.<br>";
							echo "<a href='manage_employees.php'>Back to Employee Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
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
						$emp_fname = $_REQUEST['emp_fname'];
						$emp_lname = $_REQUEST['emp_lname'];
						$branch_ID = $_REQUEST['branch_id'];
						$email = $_REQUEST['email'];
						$psw = $_REQUEST['psw'];
						$job_role = $_REQUEST['job_role_ID'];
						
						$sql_employee_update = "UPDATE employee SET emp_fname = '$emp_fname', 
														   emp_lname = '$emp_lname', 
														   branch_ID = '$branch_ID', 
														   job_role_ID = '$job_role' 
													   WHERE employee_ID = '$employee_ID'";
						
						$select_account_ID = "SELECT account_ID FROM employee WHERE employee_ID = '$employee_ID'";
						$result_acct_ID = $conn->query($select_account_ID);
						while($row = $result_acct_ID->fetch_assoc()){
							$acct_id = $row["account_ID"];
							$sql_account_update = "UPDATE account
											   INNER JOIN employee
											   ON account.account_ID = employee.account_ID
											   SET account.email = '$email', account.password = '$psw'
											   WHERE account.account_ID = '$acct_id'";
							
						}
						$result1 = $conn->query($sql_employee_update);
						$result2 = $conn->query($sql_account_update);
						if($result1 && $result2) {
							echo "$emp_fname's account has been updated!";
							echo "<br><a href='manage_employees.php'>Back to Employee Management</a>";
						} else {
							echo "Nope! Sorry!";
							echo "<br><a href='manage_employees.php'>Back to Employee Management</a>";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
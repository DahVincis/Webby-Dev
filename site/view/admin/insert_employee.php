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
						
						$employee_ID_start = 000000;
						$account_ID_start = 000000;
						
						$employee_ID = $employee_ID_start++;
						$account_ID = $account_ID_start++;
						$emp_fname = $_REQUEST['emp_fname'];
						$emp_lname = $_REQUEST['emp_lname'];
						$branch_ID = $_REQUEST['branch_id'];
						$email = $_REQUEST['email'];
						$psw = $_REQUEST['psw'];
						$job_role = $_REQUEST['job_role_ID'];
						
						if(isset($_POST['email'])) {
							$check_select = $conn->query("SELECT * FROM account WHERE email = '$email'");
							$num_rows = mysqli_num_rows($check_select);
							if($num_rows == 0){
								$account = "INSERT INTO account VALUES($account_ID,'$email','$psw')";								
								$sql_insert_account = $conn->query($account);
								$sql_get_acct_id = "SELECT account_ID FROM account WHERE email = '$email'";
								$result_acct_id = $conn->query($sql_get_acct_id);
								while($row = $result_acct_id->fetch_assoc()) {
									$acct_id = $row["account_ID"];
									$employee = "INSERT INTO employee (employee_ID, emp_fname, emp_lname, branch_ID, account_ID, job_role_ID)
											VALUES('$employee_ID','$emp_fname','$emp_lname','$branch_ID','$acct_id','$job_role')";
									$insert_employee = $conn->query($employee);		
								}
								echo "$emp_fname's account created!<br>";
								echo "<b><a href='manage_employees.php'>Back to Employee Management</a>";
							} else {
								echo "This account already exists.<br>";
								echo "<a href='manage_employees.php'>Back to Employee Management</a>";
							}
						} else {
							echo "Account creation form not submitted...";
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../../inc/footer.inc'; ?>
</body>
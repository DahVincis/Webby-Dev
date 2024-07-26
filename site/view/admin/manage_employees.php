<?php include '../../inc/tags.inc'; ?>
<?php include '../../inc/config.inc'; ?>
<body>
    <div class="container raleway-site-body">
        <?php include '../../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row header-row" style="margin-top: 150px;">
            <div class="col-lg-12 fade-box border bg-light">
				<div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
					<div id="inventory-container">
						<h3 style="padding: 10% 0% 5% 0%;">Admin - Employee Management</h3>
						<!-- Display a table of current employees -->
						<h3 style="padding-bottom: 5%;">Employee List:</h3>
						<?php
							$sql_employee_list = "SELECT * FROM employee_roster ORDER BY employee_ID ASC";
							$results = $conn->query($sql_employee_list);
							$table_tags = "<table><thead><tr><th>Employee ID</th><th>Last Name</th><th>First Name</th>
												   <th>Branch #</th><th>Email Address</th><th>Job Role</th></tr></thead><tbody><tr>";
							
							echo $table_tags;
							if($results) {
								while($row = $results->fetch_assoc()) {
									echo "<td>".$row["employee_ID"]."</td>" .
									"<td>".$row["emp_lname"]."</td>" .
									"<td>".$row["emp_fname"]."</td>" .								
									"<td>".$row["branch_ID"]."</td>" .
									"<td>".$row["email"]."</td>" .
									"<td>".$row["job_role_name"]."</td></tr>";
								}
							} else {
								echo "0 results.";
							}
							echo "</tbody></thead></table><br>";
						
						?>
						<!-- Create a form for Employee creation -->
						<h3>Create Employee Profile:</h3>
						<form class="form-login" action="insert_employee.php" method="post">
							<label for="emp_fname">First Name:*</label>
							<input type="text" placeholder="Enter first name" name="emp_fname" required>
							<label for="emp_lname">Last Name:*</label>
							<input type="text" placeholder="Enter last name" name="emp_lname" required>
							<label for="branch_id">Branch:*</label>
							<!-- Create Dropdown for Branch -->
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
							<label for="email">Email:*</label>
							<input type="text" placeholder="Enter email address" name="email" required>
							<label for="psw">Password:*</label>
							<input type="password" placeholder="Enter default password" name="psw" required>
							<label for="job_role">Job Role:*</label>
							<!-- Create Dropdown for Job Role -->
							<?php
								$sql_role = "SELECT job_role_ID, job_role_name FROM job_role ORDER BY job_role_name ASC";
								$result = $conn->query($sql_role);
								echo "<select name='job_role_ID' class='form_dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["job_role_ID"] . "'>" .$row["job_role_name"] . "</option>";
								}
								echo "</select>";
							?>
							<input type="submit" value="Create Employee Profile">						
						</form>
						
						<!-- Create a form for Employee updates -->
						<h3 style="padding-bottom: 5%;">Update Employee Info:</h3>
						<form class="form-login" action="update_employee.php" method="post">
							<label for="employee_id">Employee:*</label>
							<?php
								$sql_emp_name = "SELECT employee_ID, emp_fname, emp_lname FROM employee ORDER BY emp_lname ASC";
								$result = $conn->query($sql_emp_name);
								echo "<select name='employee_id' class='form-dropdown' required>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["employee_ID"] . "'>" . $row["emp_lname"] .', ' . $row["emp_fname"] . "</option>";
								}
								echo "</select>";								
							?>
							<label for="emp_fname">First Name:</label>
							<input type="text" placeholder="Enter new first name" name="emp_fname">
							<label for="emp_lname">Last Name:</label>
							<input type="text" placeholder="Enter new last name" name="emp_lname">
							<label for="branch_id">Branch:</label>
							<!-- Create Dropdown for Branch -->
							<?php
								$sql_branch = "SELECT branch_ID FROM supermarket_branch ORDER BY branch_ID ASC";
								$result = $conn->query($sql_branch);
								echo "<select name='branch_id' class='form_dropdown'>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["branch_ID"] . "'>" . 'Branch #' . $row["branch_ID"] . "</option>";
								}
								echo "</select>";
							?>
							<label for="email">Email:</label>
							<input type="text" placeholder="Enter new email address" name="email">
							<label for="psw">Password:</label>
							<input type="password" placeholder="Enter new password" name="psw">
							<label for="job_role">Job Role:</label>
							<!-- Create Dropdown for Job Role -->
							<?php
								$sql_role = "SELECT job_role_ID, job_role_name FROM job_role ORDER BY job_role_name ASC";
								$result = $conn->query($sql_role);
								echo "<select name='job_role_ID' class='form_dropdown'>";
								echo "<option size =30></option>";
								while($row = mysqli_fetch_array($result)) {
									echo "<option value='" . $row["job_role_ID"] . "'>" .$row["job_role_name"] . "</option>";
								}
								echo "</select>";
							?>
							<input type="submit" value="Update Employee Profile">						
						</form>				
						
						
						<!-- Create a form for Employee deletion -->
						<h3 style="padding-bottom: 5%;">Delete Employee:</h3>
						<form action="delete_employee.php">
							<p class="req-fields">(Fields marked with * are required fields.)</p>
							<div class="login-form-container">
								<label for="employee_name">Employee Name:*</label>
								<?php
									$sql_emp_name = "SELECT employee_ID, emp_fname, emp_lname FROM employee ORDER BY emp_lname ASC";
									$result = $conn->query($sql_emp_name);
									echo "<select name='employee_id' class='form-dropdown' required>";
									echo "<option size =30></option>";
									while($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row["employee_ID"] . "'>" . $row["emp_lname"] .', ' . $row["emp_fname"] . "</option>";
									}
									echo "</select>";								
								?>
							</div>						
							<input type="submit" value="Delete Employee">
						</form>
					</div>
				</div>
            </div>
        </div>  
    </main>
    <?php include '../../inc/footer.inc'; ?>
</body>

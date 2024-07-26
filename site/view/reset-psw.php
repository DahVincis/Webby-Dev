<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php include 'db_connection.php'; ?>
<?php session_start(); ?>
<body>
	<div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 150px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
					<form class="form-login" method="post" action="psw-success.php">
						<h3 class="login">Reset your password:</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<label for="uname">Email Address:*</label>
							<input type="text" placeholder="Email address" name="email" required>
							<label for="new-psw">New Password:*</label>
							<input type="password" placeholder="New Password" name="psw" required>
							<label for="confirm-psw">Confirm New Password:*</label>
							<input type="password" placeholder="Confirm New Password" name="psw" required>
							<button type="submit">Submit</button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </main>
	<?php include '../inc/footer.inc'; ?>
</body>
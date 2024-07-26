<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<body>
	<div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 150px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
                    <form class="form-login" action="insert.php" method="post">
						<h3 class="login">Not a member? Sign up here!</h3>
						<p class="req-fields">(Fields marked with * are required fields.)</p>
						<div class="login-form-container">
							<label for="username">Email Address:*</label>
							<input type="text" placeholder="Email address" name="email" id="username" required>
							<label for="psw">Password:*</label>
							<input type="password" placeholder="Password" name="psw" required>
							<label for="fname">First Name:*</label>
							<input type="text" placeholder="First Name" name="fname" required>
							<label for="lname">Last Name:*</label>
							<input type="text" placeholder="Last Name" name="lname" required>
							<input type="submit" value="Confirm">
						</div>
					</form>
                </div>
            </div>
        </div>
    </main>
	<?php include '../inc/footer.inc'; ?>
</body>
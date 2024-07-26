<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php include 'db_connection.php'; ?>
<?php
session_start();

$loggedIn = false;
$email = $fname = $lname = $phone_num = '';

if (isset($_SESSION['loggedin'])) {
    $loggedIn = true;
    $account_ID = $_SESSION['account_ID'];
    $sql = "SELECT a.email, c.cust_fname, c.cust_lname, c.phone_num FROM account a JOIN customer c ON a.account_ID = c.account_ID WHERE a.account_ID = $account_ID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $email = htmlspecialchars($user['email']);
        $fname = htmlspecialchars($user['cust_fname']);
        $lname = htmlspecialchars($user['cust_lname']);
        $phone_num = htmlspecialchars($user['phone_num']);
    }
}
?>
<body>
    <div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 150px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
                    <form class="form-login" method="post" action="">
                        <h3 class="login">Contact Us:</h3>
                        <p class="req-fields">(Fields marked with * are required fields.)</p>
                        <div class="login-form-container">
                            <label for="email">Email Address*:</label>
                            <input type="text" placeholder="Email address" name="email" value="<?php echo $email; ?>" required>
                            <label for="fname">First Name*:</label>
                            <input type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>" required> 
                            <label for="lname">Last Name*:</label>
                            <input type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>" required>
                            <label for="phnum">Phone Number (no dashes):</label>
                            <input type="text" placeholder="Phone Number" name="phnum" value="<?php echo $phone_num; ?>">
                            <label for="message">Message (250 character limit)*:</label>
                            <textarea style="height:200px; width:100%;" placeholder="Write something..." name="message" required></textarea>
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include '../inc/footer.inc'; ?>
</body>

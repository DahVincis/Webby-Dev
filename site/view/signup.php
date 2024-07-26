<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php session_start(); ?>
<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $zip_code = '12345'; // Use a valid zip code that exists in the address table

    // Check if zip_code exists in the address table
    $check_zip_sql = "SELECT * FROM address WHERE zip_code='$zip_code'";
    $zip_result = $conn->query($check_zip_sql);

    if ($zip_result->num_rows == 0) {
        // Insert into address table if it doesn't exist
        $insert_address_sql = "INSERT INTO address (zip_code, street, city, state) VALUES ('$zip_code', '123 Main St', 'Anytown', 'CT')";
        if ($conn->query($insert_address_sql) === FALSE) {
            echo "Error: " . $insert_address_sql . "<br>" . $conn->error;
            $conn->close();
            exit();
        }
    }

    // Insert into Account table
    $sql = "INSERT INTO account (email, password) VALUES ('$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $account_id = $conn->insert_id;

        // Insert into Customer table
        $sql = "INSERT INTO customer (cust_fname, cust_lname, phone_num, zip_code, account_ID) VALUES ('$fname', '$lname', '', '$zip_code', $account_id)";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
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

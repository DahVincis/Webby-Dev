<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php
include 'db_connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $sql = "SELECT * FROM account WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $row['email'];
        $_SESSION['account_ID'] = $row['account_ID'];

        // Check if the user is a customer
        $cust_sql = "SELECT * FROM customer WHERE account_ID = " . $row['account_ID'];
        $cust_result = $conn->query($cust_sql);
        if ($cust_result->num_rows > 0) {
            $_SESSION['user_type'] = 'customer';
        } else {
            // Check if the user is an employee
            $emp_sql = "SELECT * FROM employee WHERE account_ID = " . $row['account_ID'];
            $emp_result = $conn->query($emp_sql);
            if ($emp_result->num_rows > 0) {
                $emp_row = $emp_result->fetch_assoc();
                $_SESSION['user_type'] = 'employee';
                $_SESSION['job_role_ID'] = $emp_row['job_role_ID'];
            }
        }

        header("Location: account.php");
    } else {
        echo "Invalid email or password.";
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
                        <h3 class="login">Employees and Customers sign in here:</h3>
                        <p class="req-fields">(Fields marked with * are required fields.)</p>
                        <div class="login-form-container">
                            <label for="uname">Email Address:*</label>
                            <input type="text" placeholder="Email address" name="email" required>
                            <label for="psw">Password:*</label>
                            <input type="password" placeholder="Password" name="psw" required>        
                            <button type="submit">Login</button>
                        </div>
                        <div>
                            <span class="psw">Forgot <a href="/scsuproject/site/view/reset-psw.php">password?</a></span>
                        </div>
                    </form>
                    <h6 style="padding-bottom: 5%;">Don't have an account? Sign up <a href="/scsuproject/site/view/signup.php">here</a>.</h6>
                </div>
            </div>
        </div>
    </main>
    <?php include '../inc/footer.inc'; ?>
</body>

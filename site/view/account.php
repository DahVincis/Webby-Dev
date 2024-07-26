<?php
include '../inc/tags.inc';
include '../inc/config.inc';
include 'db_connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

$account_ID = $_SESSION['account_ID'];
$is_employee = false;

// Determine if the user is an employee or customer
$sql_check_employee = "SELECT * FROM employee WHERE account_ID = ?";
$stmt_check_employee = $conn->prepare($sql_check_employee);
$stmt_check_employee->bind_param("i", $account_ID);
$stmt_check_employee->execute();
$result_check_employee = $stmt_check_employee->get_result();

if ($result_check_employee->num_rows > 0) {
    $is_employee = true;
    $employee = $result_check_employee->fetch_assoc();
} else {
    $sql = "SELECT * FROM customer WHERE account_ID = $account_ID";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "No customer found.";
        $customer = [
            'cust_fname' => '',
            'cust_lname' => '',
            'phone_num' => '',
            'zip_code' => ''
        ];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($is_employee) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        
        // Update employee information
        $update_sql = "UPDATE employee SET emp_fname='$fname', emp_lname='$lname' WHERE account_ID=$account_ID";
        $update_account_sql = "UPDATE account SET email='$email' WHERE account_ID=$account_ID";
        
        if ($conn->query($update_sql) === TRUE && $conn->query($update_account_sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone_num = $_POST['phone_num'];
        $zip_code = $_POST['zip_code'];
        $email = $_POST['email'];

        // Check if zip_code exists in the address table
        $check_zip_sql = "SELECT * FROM address WHERE zip_code='$zip_code'";
        $zip_result = $conn->query($check_zip_sql);

        if ($zip_result->num_rows == 0) {
            // Insert into address table if it doesn't exist
            $insert_address_sql = "INSERT INTO address (zip_code, street, city, state) VALUES ('$zip_code', 'Unknown', 'Unknown', 'Unknown')";
            if ($conn->query($insert_address_sql) === FALSE) {
                echo "Error: " . $insert_address_sql . "<br>" . $conn->error;
                $conn->close();
                exit();
            }
        }

        // Update customer information
        $update_sql = "UPDATE customer SET cust_fname='$fname', cust_lname='$lname', phone_num='$phone_num', zip_code='$zip_code' WHERE account_ID=$account_ID";
        $update_account_sql = "UPDATE account SET email='$email' WHERE account_ID=$account_ID";
        
        if ($conn->query($update_sql) === TRUE && $conn->query($update_account_sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// Fetch purchase history
$search_date = '';
if (isset($_GET['search_date'])) {
    $search_date = $_GET['search_date'];
    $sql_purchase_history = "SELECT * FROM customer_transaction WHERE cust_ID = ? AND date = ?";
    $stmt_purchase_history = $conn->prepare($sql_purchase_history);
    $stmt_purchase_history->bind_param("is", $customer['cust_ID'], $search_date);
} else {
    $sql_purchase_history = "SELECT * FROM customer_transaction WHERE cust_ID = ?";
    $stmt_purchase_history = $conn->prepare($sql_purchase_history);
    $stmt_purchase_history->bind_param("i", $customer['cust_ID']);
}
$stmt_purchase_history->execute();
$result_purchase_history = $stmt_purchase_history->get_result();
?>

<body>
    <div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 150px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
                    <h3>Account Information</h3>
                    <form class="form-login" method="post" action="">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" value="<?php echo htmlspecialchars($is_employee ? $employee['emp_fname'] : $customer['cust_fname']); ?>" required>
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" value="<?php echo htmlspecialchars($is_employee ? $employee['emp_lname'] : $customer['cust_lname']); ?>" required>
                        <?php if (!$is_employee): ?>
                            <label for="phone_num">Phone Number:</label>
                            <input type="text" name="phone_num" value="<?php echo htmlspecialchars($customer['phone_num']); ?>">
                            <label for="zip_code">Zip Code:</label>
                            <input type="text" name="zip_code" value="<?php echo htmlspecialchars($customer['zip_code']); ?>" required>
                        <?php endif; ?>
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
                        <button type="submit">Update</button>
                    </form>
                    <?php if ($is_employee): ?>
                        <p>Branch ID: <?php echo $employee['branch_ID']; ?></p>
                        <p>Job Role: <?php echo $employee['job_role_ID']; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if (!$is_employee): ?>
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 20px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
                    <div class="purchase-history-container">
                        <h3>Purchase History</h3>
                        <div class="search-container">
                            <form method="get" action="">
                                <input type="date" name="search_date" value="<?php echo htmlspecialchars($search_date); ?>">
                                <button type="submit">Search</button>
                            </form>
                            <form method="get" action="">
                                <button type="submit">Reset</button>
                            </form>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Total Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result_purchase_history->fetch_assoc()): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['transaction_ID']); ?></td>
                                        <td><?php echo htmlspecialchars($row['total_price']); ?></td>
                                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </main>
    <?php include '../inc/footer.inc'; ?>
</body>

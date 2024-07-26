<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<?php include 'db_connection.php'; ?>
<?php session_start(); ?>
<body>
	<div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row header-row" style="margin-top: 150px;">
            <div class="col-lg-12 fade-box border bg-light">
                <h2>Customer List</h2>
                <?php
                $sql = "SELECT * FROM Customer";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "ID: " . $row["cust_ID"]. " - Name: " . $row["cust_fname"]. " " . $row["cust_lname"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </main>
	<?php include '../inc/footer.inc'; ?>
</body>
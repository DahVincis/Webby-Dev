<?php include '../inc/tags.inc'; ?>
<?php include '../inc/config.inc'; ?>
<body>
	<?php
		$dsn = 'localhost';
		$username = 'root';
		$password = "Helloworld1!";
		$database = "customers";
	
		$conn = mysqli_connect($dsn, $username, $password, $database);
		if($conn === false){
			die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		
		$member_ID_start = 000000;
		
		$member_ID = $member_ID_start++;
		$email = $_REQUEST['email'];
		$psw = $_REQUEST['psw'];
		$fname = $_REQUEST['fname'];
		$lname = $_REQUEST['lname'];
		
		$sql = "INSERT INTO customer VALUES ('$member_ID','$email','$fname','$lname','$psw')";
	?>
	<div class="container raleway-site-body">
        <?php include '../inc/header.inc'; ?>
    </div>
    <main class="container" role="main" id="fade">
        <div class="row">
            <div class="col-lg-12 fade-box border bg-light big-box" style="margin-top: 150px;">
                <div class="col-lg-8 raleway-site-body" style="margin: 0 auto;">
					<?php
						if(mysqli_query($conn, $sql)){
							echo "<h2 style='padding: 10%;'>Welcome $fname! Account created!</h2>"; 
						} else{
							echo "ERROR: Hush! Sorry $sql. "
								. mysqli_error($conn);
						}
						
						mysqli_close($conn);
					?>
				</div>
			</div>
		</div>
    </main>
	<?php include '../inc/footer.inc'; ?>
</body>
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
                <div class="col-lg-8" style="margin: 0 auto;">
                    <p style="padding: 15%; font-size: 20px;">
						We at WebbyDev Farms seek to bring you the highest quality food we possibly can for you to bring home to your families.
						WebbyDev Farms was started by a trio of friends: Nolan, Pedro, and Justin, who shared a Database Design course at Southern
						Connecticut State University in the summer of 2024. We hope you enjoy what we have to offer! If you have any questions, feel free
						to <a href="/scsuproject/site/view/contact.php">contact us</a>!
					</p>
                </div>
            </div>
        </div>
    </main>
	<?php include '../inc/footer.inc'; ?>
</body>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <?php include 'nav.inc'; ?>
    <?php
    if (isset($_SESSION['loggedin'])) {
        echo "<p>Logged in as " . htmlspecialchars($_SESSION['email']) . "</p>";
    }
    ?>
</header>

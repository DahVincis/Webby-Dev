<?php
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "supermarket_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

define("COMPANY_NAME", "WebbyDev Farms");
define("COMPANY_STREET", "123 Somestreet St.");
define("COMPANY_CITY", "New Haven");
define("COMPANY_STATE", "CT");
define("COMPANY_ZIP", "06000");
define("COMPANY_PHONE", "(123)123-1234");
define("COMPANY_FAX", "(123)123-1235");
define("SLOGAN", "Come for the food, stay for the web development");
define("COPYYEAR", "2024");

define("SITE_NAME", "WebbyDev Farms");
define("NAV_ITEM_ONE", "Home");
define("NAV_ITEM_TWO", "Inventory");
define("NAV_ITEM_THREE", "About");
define("NAV_ITEM_FOUR", "Contact");
define("NAV_SEARCH_BUTTON", "Go");

define("PAGE_TITLE_ABOUT", "About");
define("PAGE_TITLE_CONTACT", "Contact");
?>
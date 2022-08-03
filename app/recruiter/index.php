<?php
session_start();
if ($_SESSION['isValid']) {
  error_log("Recruiter Valid User\n");
} else {
  error_log("Recruiter Invalid User\n");
}
?>
<?php include(__DIR__ . "/../global/header.php"); ?>
<?php include(__DIR__ . "/../global/menu.php"); ?>
<div id="root"></div>
<script src="../js/script.js"></script>
<?php include(__DIR__ . "/../global/footer.php"); ?>
<?php
session_start();
if ($_SESSION['recruiter_isValid']) {
    error_log("Recruiter Valid User\n");
} else {
    error_log("Recruiter Invalid User\n");
}
?>
<?php include(__DIR__ . "/../global/header.php"); ?>
<?php include(__DIR__ . "/../global/menu.php"); ?>
<div id="root">About</div>
<div style='float:right'>&copy; <?php echo date("Y"); ?>fivefivesix. All rights reserved.</div>
<?php include(__DIR__ . "/../global/footer.php"); ?>
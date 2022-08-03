<?php
session_start();
if ($_SESSION['recruiter_isValid']) {
  error_log("Recruiter Valid User\n");
} else {
  error_log("Recruiter Invalid User\n");
  header("Location: http://localhost:8888/github/devpool/index.php");
}
?>
<?php include(__DIR__ . "/../global/header.php"); ?>
<?php include(__DIR__ . "/../global/menu.php"); ?>
<div id="root"></div>
<script>
  function setState(lang) {
    //console.log(lang);
    let langSel = document.getElementById(lang);
    //console.log(langSel.checked);
    let langExp = document.getElementById(lang + "-exp");
    if (langSel.checked == true) {
      //console.log("Checked");
      langExp.disabled = false;
      return;
    }
    langExp.disabled = true;
    langExp.selectedIndex = "0"
  }
</script>
<script src="../js/script.js"></script>
<?php include(__DIR__ . "/../global/footer.php"); ?>
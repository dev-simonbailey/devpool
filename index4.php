<?php ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink_rec {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 5px;
  font-size: 17px;
  width: 20%;
  min-height: 55px;
}

.tablink_rec:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent_rec {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home_rec {background-color: red;}
#News_rec {background-color: green;}
#Contact_rec {background-color: blue;}
#About_rec {background-color: orange;}
#Utilities_rec {background-color: pink;}
</style>
</head>
<body>

<button class="tablink_rec" style='border-top: 5px solid red' onclick="openPage_rec('Home_rec', this, 'red')">Stats</button>
<button class="tablink_rec" style='border-top: 5px solid green'onclick="openPage_rec('News_rec', this, 'green')" id="defaultOpen_rec">About</button>
<button class="tablink_rec" style='border-top: 5px solid blue'onclick="openPage_rec('Contact_rec', this, 'blue')">Apps & Data</button>
<button class="tablink_rec" style='border-top: 5px solid orange'onclick="openPage_rec('About_rec', this, 'orange')">DevOps</button>
<button class="tablink_rec" style='border-top: 5px solid pink'onclick="openPage_rec('Utilities_rec', this, 'pink')">Utilities</button>

<div id="Home_rec" class="tabcontent_rec">
  <h3>Home_rec</h3>
  <p>Home_rec is where the heart is..</p>
</div>

<div id="News_rec" class="tabcontent_rec">
  <h3>News_rec</h3>
  <p>Some News_rec this fine day!</p>
</div>

<div id="Contact_rec" class="tabcontent_rec">
  <h3>Contact_rec</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="About_rec" class="tabcontent_rec">
  <h3>About_rec</h3>
  <p>Who we are and what we do.</p>
</div>
<div id="Utilities_rec" class="tabcontent_rec">
  <h3>Utilities_rec</h3>
  <p>Who we are and what we do.</p>
</div>

<script>
function openPage_rec(pageName,elmnt,color) {
  var i, tabcontent_rec, tablink_recs;
  tabcontent_rec = document.getElementsByClassName("tabcontent_rec");
  for (i = 0; i < tabcontent_rec.length; i++) {
    tabcontent_rec[i].style.display = "none";
  }
  tablink_recs = document.getElementsByClassName("tablink_rec");
  for (i = 0; i < tablink_recs.length; i++) {
    tablink_recs[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen_rec").click();
</script>

</body>
</html>

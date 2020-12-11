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
.tablink_dev {
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

.tablink_dev:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent_dev {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home_dev {background-color: red;}
#News_dev {background-color: green;}
#Contact_dev {background-color: blue;}
#About_dev {background-color: orange;}
#Utilities_dev {background-color: pink;}
</style>
</head>
<body>

<button class="tablink_dev" style='border-top: 5px solid red' onclick="openPage_dev('Home_dev', this, 'red')">Stats</button>
<button class="tablink_dev" style='border-top: 5px solid green'onclick="openPage_dev('News_dev', this, 'green')" id="defaultOpen_dev">About</button>
<button class="tablink_dev" style='border-top: 5px solid blue'onclick="openPage_dev('Contact_dev', this, 'blue')">Apps & Data</button>
<button class="tablink_dev" style='border-top: 5px solid orange'onclick="openPage_dev('About_dev', this, 'orange')">DevOps</button>
<button class="tablink_dev" style='border-top: 5px solid pink'onclick="openPage_dev('Utilities_dev', this, 'pink')">Utilities</button>

<div id="Home_dev" class="tabcontent_dev">
  <h3>Home_dev</h3>
  <p>Home_dev is where the heart is..</p>
</div>

<div id="News_dev" class="tabcontent_dev">
  <h3>News_dev</h3>
  <p>Some News_dev this fine day!</p>
</div>

<div id="Contact_dev" class="tabcontent_dev">
  <h3>Contact_dev</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="About_dev" class="tabcontent_dev">
  <h3>About_dev</h3>
  <p>Who we are and what we do.</p>
</div>
<div id="Utilities_dev" class="tabcontent_dev">
  <h3>Utilities_dev</h3>
  <p>Who we are and what we do.</p>
</div>

<script>
function openPage_dev(pageName,elmnt,color) {
  var i, tabcontent_dev, tablink_devs;
  tabcontent_dev = document.getElementsByClassName("tabcontent_dev");
  for (i = 0; i < tabcontent_dev.length; i++) {
    tabcontent_dev[i].style.display = "none";
  }
  tablink_devs = document.getElementsByClassName("tablink_dev");
  for (i = 0; i < tablink_devs.length; i++) {
    tablink_devs[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen_dev").click();
</script>

</body>
</html>

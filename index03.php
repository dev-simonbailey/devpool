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
.tablink_index {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 5px 5px;
  font-size: 17px;
  width: 50%;
  min-height: 55px;
}

.tablink_index:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent_index {
  color: white;
  display: none;
  padding: 0px 0px;
  height: 100%;
}

#Home_index {background-color: #F0F0F0;}
#News_index {background-color: green;}

/* Style tab links */
.tablink_dev {
  background-color: #777;
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

<button class="tablink_index" onclick="openPage_index('Home_index', this, '#777')">Audience 1</button>
<button class="tablink_index" onclick="openPage_index('News_index', this, '#777')" id="defaultOpen_index">Audience 2</button>

<div id="Home_index" class="tabcontent_index">
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0' onclick="openPage_dev('Home_dev', this, 'red')">Stats</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('News_dev', this, 'green')" id="defaultOpen_dev">About</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('Contact_dev', this, 'blue')">Apps & Data</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('About_dev', this, 'orange')">DevOps</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('Utilities_dev', this, 'pink')">Utilities</button>
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
</div>

<div id="News_index" class="tabcontent_index">
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0' onclick="openPage_rec('Home_rec', this, 'red')" id="defaultOpen_rec">Item1</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('News_rec', this, 'green')">Item2</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('Contact_rec', this, 'blue')">Item3</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('About_rec', this, 'orange')">Item4</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('Utilities_rec', this, 'pink')">Item5</button>

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
</div>


<script>
function openPage_index(pageName,elmnt,color) {
  var i, tabcontent_index, tablink_indexs;
  tabcontent_index = document.getElementsByClassName("tabcontent_index");
  for (i = 0; i < tabcontent_index.length; i++) {
    tabcontent_index[i].style.display = "none";
  }
  tablink_indexs = document.getElementsByClassName("tablink_index");
  for (i = 0; i < tablink_indexs.length; i++) {
    tablink_indexs[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen_index").click();


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

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
  padding: 100px 20px;
  height: 100%;
}

#Home_index {background-color: red;}
#News_index {background-color: green;}

</style>
</head>
<body>

<button class="tablink_index" style='border-top: 5px solid red' onclick="openPage_index('Home_index', this, 'red')">Audience 1</button>
<button class="tablink_index" style='border-top: 5px solid green'onclick="openPage_index('News_index', this, 'green')" id="defaultOpen_index">Audience 2</button>

<div id="Home_index" class="tabcontent_index">
  <h3>Home_index</h3>
  <p>Home_index is where the heart is..</p>
</div>

<div id="News_index" class="tabcontent_index">
  <h3>News_index</h3>
  <p><a href='index2.php'>Go Go Go</a></p>
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
</script>

</body>
</html>

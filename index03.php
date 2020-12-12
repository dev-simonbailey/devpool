<?php ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* List Headers */
.custom-header-top{
  background-color: #777;
  color: #FFF;
  text-align: center;
  font-family:menlo,arial;
}
.custom-header-bot{
  background-color: #777;
  color: #FFF;
  text-align: center;
  font-family:menlo,arial;
}
li {
  text-align:left;
  font-family:menlo,arial;
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
  font-family:menlo,arial;
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
  font-family:menlo,arial;
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
#home_dev {background-color: #555;}
#about_dev {background-color: #555;}
#apps_dev {background-color: #555;}
#devops_dev {background-color: #555;}
#util_dev {background-color: #555;}


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
  font-family:menlo,arial;
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

.flex-grid-thirds {
  display: flex;
  justify-content: center;
}

@media (max-width: 400px) {
  .flex-grid,
  .flex-grid-thirds {
    display: block;
    .col {
      width: 100%;
      margin: 0 0 10px 0;
    }
  }
}
.col {
  background: #777;
  padding: 20px;
  border-radius:5px;
}
.box1 {
  border-radius:5px;
  border: 1px solid white;
  height:32px;
  width: 250px;
  font-family:menlo,arial;
}

.apply {
  border-radius:5px;
  border: 1px solid white;
  height:32px;
  width: 250px;
  font-family:menlo,arial;
  color: #555;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/multi-select.css">
</head>
<body>

<button class="tablink_index" onclick="openPage_index('Home_index', this, '#777')" id="defaultOpen_index">Audience 1</button>
<button class="tablink_index" onclick="openPage_index('News_index', this, '#777')">Audience 2</button>

<div id="Home_index" class="tabcontent_index">
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0' onclick="openPage_dev('home_dev', this, 'red')">Home</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('about_dev', this, 'green')" id="defaultOpen_dev">About</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('apps_dev', this, 'blue')">Apps & Data</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('devops_dev', this, 'orange')">DevOps</button>
  <button class="tablink_dev" style='border-top: 5px solid #F0F0F0'onclick="openPage_dev('util_dev', this, 'pink')">Utilities</button>
  <div id="home_dev" class="tabcontent_dev">
    <br />
    <center>
      <h1>Home</h1>
  </div>
  <div id="about_dev" class="tabcontent_dev">
    <br />
    <center>
      <h1>About</h1>
      <div class="flex-grid-thirds">
        <div class="col">
          <input class='box1' type='text' placeholder='First Name'>
          <br /><br />
          <input class='box1' type='text' placeholder='Last Name'>
          <br /><br />
          <input class='box1' type='text' placeholder='Email Address'>
          <br /><br />
          <input class='box1' type='text' placeholder='Contact Number'>
          <br /><br />
          <select name='looking'>
            <option value='CL'>Currently Looking</option>
            <option value='NL'>Not Looking</option>
          </select>
          <br /><br />
          <input class='box1' type='text' placeholder='Current Role'>
          <br /><br />
          <input class='box1' type='text' placeholder='Salary Required'>
          <br /><br />
          <input class='box1' type='text' placeholder='Notice Period'>
          <br /><br />
          <input class='box1' type='text' placeholder='Postcode'>
          <br /><br />
          <input class='apply' type='button' value='Apply'>
        </div>
      </div>
  </div>
  <div id="apps_dev" class="tabcontent_dev">
    <br />
    <center>
    <!-- start -->
    <h1>Applications & Data</h1>
    <select id='applicationdata' name='applicationdata' multiple>
      <option value='Python' selected>Python</option>
      <option value='Nginx'>NGINX</option>
      <option value='React'>React</option>
      <option value='Java'>Java</option>
      <option value='MySQL'>MySQL</option>
      <option value='Redis'>Redis</option>
      <option value='Amazon_EC2'>EC2</option>
      <option value='Amazon_S3'>S3</option>
      <option value='Django'>Django</option>
      <option value='Cloudfront'>Cloudfront</option>
      <option value='Go'>Go</option>
      <option value='Objective-C'>Objective-C</option>
      <option value='Backbone.js'>Backbone.js</option>
      <option value='Memcached'>Memcached</option>
      <option value='Hadoop'>Hadoop</option>
      <option value='Underscore'>Underscore</option>
      <option value='HBase'>HBase</option>
      <option value='Edgecast'>Edgecast</option>
      <option value='Qubole'>Qubole</option>
      <option value='mysql_utils'>mysqlutils</option>
    </select>
    <br />
    <input type='text' id='newApplicationData' style='width:342px;color:#555'>
    <button id='add-option-1'>+</button>
    <!-- ends -->
  </center>
  </div>
  <div id="devops_dev" class="tabcontent_dev">
    <br />
    <center>
    <!-- start -->
    <h1>Dev Ops</h1>
    <select id='devops' name='devops' multiple>
      <option value='Docker'>Docker</option>
      <option value='Webpack'>Webpack</option>
      <option value='Varnish'>Varnish</option>
      <option value='XCode'>XCode</option>
      <option value='Pingdom'>Pingdom</option>
      <option value='Zookeeper'>Zookeeper</option>
      <option value='Crittercism'>CritterCism</option>
      <option value='Teletraan'>Teletraan</option>
    </select>
    <br />
    <input type='text' id='newDevOpsData' style='width:342px;color:#555'>
    <button id='add-option-2'>+</button>
    <!-- ends -->
  </center>
  </div>
  <div id="util_dev" class="tabcontent_dev">
    <br />
    <center>
      <!-- start -->
      <h1>Utilities</h1>
      <select id='utilities' name='utilities' multiple>
        <option value='Amazon_Route_53'>Amazon Route 53</option>
        <option value='Sparkpost'>Sparkpost</option>
        <option value='Bitbar'>Bitbar</option>
      </select>
      <br />
      <input type='text' id='newUtilitiesData' style='width:342px;color:#555'>
      <button id='add-option-3'>+</button>
      <!-- ends -->
    </center>
  </div>
</div>

<div id="News_index" class="tabcontent_index">
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0' onclick="openPage_rec('Home_rec', this, 'red')" id="defaultOpen_rec">Item1</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('News_rec', this, 'green')">Item2</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('Contact_rec', this, 'blue')">Item3</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('About_rec', this, 'orange')">Item4</button>
  <button class="tablink_rec" style='border-top: 5px solid #F0F0F0'onclick="openPage_rec('Utilities_rec', this, 'pink')">Item5</button>

  <div id="Home_rec" class="tabcontent_rec">
    <br />
    <h3>Home_rec</h3>
    <p>Home_rec is where the heart is..</p>
  </div>

  <div id="News_rec" class="tabcontent_rec">
    <br />
    <h3>News_rec</h3>
    <p>Some News_rec this fine day!</p>
  </div>

  <div id="Contact_rec" class="tabcontent_rec">
    <br />
    <h3>Contact_rec</h3>
    <p>Get in touch, or swing by for a cup of coffee.</p>
  </div>

  <div id="About_rec" class="tabcontent_rec">
    <br />
    <h3>About_rec</h3>
    <p>Who we are and what we do.</p>
  </div>
  <div id="Utilities_rec" class="tabcontent_rec">
    <br />
    <h3>Utilities_rec</h3>
    <p>Who we are and what we do.</p>
  </div>
</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script src="js/jquery.multi-select.js"></script>
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
<script type="text/javascript">
let applicationdata = [];
let devops = [];
let utilities = [];
// run applicationdata
$('#applicationdata').multiSelect(
  {
    selectableHeader: "<div class='custom-header-top'>Select Skills</div>",
    selectableFooter: "<div class='custom-header-bot'>&nbsp;</div>",
    selectionHeader: "<div class='custom-header-top'>Selected Skills</div>",
    selectionFooter: "<div class='custom-header-bot'>&nbsp;</div>",
    afterSelect: function(values){
    applicationdata.push(values[0]);
    logToConsole();
  },
  afterDeselect: function(values)
    {
      const index = applicationdata.indexOf(values[0]);
      if (index > -1) {
        applicationdata.splice(index, 1);
      }
      logToConsole();
    }
  }
);
$('#add-option-1').on('click', function()
  {
    var newItem = $("#newApplicationData").val();
    $("#newApplicationData").val('');
    $('#applicationdata').multiSelect('addOption', { value: newItem, text: newItem, index: 0 });
    return false;
  }
);
// run devops
$('#devops').multiSelect(
  {
    selectableHeader: "<div class='custom-header'>Select Skills</div>",
    selectableFooter: "<div class='custom-header'>&nbsp;</div>",
    selectionHeader: "<div class='custom-header'>Selected Skills</div>",
    selectionFooter: "<div class='custom-header'>&nbsp;</div>",
    afterSelect: function(values){
    devops.push(values[0]);
    logToConsole();
  },
  afterDeselect: function(values)
    {
    const index = devops.indexOf(values[0]);
      if (index > -1) {
        devops.splice(index, 1);
      }
        logToConsole();
      }
  }
);
$('#add-option-2').on('click', function()
  {
    var newItem = $( "#newDevOpsData" ).val();
    $( "#newDevOpsData" ).val('');
    $('#devops').multiSelect('addOption', { value: newItem, text: newItem, index: 0 });
    return false;
  }
);
// run utilities
$('#utilities').multiSelect(
  {
    selectableHeader: "<div class='custom-header'>Select Skills</div>",
    selectableFooter: "<div class='custom-header'>&nbsp;</div>",
    selectionHeader: "<div class='custom-header'>Selected Skills</div>",
    selectionFooter: "<div class='custom-header'>&nbsp;</div>",
    afterSelect: function(values){
    utilities.push(values[0]);
    logToConsole();
  },
  afterDeselect: function(values)
    {
      const index = utilities.indexOf(values[0]);
      if (index > -1) {
        utilities.splice(index, 1);
      }
      logToConsole();
    }
  }
);
$('#add-option-3').on('click', function()
  {
    var newItem = $( "#newUtilitiesData" ).val();
    $( "#newUtilitiesData" ).val('');
    $('#utilities').multiSelect('addOption', { value: newItem, text: newItem, index: 0 });
    return false;
  }
);

function logToConsole(){
  console.clear();
  console.log("Applications & Data");
  console.log(applicationdata);
  console.log("Dev Ops");
  console.log(devops);
  console.log("Utilities");
  console.log(utilities);
}
</script>
</body>
</html>

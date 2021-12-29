<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>fivefivesix</title>
  <meta name="description" content="fivefivesix">
  <meta name="author" content="Simon Bailey">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,700" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
  <link href="./app/css/style.css" rel="stylesheet">
  <style>
    html {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      font-family: 'Dosis', sans-serif;
      line-height: 1.6;
      color: #888;
      background: #333333;
      }
    .item1 { grid-area: header; }
    .item2 { grid-area: left; }
    .item3 { grid-area: talent; }
    .item4 { grid-area: recruiter; }
    .item5 { grid-area: right; }
    .item6 { grid-area: footer; }

    .grid-container {
      display: grid;
      grid-template-areas:
        'header header header'
        'left talent right'
        'left recruiter right'
        'footer footer footer';
      grid-gap: 0px;
      background-color: #000;
      padding: 0px;
    }

    .grid-container > div {
      background-color: #333333;
      text-align: center;
      padding: 20px 0;
      font-size: 30px;
    }
    .boxes {
      height: 32px;
    }
    .buttons {
      height: 32px;
    }
</style>
</head>

<body>
<div class="grid-container">
  <div class="item1">fivefivesix</div>
  <div class="item2"></div> 
  <div class="item3">
    Talent
    <form name='talent-form' action='queries/talentLogin.php' method='POST'>
      <input class='boxes' type='text' name='email' placeholder='Email'>
      <input class='boxes' type='text' name='password' placeholder="Password">
      <input class='buttons'type='submit' value='Login'>
    </form>
  </div>  
  <div class="item5"></div> 
  <div class="item2"></div> 
  <div class="item4">
    Recruiter
    <form name='talent-form' action='queries/recruitLogin.php' method='POST'>
      <input class='boxes' type='text' name='email' placeholder='Email'>
      <input class='boxes' type='text' name='password' placeholder="Password">
      <input class='buttons'type='submit' value='Login'>
    </form>
  </div>
  <div class="item5"></div>
  <div class="item6">&copy; <?php echo date("d-m-Y");?></div>
</div>
</body>
</html>
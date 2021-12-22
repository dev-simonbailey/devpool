<?php

?>

<html>
<body>
<script>
   var person = {
    "id": 1,
    "name": "Simon Bailey",
    "email": "webdisk@hotmail.com",
    "roles": [
      {
        "Developer": "20",
        "Engineering Manager": "5",
        "Head of Development": "10"
      }
    ],
    "stack": [
      {
        "required": [
          {
            "HTML": "20"
          }
        ],
        "additional": [
          {
            "CSS": "20",
            "Javascript": "15"
          }
        ]
      }
    ],
    "tech_points": "1",
    "exp_points": "20"
  }
   document.write("Mr Ram has a car called" + " " + person.roles.Developer);
</script>
</body>
</html>
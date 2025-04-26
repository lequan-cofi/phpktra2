<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bear</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>

    <link rel="stylesheet" href="style.css" />
      
     
    </style>
  </head>
  <body>
    <form method="POST" action="../controllers/xllogin.php">  
      <?php
      // include("thanhphan/anh.php"); 
      ?>

      <div class="inputGroup inputGroup1">
        <label for="email1">Usename</label>
        <input type="text" id="usename" name="user" class="email" maxlength="256" value="" />
        
        <span class="indicator"></span>
      </div>
      <div class="inputGroup inputGroup2">
        <label for="password">Password</label>
        <input type="password" id="password" name="pass" class="password" value="" />
      </div>
      <div class="inputGroup inputGroup3">
        <button id="login" >Log in</button>
      </div>
    </form>
  </body>
  <script src="script.js"></script>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bear</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
      
     
    </style>
  </head>
  <body>
    <form method="POST" action="../controllers/xlresign.php">  
      <?php
      // include("thanhphan/anh.php"); 
      ?>

      <div class="inputGroup inputGroup1">
        <label for="usename">Usename</label>
        <input type="text" id="usename" name="user" class="use" maxlength="256" value=""required/>
        <span class="indicator"></span>
      </div>
      <div class="inputGroup inputGroup1">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="email" maxlength="256" value="" required />
        <span class="indicator"></span>
        </div>
      <div class="inputGroup inputGroup2">
        <label for="password">Password</label>
        <input type="password" id="password" name="pass" value="" required/>
      </div>
      <!-- <div class="inputGroup inputGroup2">
        <label for="repassword">Repassword</label>
        <input type="password" id="repassword" name="repass" value="" required/>
        <?php if (isset($repass_error)) : ?>
      <div style="color: red; font-size: 14px; margin-top: 4px;">
        <?php echo $repass_error; ?>
      </div>
    <?php endif; ?>
      </div> -->
      

      <div class="inputGroup inputGroup3">
        <button id="Resign" >Resign</button>
      </div>
    </form>
  </body>

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="check-password.js"></script> -->
</html>

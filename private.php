<?php require_once("app.php"); ?>
<!doctype html>
<html class="no-js" lang="en">
<?php require("include/header.php"); ?>
<body>

<?php require("include/top_menu.php"); ?>

  <br>
  <div class="row medium-8 large-7 columns">

    <?php if (isset($msgForm)) { ?>
    <div class="medium-8 medium-centered large-7 large-centered columns"> 
      <p class="text-center"><span class="secondary radius label"> <?=$msgForm ?> </span></p>
    </div>
    <?php 
    } 

    if(!$app->isLogged()) { // Shows the forms
    ?>

    <div class="row register">
      <div class="medium-8 medium-centered large-7 large-centered columns">
        <form method="post">
          <div class="row column log-in-form">
            <h4 class="text-center">Puede registrarse o <a href="javascript:;" class="swap">identificarse</a></h4>
            <label>Usuario
              <input type="text" name="username" placeholder="Username" required>
            </label>            
            <label>Email
              <input type="email" name="email" placeholder="somebody@example.com" required>
            </label>
            <label>Contraseña
              <input type="password" name="password" placeholder="Password" required>
            </label>
            <input type="hidden" name="sent" value="register">
            <p><input type="submit" class="button expanded" value="Registro"></p>
          </div>
        </form>
      </div>
    </div>
    <div class="row login">
      <div class="medium-8 medium-centered large-7 large-centered columns">
        <form method="post">
          <div class="row column log-in-form">
            <h4 class="text-center">Puede <a href="javascript:;" class="swap">registrarse</a> o identificarse</h4>
            <label>Email
              <input type="email" name="email" placeholder="somebody@example.com" required>
            </label>
            <label>Contraseña
              <input class="pass" type="password" name="password" placeholder="Password" required>
            </label>
            <input id="show-password" type="checkbox"><label for="show-password">Mostrar contraseña</label>
            <input type="hidden" name="sent" value="login">            
            <p><input type="submit" class="button expanded" value="Login"></p> 
          </div>
        </form>
      </div>
    </div>

    <?php

    } else { // The user has logged

      echo "<p> Bienvenido a la zona privada <i>" . $_SESSION["user"]["username"] . "</i> </p>";

    }

    ?>

  </div>

<?php require("include/footer.php"); ?>
<?php require("include/scripts.php"); ?>
</body>
</html>
<?php require_once("app.php"); ?>
<!doctype html>
<html class="no-js" lang="es">
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
    ?>
    <div class="row">
          <div class="medium-8 medium-centered large-7 large-centered columns">
            <form method="post">
              <div class="row column log-in-form">
                <h4 class="text-center">Formulario de contacto</h4>
                <label>Nombre:
                  <input type="text" name="name" placeholder="Introduzca su nombre" required>
                </label>            
                <label>Email
                  <input type="email" name="email" placeholder="somebody@example.com" required>
                </label>
                <label>Mensaje
                  <textarea name="message" required></textarea>
                </label>
                <p><input type="submit" class="button expanded" value="Contactar"></p>
              </div>
            </form>
          </div>
    </div>

  </div>

<?php require("include/footer.php"); ?>
<?php require("include/scripts.php"); ?>
</body>
</html>
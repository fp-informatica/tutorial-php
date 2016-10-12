  <div class="top-bar">
    <div class="top-bar-left">
      <ul class="menu">
        <li><a href="index.php">Portada</a></li>
        <li><a href="private.php">Zona privada</a></li>
        <li><a href="#">Contacto</a></li>
        <?php if($app->isLogged()) { ?> <li><a href="index.php?action=logout">Cerrar sesión</a></li> <? } ?>
      </ul>
    </div>
  </div>
<?php require_once("app.php"); ?>
<!doctype html>
<html class="no-js" lang="es">
<?php require("include/header.php"); ?>
<body>

<?php require("include/top_menu.php"); ?>

  <div class="callout large primary">
    <div class="row column text-center">
      <h1>Sistema de registro de usuarios</h1>
      <h2 class="subheader">Foundation + PHP</h2>
    </div>
  </div> 

  <div class="row">
    <div class="medium-4 columns">
      <h3>Requisitos</h3>
        <ul>
          <li>Apache o Nginx</li>
          <li>MySQL</li>          
          <li>PHP</li>
        </ul>
        <p>Definir parámetros de conexion (<i>db.php</i>)</p>
        <blockquote>
          const SERVER_DB = '';  <br>
          const USER_DB   = '';  <br>
          const PASS_DB   = '';  <br>
          const DB_NAME   = '';   
        </blockquote>
    </div>  
    <div class="medium-5 columns">
      <h3>SQL</h3>
      <div class="panel callout radius">
        <code>
          CREATE TABLE IF NOT EXISTS `users` (<br>
          `id` int unsigned NOT NULL AUTO_INCREMENT,<br>
          `username` varchar(40) NOT NULL,<br>
          `password` varchar(40) NOT NULL,<br>
          `email` varchar(100) NOT NULL,<br>
          `regdate` int unsigned NOT NULL,<br>
          `ip` varchar(40) NOT NULL,<br>
          PRIMARY KEY (`id`)<br>
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        </code>
      </div>
    </div>

    <div class="medium-3 columns">
      <h3>Enlaces de interés</h3>
      <ol>
        <li><a href="https://github.com/jslirola/tutorial-php" target="_blank">Repositorio en Github</a></li>
        <li><a href="http://stackoverflow.com/questions/tagged/foundation" target="_blank">Stackoverflow</a></li>
        <li><a href="http://foundation.zurb.com/" target="_blank">Foundation (front-end framework)</a></li>
        <li><a href="http://php.net/docs.php" target="_blank">Documentación PHP</a></li>
        <li><a href="https://dev.mysql.com/doc/" target="_blank">Documentación MySQL</a></li>
        <li><a href="http://api.jquery.com/" target="_blank">Documentación jQuery</a></li>
      </ol>
    </div>
  </div>

  <div class="row medium-8 large-7 columns">

  </div>

<?php require("include/footer.php"); ?>
<?php require("include/scripts.php"); ?>
</body>
</html>

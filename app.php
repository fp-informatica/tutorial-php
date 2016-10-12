<?php
/**
 * Tutorial PHP
 *
 * @author jslirola <jslirola@andalucia-devs.com>
 * @license http://opensource.org/licenses/mit.php MIT License
 * @link https://github.com/jslirola/tutorial-php 
 */
session_start();
header('Content-Type: text/html; charset=UTF-8');

$config = "include/db.php";
if(file_exists($config))
    require_once("include/db.php");
else
    die("Debe renombrar el fichero include/db_example.php a include/db.php para iniciar el sistema.");

class Tutorial_PHP
{

    private $link;

    /**
     * Instantiate the connection
     */
    public function __construct()
    {
        if (DB_NAME == "")
            die("Configure la conexión a la base de datos en el fichero `include/db.php` antes de continuar.");
        else {
            $this->link = new mysqli(SERVER_DB, USER_DB, PASS_DB, DB_NAME);
            if ($this->link->connect_error)
                die("Connect Error (" . $this->link->connect_errno . ") " . $this->link->connect_error);
        }
    }

    /**
     * Generate a hash for the password. NEVER IN PLAIN-TEXT!
     * @param string $str The original password
     * @param string $salt String to reinforce the security
     * @return string
     */
    public static function genHash($str, $salt = "")
    {
        $hash = sha1(md5(sha1($salt.$str.$salt)).$salt);
        return $hash;
    }    

    /**
     * Check if an user exists through an email
     * @param string $email The email user
     * @return int
     */
    private function checkEmail($email)
    {
        $email = $this->link->real_escape_string($email);
        $this->link->query("SELECT email FROM users WHERE email = '$email'");
        return $this->link->affected_rows;
    }

    /**
     * Retrieve all data user
     * @param string $email The email user
     * @return array
     */
    private function getUserInfo($email)
    {
        $email = $this->link->real_escape_string($email);
        $result = $this->link->query("SELECT * FROM users WHERE email = '$email'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row;        
    }

    /**
     * Check if an user is logged
     * @return boolean
     */
    public function isLogged()
    {
        return (isset($_SESSION["logged"]) && $_SESSION["logged"] == 1);
    }

    /**
     * Insert new row on table users
     * @param string $username The username
     * @param string $email The email
     * @param string $password The original password
     * @return string
     */
    public function registerUser($username, $email, $password)
    {
        if (!empty($email) && $this->checkEmail($email) == 0) {
            if (empty($username) || empty($password))
                return "Todos los campos son obligatorios.";

            $username = $this->link->real_escape_string($username);
            $email = $this->link->real_escape_string($email);
            $regdate = time();
            $password = $this->genHash($password, $regdate);
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($this->link->query("INSERT INTO users (username, password, email, regdate, ip) VALUES 
                ('$username','$password','$email','$regdate','$ip')"))
                return "Alta realizada correctamente.";
            else
                return "Ha ocurrido un error durante su registro.";
        } else
            return "El email introducido no es correcto o ya existe.";
    }

    /**
     * Try login a user within the system
     * @param string $username The username
     * @param string $email The email
     * @param string $password The original password
     * @return string
     */
    public function loginUser($email, $password)
    {
        if (!empty($email) && $this->checkEmail($email) == 1) {
            $email = $this->link->real_escape_string($email);
            $info = $this->getUserInfo($email);
            if ($info != null) {
                $password = $this->genHash($password, $info["regdate"]);
                if($password == $info["password"]) {
                    $_SESSION["logged"] = 1;
                    $_SESSION["user"] = $info;
                    return "Se ha identificado correctamente.";
                }
            }
        }
        return "El email o la contraseña introducida no son correctos.";
    }

    /**
     * Logout a user
     * @return string
     */
    public function logout()
    {
        if ($this->isLogged()) {
            session_unset();
            session_destroy();
            return "Se ha desconectado correctamente.";
        } else
            return "Ha ocurrido un error al desconectarse.";
    }

}

$app = new Tutorial_PHP;

if (isset($_POST["sent"])) { // A form has been sent

    if ($_POST["sent"] == "register") {
        $msgForm = $app->registerUser($_POST["username"], $_POST["email"], $_POST["password"]);
    } elseif ($_POST["sent"] == "login") {
        $msgForm = $app->loginUser($_POST["email"], $_POST["password"]);
    } elseif ($_POST["sent"] == "logout") {
        $msgForm = $app->logout();
    } else
        die();
} else if (isset($_GET['action'])) {

    if ($_GET['action'] == "logout") {
        $msgForm = $app->logout();
    } else
        die();

}

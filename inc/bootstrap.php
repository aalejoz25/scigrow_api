<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");

// include main configuration file
require_once PROJECT_ROOT_PATH . "/inc/config.php";

// include the base controller file
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";

// include the use clases file
require_once PROJECT_ROOT_PATH . "/clases/Usuario.php";
?>
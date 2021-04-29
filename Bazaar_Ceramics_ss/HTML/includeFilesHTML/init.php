<?php
  ob_start();
  session_start();

  $addRoot = strpos($_SERVER['SCRIPT_NAME'], '/Bazaar_Ceramics_ss') + 19;
  $docRoot = substr($_SERVER['SCRIPT_NAME'], 0, $addRoot);
  define("getRoot", $docRoot);

  require_once ('includeFilesHTML/phpFunctions.php');
  require_once ('includeFilesHTML/db.php');
?>
<?php
// Defines a named constant to a variable
define("dBServerName", "localhost");
define("dbUserName", "dbusername");
define("dbPassword", "dbpassword");
define("dbName", "bazaarceramics_db");
// Starts a connection with the database or a fail message
function dbConnect() {
  $dbconnect = mysqli_connect(dBServerName, dbUserName, dbPassword, dbName);
  dbConnectFailed();
  return $dbconnect;
}
// Assigns function above to a short variable
$db = dbConnect();
/* If database fails to connect adds errors 
and errors number to a message to display */
function dbConnectFailed() {
  if(mysqli_connect_errno()) {
    $dbErrMsg = "Database connection failed due to: ";
    $dbErrMsg .= mysqli_connect_error();
    $dbErrMsg .= " (" . mysqli_connect_errno() . ")";
    exit($dbErrMsg);
  }
}
// Disconnects from database if it has a connection 
function dbDisconnect($db) {
  if(isset($db)) {
    mysqli_close($db);
  }
}
// Removes special characters in the $string variable to the database
function dbEscStr($db, $string) {
  return mysqli_real_escape_string($db, $string);
}
// Confirms if database returns a result
function confirmResultSet($resultSet) {
global $db;
  if (!$resultSet) {
    echo mysqli_error($db);
    dbDisconnect($db);
    exit("Database query failed.");
  }
}

?>
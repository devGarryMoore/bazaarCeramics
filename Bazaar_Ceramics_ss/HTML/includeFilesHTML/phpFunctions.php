<?php
  // Remove all html special character from the variable $string
  function HTMLSC($string="") {
    return htmlspecialchars($string);
  }
  // Function used for post method
  function postRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
  }
  // Uses header method to set the url to folder path in $location
  function redirectTo($location) {
    header("Location: " . $location);
    exit;
  }
  /* Checks for "/" else appends folder path to getRoot variable
  which get the server name in this case localhost */
  function urlGoTo($locationPath) {
    // add the leading '/' if not present
    if($locationPath[0] != '/') {
      $locationPath = "/" . $locationPath;
    }
    return getRoot . $locationPath;
  }
  function urlToEncode($string="") {
    return urlencode($string);
  }
  /* Set cart quantity based if anything is present 
  using the itemsInCart function results */
  function displayCartQty($itemsInCart){
    if(isset($itemsInCart)){
      $cartItems = mysqli_fetch_assoc($itemsInCart);
      $cartQty = $cartItems['OrderQuantity'];
    } else {
      $cartQty = '0';
    }
  return $cartQty;
  }
/* Validation functions */
  // Checks for no value validation and trims for spaces
  function blank($value) {
    return !isset($value) || trim($value) === '';
  }
  // User ID validation using regex
  function UserIDRegexErr($value) {
    $UserIDRegex = '/^[^\\\\.%@?\/]*$/';
    return preg_match($UserIDRegex, $value);
  }
  // Password validation using regex
  function PasswordRegexErr($value) {
    $PasswordRegex = '/^$|^[a-zA-Z0-9.\/]{6,}$/';
    return preg_match($PasswordRegex, $value);
  }
  // Phone number validation using regex
  function PhoneNumberRegexErr($value){
    $PhoneNumberRegex = '/^\d+$/';
    return preg_match($PhoneNumberRegex, $value);
  }
  // Email validation using regex
  function EmailRegexErr($value) {
    $EmailRegex = '/^$|@/';
    return preg_match($EmailRegex, $value);
  }
  // Email validation using regex
  function QuantityRegexErr($value) {
    $QuantityRegex = '/^[1-9]\d*$/';
    return preg_match($QuantityRegex, $value);
  }
/* Query functions */
// Creates customer
function insertNewCustomerReg($customer) {
  global $db;

  $sql = "INSERT INTO customer ";
  $sql .= "(CustomerGivenName, CustomerLastName, CustomerEmail, CustomerAddress, CustomerSuburb, CustomerState, CustomerPostCode, CustomerCountry, CustomerPhoneNumber, CustomerAccountFlag) ";
  $sql .= "VALUES (";
  $sql .= "'" . dbEscStr($db, $customer['GivenName']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['LastName']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['Email']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['Address']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['Suburb']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['State']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['PostCode']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['Country']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['PhoneNumber']) . "',";
  $sql .= "'" . dbEscStr($db, $customer['AccountFlag']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  if($result) {
    return true;
  } else {
    echo mysqli_error($db);
    dbDisconnect($db);
    exit;
  }
}
/* Hashes password, checks for Customer ID in database, 
checks for if UserID not taken in database then creates member */
function insertNewMemberReg($member) {
  global $db;
  global $errorMsg;

  $HashedPassword = password_hash($member['Password'], PASSWORD_BCRYPT);

  $query1 = "SELECT CustomerID FROM customer WHERE CustomerID ='".dbEscStr($db, $member['CustomerID'])."'";
  $result1 = mysqli_query($db, $query1);
  $foundResults1 = mysqli_fetch_assoc($result1);
  if(isset($foundResults1)) {
    $query2 = "SELECT UserID FROM member WHERE UserID ='".dbEscStr($db, $member['UserID'])."'";
    $result2 = mysqli_query($db, $query2);
    $foundResults2 = mysqli_fetch_assoc($result2);
    if(empty($foundResults2)) {
      $sql = "INSERT INTO member ";
      $sql .= "(CustomerID, UserID, HashedPassword) ";
      $sql .= "VALUES (";
      $sql .= "'" . dbEscStr($db, $member['CustomerID']) . "',";
      $sql .= "'" . dbEscStr($db, $member['UserID']) . "',";
      $sql .= "'" . dbEscStr($db, $HashedPassword) . "'";
      $sql .= ")";
      $result3 = mysqli_query($db, $sql);
      if($result3) {
        return true;
      } else {
        echo mysqli_error($db);
        dbDisconnect($db);
        exit;
      }
    } else {
      $errorMsg[5] = "<p class='errors'>That User ID is already been used please try another User ID!</p>";
    }
  } else {
    $errorMsg[4] = "<p class='errors'>Couldn't register try again or use link above and register as a customer first!</p>";
  }
}
/* Search for UserID and sets member information to $memberResults
used later to log on member */
function findMemberByUserID($memberLogIn) {
  global $db;

  $sql = "SELECT * FROM member ";
  $sql .= "WHERE UserID='" . dbEscStr($db, $memberLogIn['UserID']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirmResultSet($result);
  $memberResults = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $memberResults;
}
/* Search for product exists in database */
function findProductByProductTitle($productInfo) {
  global $db;

  $sql = "SELECT * FROM product ";
  $sql .= "WHERE ProductTitle='" . dbEscStr($db, $productInfo['CRBTitle']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirmResultSet($result);
  $productResults = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $productResults;
}
// Add order to database or update existing order
function addToOrder($productResults, $productInfo) {
  global $db;
  $orderDate = date('Y-m-d');

  if(!isset($_SESSION['orderID'])) {
    $sql = "INSERT INTO orders ";
    $sql .= "(CustomerID, OrderDate) ";
    $sql .= "VALUES (";
    $sql .= "'" . dbEscStr($db, $_SESSION['memberCustomerID']) . "',";
    $sql .= "'" . dbEscStr($db, $orderDate) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    $orderID = mysqli_insert_id($db);
    $_SESSION['orderID'] = $orderID;
    if($result) {
      $sql2 = "INSERT INTO orderline ";
      $sql2 .= "(OrderID, ProductID, OrderQuantity) ";
      $sql2 .= "VALUES (";
      $sql2 .= "'" . dbEscStr($db, $orderID) . "',";
      $sql2 .= "'" . dbEscStr($db, $productResults['ProductID']) . "',";
      $sql2 .= "'" . dbEscStr($db, $productInfo['CRBQuantity']) . "'";
      $sql2 .= ")";
      $result2 = mysqli_query($db, $sql2);
      confirmResultSet($result2);
    } else {
      echo mysqli_error($db);
      dbDisconnect($db);
      exit;
    }
  } else {
    $sql = "SELECT * FROM orderline WHERE ";
    $sql .= "OrderID = ";
    $sql .= "'" . dbEscStr($db, $_SESSION['orderID']) . "'";
    $sql .= " AND ProductID = ";
    $sql .= "'" . dbEscStr($db, $productResults['ProductID']) . "'";
    $result = mysqli_query($db, $sql);
    confirmResultSet($result);
    if(mysqli_num_rows($result) > 0) {
      $productQty = mysqli_fetch_assoc($result);
      $newProdQty = $productQty['OrderQuantity'] + $productInfo['CRBQuantity']; 
      $sql2 = "UPDATE orderline SET OrderQuantity = ";
      $sql2 .= "'" . dbEscStr($db, $newProdQty) . "'";
      $sql2 .= " WHERE ProductID = ";
      $sql2 .= "'" . dbEscStr($db, $productResults['ProductID']) . "'";
      $sql2 .= " AND OrderID = ";
      $sql2 .= "'" . dbEscStr($db, $_SESSION['orderID']) . "'";
      $result2 = mysqli_query($db, $sql2);
      confirmResultSet($result2);
    } else {
      $sql2 = "INSERT INTO orderline ";
      $sql2 .= "(OrderID, ProductID, OrderQuantity) ";
      $sql2 .= "VALUES (";
      $sql2 .= "'" . dbEscStr($db, $_SESSION['orderID']) . "',";
      $sql2 .= "'" . dbEscStr($db, $productResults['ProductID']) . "',";
      $sql2 .= "'" . dbEscStr($db, $productInfo['CRBQuantity']) . "'";
      $sql2 .= ")";
      $result2 = mysqli_query($db, $sql2);
      confirmResultSet($result2);
    }
  }
  echo '<script type="text/javascript">window.opener.location.reload(); window.close();</script>';
}
// Total OrderQuantity
function totalOrderQty(){
  global $db;

  if(isset($_SESSION['orderID'])) {
  $sql = "SELECT SUM(OrderQuantity) ";
  $sql .= "FROM orderline ";
  $sql .= "WHERE OrderID = '" . dbEscStr($db, $_SESSION['orderID']) . "'";
  $result = mysqli_query($db, $sql);
  confirmResultSet($result);
  $cartQty = mysqli_fetch_assoc($result);
  $_SESSION['cartQty'] = $cartQty['SUM(OrderQuantity)'];
  } else {
  $_SESSION['cartQty'] = '0';
  }
}
// Query for products in orderline cart
function itemsInCart() {
  global $db;

  if(isset($_SESSION['orderID'])) {
  $sql = "SELECT orderline.ProductID, product.ProductDescription, orderline.OrderQuantity, product.ProductPrice ";
  $sql .= "FROM orderline ";
  $sql .= "INNER JOIN product ON orderline.ProductID=product.ProductID ";
  $sql .= "WHERE orderline.OrderID = '" . dbEscStr($db, $_SESSION['orderID']) . "'";
  $result = mysqli_query($db, $sql);
  confirmResultSet($result);
  return $result;
  }
}
// Delete orderline products
function deleteItem($deleteThis) {
  global $db;

  $sql = "DELETE FROM orderline WHERE ";
  $sql .= "OrderID = '" . dbEscStr($db, $_SESSION['orderID']) . "' "; 
  $sql .= "AND ProductID = '" . dbEscStr($db, $deleteThis) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirmResultSet($result);
  return $result;
}
// Delete order and orderline products
function deleteCart() {
  global $db;

  $sql = "DELETE a.*, b.* ";
  $sql .= "FROM orders a ";
  $sql .= "LEFT JOIN orderline b ";
  $sql .= "ON b.OrderID = a.OrderID ";
  $sql .= "WHERE a.OrderID = '" . dbEscStr($db, $_SESSION['orderID']) . "'";
  $result = mysqli_query($db, $sql);
  confirmResultSet($result);
  if($result){
    unset($_SESSION['orderID']);
    unset($_SESSION['cartQty']);
  }
  return $result;
}
// Confirm order information
function completeOrder() {
  global $db;

  $sql = "SELECT p.OrderID, p.OrderDate, c.CustomerID, c.CustomerGivenName, c.CustomerLastName, c.CustomerAddress, c.CustomerSuburb, c.CustomerState, c.CustomerPostCode ";
  $sql .= "FROM orders p ";
  $sql .= "LEFT JOIN customer c ON p.CustomerID = c.CustomerID ";
  $sql .= "WHERE p.OrderID = '" . dbEscStr($db, $_SESSION['orderID']) . "'";
  $result = mysqli_query($db, $sql);
  return $result;
}
/* Authenication functions */
// Set member info to sessions
function setLogInMemberInfo($memberResults) {
  session_regenerate_id();
  $_SESSION['memberCustomerID'] = $memberResults['CustomerID'];
  $_SESSION['lastLogin'] = time();
  $_SESSION['memberUserID'] = $memberResults['UserID'];
  return true;
}
/* Disable session information about member which is used to 
log out member also disconnects incase connection is still open */
function logOutMember() {
  unset($_SESSION['memberCustomerID']);
  unset($_SESSION['lastLogin']);
  unset($_SESSION['memberUserID']);
  dbDisconnect($db);
  return true;
}
// Check logged in session variable exists
function isLoggedIn() {
  return isset($_SESSION['memberCustomerID']);
}
// Check if not logged, redirect to index page if true
function requireLogin() {
  if(!isLoggedIn()) {
    $_SESSION['accessDenied'] = '<p class="failed">Access denied, please log on or register to gain access to that page!</p>';
    redirectTo(urlGoTo('Index.php'));
  }
}
?>
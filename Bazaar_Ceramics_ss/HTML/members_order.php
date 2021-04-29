<?php 
require_once 'includeFilesHTML/init.php';
requireLogin();
if(postRequest()) {
  $productInfo = [];
  $productInfo['CRBTitle'] = $_POST['CRBTitle'] ?? '';
  $productInfo['CRBQuantity'] = $_POST['CRBQuantity'] ?? '';

  $noErr = true;
  if(!QuantityRegexErr($_POST['CRBQuantity'])){
    $errorMsg[1] = "<p class='errors'>Quantity must be numeric and greater than zero</p>";
    $noErr = false;
  }
  if($noErr === true) {
    $productResults = findProductByProductTitle($productInfo);
    if($productResults) {
      addToOrder($productResults, $productInfo);
    } else {
      $errorMsg[2] = "<p class='errors'>Product unavailable!</p>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta name="description" content="Bazaar Ceramics - The ceramic art studio produces quality domestic ware and fine individually designed art pieces for the individual and corporate collector. Ceramics, pottery, clay, bazaar ceramics, gallery">
  <meta name="keywords" content="ceramics, pottery, clay, bazaar ceramics, gallery">
  <title>Copper Red Bowl</title>
  <link rel="stylesheet" href="../CSS/membersOrder.css">
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="displayImg();setFormData();">
<!-- Header section -->
<div id="Header"></div>
<!-- Content section -->
<div id="Content">
<!-- Image Content section -->
<div id="imageCRB"></div>
<!-- Form Content section -->
<div id="Form">
  <h2>Order Details</h2>
    <div id="Form_Content">           
    <form id="thisForm" action="#" method="POST" onsubmit="confirmOrder();">
      <?php if(isset($errorMsg[2])) {echo $errorMsg[2];}?>
      <label for="CRBTitle">Title: </label>
      <input type="text" name="CRBTitle" id="CRBTitle" value="Copper Red Bowl" readonly>
      <label for="CRBDesc">Description: </label>
      <textarea name="CRBDesc" id="CRBDesc" readonly></textarea>
      <label for="CRBQuantity">Quantity: </label>
      <input type="number" name="CRBQuantity" id="CRBQuantity" value="1">
      <?php if(isset($errorMsg[1])) {echo $errorMsg[1];}?>
      <label for="CRBPrice">Price: $</label>
      <input type="number" name="CRBPrice" id="CRBPrice" value="150" readonly>
      <input type="button" name="calculateTotal" id="calculateTotal"  value="Calculate Total" onclick="calTotal();">
      <label for="CRBTotalPrice">Total Price: $</label>
      <input type="number" name="CRBTotalPrice" id="CRBTotalPrice" value="0" readonly>
      <input type="button" name="Clear" id="Clear" value="Clear">
      <input type="submit" name="Submit" id="Submit" value="Add to Cart">
    </form>
  </div>
</div>
<!--End Content section -->
</div>
<!-- Footer section -->
<div id="Footer">
	<a href="#" onclick="closeWindow();">Close</a>
</div>
<!-- Script section -->
<script src="../scripts/members_order.js" async></script>
<script src="../scripts/forms.js"></script>
</body>
</html>
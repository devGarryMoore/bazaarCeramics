<?php 
require_once 'includeFilesHTML/init.php';
requireLogin();
$pageTitle = 'Confirm Order';
include 'includeFilesHTML/formHeader.php';

$itemsInCart=itemsInCart();
$customerInfo=completeOrder();
$_SESSION['cartTotal'] = 0;

if(postRequest()) {
  unset($_SESSION['cartQty']);
  unset($_SESSION['orderID']);
  echo '<script type="text/javascript">window.opener.location.reload(); window.close();</script>';
}
?>
<!-- content wrapper -->
<div id="contentWrapper">
<!--Content-->
<h2 class="shopCartFormHeading">Order Complete</h2>
<form action="confirmOrder.php" method="post">
  <div id="orderInfoSection">
    <label class="confirmOrderLabel" for="OrderID">Order number:</label>
    <label class="confirmOrderLabel" for="OrderDate">Order Date:</label>
    <?php while($custInfo = mysqli_fetch_assoc($customerInfo)) {?>
      <input class="confirmOrderInput" type="text" name="OrderID" value="<?php echo HTMLSC($custInfo['OrderID']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="OrderDate" value="<?php echo HTMLSC($custInfo['OrderDate']); ?>" readonly>
  </div>
  <div id="customerInfoSection">
    <label class="confirmOrderLabel" for="CustomerGivenName">Given Name: </label>
    <label class="confirmOrderLabel" for="CustomerLastName">Last Name: </label>
    <label class="confirmOrderLabel" for="CustomerAddress">Address: </label>
    <label class="confirmOrderLabel" for="CustomerSuburb">Suburb: </label>
    <label class="confirmOrderLabel" for="CustomerState">State: </label>
    <label class="confirmOrderLabel" for="CustomerPostCode">Post Code: </label>
      <input class="confirmOrderInput" type="text" name="CustomerGivenName" value="<?php echo HTMLSC($custInfo['CustomerGivenName']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="CustomerLastName" value="<?php echo HTMLSC($custInfo['CustomerLastName']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="CustomerAddress" value="<?php echo HTMLSC($custInfo['CustomerAddress']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="CustomerSuburb" value="<?php echo HTMLSC($custInfo['CustomerSuburb']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="CustomerState" value="<?php echo HTMLSC($custInfo['CustomerState']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="CustomerPostCode" value="<?php echo HTMLSC($custInfo['CustomerPostCode']); ?>" readonly>
    <?php } ?>
  </div>
  <div id="productOrderInfoSection">
    <label class="confirmOrderLabel" for="ProductID">Product Code: </label>
    <label class="confirmOrderLabel" for="ProductDescription">Description: </label>
    <label class="confirmOrderLabel" for="OrderQuantity">Quantity Ordered: </label>
    <label class="confirmOrderLabel" for="ProductPrice">Unit Price: </label>
    <label class="confirmOrderLabel" for="TotalLinePrice">Total Line Price: </label>
    <?php while($cartItem = mysqli_fetch_assoc($itemsInCart)) {?>
      <input class="confirmOrderInput" type="text" name="ProductID" value="<?php echo HTMLSC($cartItem['ProductID']); ?>" readonly>
      <textarea class="confirmOrderInput" id="COtextarea" type="text" name="ProductDescription" readonly><?php echo HTMLSC($cartItem['ProductDescription']); ?></textarea>
      <input class="confirmOrderInput" type="text" name="OrderQuantity" value="<?php echo HTMLSC($cartItem['OrderQuantity']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="ProductPrice" value="<?php echo HTMLSC($cartItem['ProductPrice']); ?>" readonly>
      <input class="confirmOrderInput" type="text" name="TotalLinePrice" value="<?php echo number_format(HTMLSC($cartItem['OrderQuantity'])*HTMLSC($cartItem['ProductPrice']), 2); ?>" readonly>
    <?php 
      $_SESSION['cartTotal']+=(HTMLSC($cartItem['OrderQuantity'])*HTMLSC($cartItem['ProductPrice']));
    } 
    ?>
  </div>
  <div id="totalCartPrice">
    <label class="confirmOrderLabel" for="cartTotal">Total Price: </label>
      <input class="confirmOrderInput" type="text" name="cartTotal" value="<?php echo number_format($_SESSION['cartTotal'], 2); ?>" readonly>
    <button type="submit" name="submit">Payment</button>
  </div>
</form>
<!-- end wrapper -->
</div>
<?php include 'includeFilesHTML/footer.php';?>
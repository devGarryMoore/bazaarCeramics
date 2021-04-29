<?php 
require_once 'includeFilesHTML/init.php';
requireLogin();
$pageTitle = 'Shopping Cart';
include 'includeFilesHTML/formHeader.php'; 

totalOrderQty();
$itemsInCart=itemsInCart();
$_SESSION['orderID'] ?? '';
$_SESSION['cartQty'] ?? 0;
$_SESSION['cartTotal'] = 0;

if(isset($_GET['id'])) {
  $deleteThis = $_GET['id'];
  deleteItem($deleteThis);
  echo '<script type="text/javascript">window.opener.location.reload(); window.location.href="shoppingCart.php";</script>';
}
if(isset($_GET['delete'])) {
  deleteCart();
  echo '<script type="text/javascript">window.opener.location.reload(); window.close();</script>';
}
if(postRequest()) {
  redirectTo(urlGoTo('/HTML/confirmOrder.php'));
}
?>
<!-- content wrapper -->
<div id="contentWrapper">
<!--Content-->
<h2 class="shopCartFormHeading">Your Shopping Cart</h2>
  <?php if($_SESSION['cartQty'] > 0) { ?>
    <form action="shoppingCart.php" method="post">
      <div id="shopCartForm">
        <label id="ProductIDLabel" for="ProductID">Product Code: </label>
        <label id="ProductDescriptionLabel" for="ProductDescription">Description: </label>
        <label id="OrderQuantityLabel" for="OrderQuantity">Quantity Ordered: </label>
        <label id="ProductPriceLabel" for="ProductPrice">Unit Price: </label>
        <label id="TotalLinePriceLabel" for="TotalLinePrice">Total Line Price: </label>
        <a class="deleteBtn" href="<?php echo urlGoTo('HTML/shoppingCart.php?delete=all'); ?>">Delete Cart</a>
        <?php while($cartItem = mysqli_fetch_assoc($itemsInCart)) {?>
          <input class="ProductIDInputs" type="text" name="ProductID" value="<?php echo HTMLSC($cartItem['ProductID']); ?>" readonly>
          <textarea class="ProductDescriptionInputs" type="text" name="ProductDescription" readonly><?php echo HTMLSC($cartItem['ProductDescription']); ?></textarea>
          <input class="OrderQuantityInputs" type="text" name="OrderQuantity" value="<?php echo HTMLSC($cartItem['OrderQuantity']); ?>" readonly>
          <input class="ProductPriceInputs" type="text" name="ProductPrice" value="<?php echo HTMLSC($cartItem['ProductPrice']); ?>" readonly>
          <input class="TotalLinePriceInputs" type="text" name="TotalLinePrice" value="<?php echo number_format(HTMLSC($cartItem['OrderQuantity'])*HTMLSC($cartItem['ProductPrice']), 2); ?>" readonly>
          <a class="deleteBtn" href="<?php echo urlGoTo('HTML/shoppingCart.php?id=' . HTMLSC(urlToEncode($cartItem['ProductID']))); ?>">Delete</a>
        <?php 
          $_SESSION['cartTotal']+=(HTMLSC($cartItem['OrderQuantity'])*HTMLSC($cartItem['ProductPrice']));
        } 
        ?>
      </div>
      <div id="totalCartPrice">
        <label class="confirmOrderLabel" for="cartTotal">Total Price: </label>
          <input class="confirmOrderInput" type="text" name="cartTotal" value="<?php echo number_format($_SESSION['cartTotal'], 2); ?>" readonly>
      </div>
      <div id="formBtns">
        <button type="submit" name="submit">Confirm Order</button>  
        <button type="submit" name="close" onclick="closeWindow()">Close</button>
      </div>
    </form>
  <?php } else { ?>
    <h3 id="emptyShopCart">Looks like you don"t have any items in your cart.</h3>
    <div id="formBtns">
      <button type="submit" name="cancel" id="noItemsCloseBtn" onclick="closeWindow()">Close</button>
    </div>
  <?php } ?>
<!-- end wrapper -->
</div>

<?php include 'includeFilesHTML/footer.php';?>
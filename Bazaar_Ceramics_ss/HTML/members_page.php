<?php 
require_once 'includeFilesHTML/init.php';
requireLogin();
$pageTitle = 'Members Page';
$pageCSS = '<link rel="stylesheet" type="text/css" href="../CSS/membersPage.css">';
$pageScript = '<script src="../scripts/forms.js"></script>';
include 'includeFilesHTML/header.php';

$_SESSION['orderID'] ?? '';
totalOrderQty();
?>
<div id="shopCartSection">
  <a id="shopCartLink" href="shoppingCart.php" target="_blank" onclick="return openFormPage(this);"><span id="shopCartTotal"><?php echo $_SESSION['cartQty'] ?? '0';?></span>Items in Cart</a>
</div>
<!-- Main heading section -->
<div id="Page_Heading"><h1>Bazaar Ceramics – Members</h1></div>
<!-- Sub heading section -->
<div id="Sub_Heading"><h2>Members Prices</h2></div>
<!-- Content section -->
<div id="Content_Area">
    <h3 id="discountItemsHeading">Discounted Items</h3>
    <div id="imgcontainer">
    <div class="box">
      <div class="imgBox">
      <a href="members_order.php?../images/bcpot002/bcpot002&Copper%20Red%20Bowl&Shallow%20Copper%20Red%20bowl%20form%20showing%20distinctive%20qualities%20of%20this%20traditional%20reduction%20fired%20glaze.%20Fired%20to%201300%20degrees.&450" target="_blank" onclick="return openFormPage(this);"><img src="../images/bcpot002/bcpot002_smaller.jpg" alt="Copper Red Bowl"></a>
      </div>
      <div class="content">
        <div class="contentHeading">Copper Red Bowl</div>
        <div class="contentPara">Shallow Copper Red bowl form showing distinctive qualities of this traditional reduction fired glaze. Fired to 1300 degrees.</div>
        <div class="contentPrice">$450</div>
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <a href="members_order.php?../images/bcpot006/bcpot006&Chun%20Bowl&Blue%20Chun%20bowl%20with%20tea%20stain%20rim%20over%20terracotta.%20Fired%20to%201300%20degrees&350" target="_blank" onclick="return openFormPage(this);"><img src="../images/bcpot006/bcpot006_smaller.jpg" alt="Chun Bowl"></a>
      </div>
      <div class="content">
        <div class="contentHeading">Chun Bowl</div>
        <div class="contentPara">Blue Chun bowl with tea stain rim over terracotta. Fired to 1300 degrees</div>
        <div class="contentPrice">$350</div>
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <a href="members_order.php?../images/bcpot010/bcpot010&Moonscape%20Bowl&High%20Calcium%20bowl%20with%20white%20glaze%20over%20blue%20slip.%20Fired%20to%201280%20degrees&320" target="_blank" onclick="return openFormPage(this);"><img src="../images/bcpot010/bcpot010_smaller.jpg" alt="Moonscape Bowl"></a>
      </div>
      <div class="content">
        <div class="contentHeading">Moonscape Bowl</div>
        <div class="contentPara">High Calcium bowl with white glaze over blue slip. Fired to 1280 degrees</div>
        <div class="contentPrice">$320</div>
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <a href="members_order.php?../images/bcpot014/bcpot014&Carved%20vase%20form%20001&Carved%20Iron%20stoneware%20vase%20form.%20Oxidation%20lustre%20on%20rim.%20Fired%20to%201280%20degrees&450" target="_blank" onclick="return openFormPage(this);"><img src="../images/bcpot014/bcpot014_smaller.jpg" alt="Carved Vase 001"></a>
      </div>
      <div class="content">
        <div class="contentHeading">Carved Vase 001</div>
        <div class="contentPara">Carved Iron stoneware vase form. Oxidation lustre on rim. Fired to 1280 degrees</div>
        <div class="contentPrice">$450</div>
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <a href="members_order.php?../images/bcpot016/bcpot016&Carved%20vase%20form%20002&Carved%20dry%20matt%20calcium%20vase%20form.%20Fired%20to%201280%20degrees&450" target="_blank" onclick="return openFormPage(this);"><img src="../images/bcpot016/bcpot016_smaller.jpg" alt="Carved Vase 002"></a>
      </div>
      <div class="content">
        <div class="contentHeading">Carved vase form 002</div>
        <div class="contentPara">Carved dry matt calcium vase form. Fired to 1280 degrees</div>
        <div class="contentPrice">$450</div>
      </div>
    </div>
    <div class="box">
      <div class="imgBox">
        <a href="members_order.php?../images/bcpot020/bcpot020&Copper%20Red%20Dish%20001&Shallow%20Copper%20Red%20dish%20form%20showing%20distinctive%20qualities%20of%20this%20traditional%20reduction%20fired%20glaze.%20Fired%20to%201300%20degrees.&450" target="_blank" onclick="return openFormPage(this);"><img src="../images/bcpot020/bcpot020_smaller.jpg" alt="Copper Red Dish"></a>
      </div>
      <div class="content">
        <div class="contentHeading">Copper Red Dish 001</div>
        <div class="contentPara">Shallow Copper Red dish form showing distinctive qualities of this traditional reduction fired glaze. Fired to 1300 degrees.</div>
        <div class="contentPrice">$450</div>
      </div>
    </div>
  </div>
  <?php include 'includeFilesHTML/footer.php';?>
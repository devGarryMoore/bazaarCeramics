<?php 
require_once 'includeFilesHTML/init.php';
$pageTitle = 'Production Process';
$pageCSS = '<link rel="stylesheet" type="text/css" href="../CSS/production_process.css">';
$pageScript = '<script src="../scripts/production_process.js"></script>';
include 'includeFilesHTML/header.php'; 
?>

<!--Content-->
<div id="container">
  <noscript><p>Please enable JavaScript to use this page!</p></noscript>
  <div id="toggleContainer">
     <button id="Images">Images</button>
     <div id="toggle">
       <div id="outer">
          <div id="slider5"></div>
       </div>
       <button id="Information">Information</button>
    </div>
  </div>
  <div id="galleryView">
    <div id="galleryContainer">
      <button id="navLeft" class="navBtns">&#8592;</button>
       <div class="leftView3"></div>
       <div class="leftView2"></div>
       <div class="leftView"></div>
       <div class="mainView"></div>
       <div class="rightView"></div>
       <div class="rightView2"></div>
       <div class="rightView3"></div>
       <button id="navRight" class="navBtns">&#8594;</button>
       <div class="mainViewEnlarged"></div>
    </div>
  </div>
  <div id="infoView">
    <div id="infoContainer">
      <img src="../images/bazaar-logo.jpg" alt="Bazaar ceramics company logo">
      <h1 id="productionHeading">Production Process</h1>
      <p class="productionPara">Bazaar Ceramics are constantly experimenting with new designs and techniques.  The process of developing a particular range of ceramics, starts with the design process.  The ceramic designers and gallery director meet regularly to discuss new ideas for product ranges.  It may be that the designers are following through on an inspiration from a field trip or perhaps the gallery director has some suggestions to make based on feedback from customers.</p> 
      <img src="../images/productionPot.jpg" alt="Production Pot Image">
      <p class="productionPara">Promising designs are developed into working drawings which the production potters use to create the ceramic forms.  Depending on the type of decoration, the designers may apply the decoration at this stage, or after they have been “bisqued” (fired to 1000 degrees celsius).  These prototype designs go through a lengthy development stage of testing and review until the designer is happy with the finished product.  At this stage a limited number of pots are produced and displayed in the gallery.  If they do well in the gallery, they become a “standard line”.</p> 
    </div>
  </div>
  <?php include 'includeFilesHTML/footer.php';?>
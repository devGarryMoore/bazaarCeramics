<?php 
require_once 'includeFilesIndex/indexInit.php';
if(isset($_SESSION['accessDenied'] )) {
  echo $_SESSION['accessDenied'];
  unset($_SESSION['accessDenied']);
}
$pageTitle = 'Home Page';
$pageCSS = 'Home Page';
include 'includeFilesIndex/header.php';
?>

<!-- content wrapper -->
<div id="contentWrapper">
<!-- page header -->
<h2 id="pageHeader" tabindex="0">Australian Handmade Ceramics</h2>
<!-- sub header -->
<h3 class="h3headings" tabindex="0">Ceramics News</h3>
<!-- content -->
<div class="paragraphSpacing" tabindex="0">
  <p class="ppara">Bazaar Ceramics has a wide range of products to meet the needs of clients both nationally and internationally.  The studio produces exquisite one off sculptural pieces for the individual and corporate collector.  Commissions make up approximately 40% of this work.  These pieces can be found in board rooms, international hotels and private homes as far away as the US and Germany.</p>
</div>
<div>
  <a href="#"><img src="images/bazaar_building.jpg" alt="Bazaar ceramics building image" class="contentImage"></a>
</div>
<div class="paragraphSpacing" tabindex="0">
  <p class="ppara">The current range of products consist of one off ceramic forms (eg vase and bottle forms and dishes) using a number of traditional glazes that are highly prized amongst ceramic collectors. The other area of ceramic production is the “domestic” ware range. These pieces are also individually designed and hand crafted to the highest quality, however unlike the individual art pieces, our customers are able to purchase entire dinner, coffee and ovenware in a range of designs.</p>
</div>
<!-- content part 2 -->
<h3 class="h3headings" tabindex="0">Ceramics Update</h3>
<div id="contentPart2">
  <div id="contentImage2" tabindex="0"><img src="images/bazaar_gallery.jpg" alt="bazaar ceramics gallery image" class="contentImage2">
  </div>
  <div id="contentParagraph" tabindex="0">
    <p class="ppara">We are continuing to grow our reputation for unique highly sought after collectable ceramics and professionally designed domestic ware. The key to this success is maintaining the highest technical and artistic standards and investment in marketing our products correctly.</p>
  </div>
</div>  
<div class="paragraphSpacing" tabindex="0">
    <p class="ppara">We will continue to produce fine contemporary domestic ware, however we consider it is the art market where we have the greatest potential for growth. To grow in this area it is important to establish a strong international reputation. This gives our work credibility on the national stage as well.</p>
</div>
<!-- end wrapper -->
</div>
<?php include 'includeFilesIndex/footer.php';?>
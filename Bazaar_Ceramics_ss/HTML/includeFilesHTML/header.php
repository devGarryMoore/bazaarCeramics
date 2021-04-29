<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php if(isset($pageCSS)) { echo ($pageCSS); } ?>	
  <link rel="stylesheet" type="text/css" href="../CSS/header.css">
  <link rel="stylesheet" type="text/css" href="../CSS/sideBarNav.css">
  <link rel="stylesheet" type="text/css" href="../CSS/content.css">
  <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
  <link rel="stylesheet" type="text/css" href="../CSS/laptop.css">
  <link rel="stylesheet" type="text/css" href="../CSS/tablet.css">
  <link rel="stylesheet" type="text/css" href="../CSS/mobile.css">
  <title>Bazaar Ceramics<?php if(isset($pageTitle)) { echo ' - ' . HTMLSC($pageTitle); } ?></title>
</head>
<body> 
<?php include 'includeFilesHTML/sideBarNav.inc';?>
<!-- header -->
<header>
  <span id="hamburger" onclick="openNav()">&#9776;</span>
  <a href="../Index.php"><img id="headerLogo" src="../images/bazaar-logo.jpg" alt="Bazaar ceramics company logo"></a>
  <h1 id="companyName" tabindex="0">Bazaar Ceramics</h1>
  <?php
    // Toggles log in and sign up buttons with welcome message and sign off
    if(isset($_SESSION['memberCustomerID'])){
      echo '<div id="welcomeLogOut"><p id="welcome">Welcome, <span id="userID">'.$_SESSION['memberUserID'].'</span></p><a id="logOut" href="logOut.php">Log Off</a></div>';
    }else{
      echo '<div id="logInSignUp"><a id="logIn" href="logIn.php" target="_blank" onclick="return openFormPage(this);">Log On</a><a id="signUp" href="newMemberReg.php" target="_blank" onclick="return openFormPage(this);">Sign Up</a></div>';
    }
  ?>
  <form action="#" id="searchBar">
    <div class="searchContainer">
      <input type="search" id="myInput" class="searchBox" name="search" placeholder="Search...   &#xF002;" onkeyup="searchFunction()">
    </div>
      <ul id="myUL" class="removeOnPageLoad">
        <li>
          <a href="../Index.php">Home</a>
        </li>
        <li>
          <a href="company_bg.php">Company Background</a>
        </li>
        <li>
          <a href="company_mission.php">Mission Statement</a>
        </li>
        <li>
          <a href="underConstruction.php">Design Process</a>
        </li>
        <li>
          <a href="production_process.php">Production Process</a>
        </li>
        <li>
          <a href="members_page.php">Members</a>
        </li>
        <li>
          <a href="underConstruction.php">Non-account Order Form</a>
        </li>
        <li>
          <a href="underConstruction.php">Account Order Form</a>
        </li>
        <li>
          <a href="underConstruction.php">Contact Us</a>
        </li>
      </ul>
  </form>
</header>
<!-- banner -->
<div id="companyBannerBG" tabindex="0">
  <img src="../images/banner.jpg" id="companyBanner" alt="Bazaar ceramics banner image">
</div>
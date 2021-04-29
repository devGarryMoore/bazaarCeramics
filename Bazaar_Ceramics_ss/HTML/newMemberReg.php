<?php 
require_once 'includeFilesHTML/init.php';
$pageTitle = 'Member Sign Up';
include 'includeFilesHTML/formHeader.php';

$_SESSION['CustomerID'] ?? '';
$errorMsg = [];
// Checks for post request
if(postRequest()) {
  $member = [];
  $member['CustomerID'] = $_SESSION['CustomerID'] ?? '';
  $member['UserID'] = $_POST['UserID'] ?? '';
  $member['Password'] =  $_POST['Password'] ?? '';

  $noErr = true;
  // Checks if User ID blank
  if(blank($member['UserID'])) {
    $errorMsg[0] = "<p class='errors'>User ID cannot be blank</p>";
    $noErr = false;
  }
  // Checks if Password blank
  if(blank($member['Password'])) {
    $errorMsg[1] = "<p class='errors'>Password cannot be blank</p>";
    $noErr = false;
  }
  // Checks if User ID contains / . % \ @ ?
  if(!UserIDRegexErr($member['UserID'])){
    $errorMsg[2] = "<p class='errors'>User ID should not have the following characters: / . % \ @ ?</p>";
    $noErr = false;
  }
  // Checks if password contains at least six chars, alphanumeric, . or /
  if(!PasswordRegexErr($member['Password'])){
    $errorMsg[3] = "<p class='errors'>Password should be no less than six (6) characters and should only consist of lower or uppercase letters, numbers, full stop (period) or forward slash e.g. a-z A-Z 0-9 . /</p>";
    $noErr = false;
  }
  // If no errors, add member to database members table
  if($noErr === true) {
    $successful = insertNewMemberReg($member);
    /*  If members added successfully set session variable with message and redirects page */
    if($successful === true) {
      $_SESSION['regSuccess'] = '<p class="success">The Member Registration is now complete,please log in now</p>';
      redirectTo(urlGoTo('/HTML/logIn.php'));
    }
  }
}
?>
<!-- content wrapper -->
<div id="contentWrapper">
<!--Content-->
<form action="newMemberReg.php" method="post">
  <div id="newReg">
    <h2 class="formHeading">New Member Registration</h2>
    <div class="forms">
      <p>If you aren't already an existing customer click this link below:</p>
      <a href="newCustomerReg.php" onclick="return openFormPage(this);">New Customer Registration</a>
    </div>
    <?php if(isset($errorMsg[4])) {echo $errorMsg[4];}?>
    <input class="inputs" type="hidden" name="CustomerID" value="<?php echo HTMLSC($_SESSION['CustomerId']);?>">
    <label class="labels" for="UserID">User ID: </label>
    <input class="inputs" type="text" name="UserID" placeholder="Username..." value="">
    <?php if(isset($errorMsg[0])) {echo $errorMsg[0];}
    if(isset($errorMsg[2])) {echo $errorMsg[2];}
    if(isset($errorMsg[5])) {echo $errorMsg[5];}?>
    <label class="labels" for="Password">Password: </label>
    <input class="inputs" type="password" name="Password" placeholder="Password..." value="">
    <?php if(isset($errorMsg[1])) {echo $errorMsg[1];}
    if(isset($errorMsg[3])) {echo $errorMsg[3];}?>
  </div>
  <div id="formBtns">
    <button type="submit" name="submit">Submit</button>  
    <button type="submit" name="cancel" onclick="closeWindow()">Cancel</button>
  </div>
</form>
<!-- end wrapper -->
</div>
  
<?php include 'includeFilesHTML/footer.php';?>
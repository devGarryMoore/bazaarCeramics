<?php 
require_once 'includeFilesHTML/init.php';
$pageTitle = 'Log In';
include 'includeFilesHTML/formHeader.php'; 

$errorMsg = [];
// display registration success message
if(isset($_SESSION['regSuccess'] )) {
  echo $_SESSION['regSuccess'];
  unset($_SESSION['regSuccess']);
}
// display log in failed message
if(isset($_SESSION['logInFailed'] )) {
  echo $_SESSION['logInFailed'];
  unset($_SESSION['logInFailed']);
}
// Checks for post request
if(postRequest()) {
  $memberLogIn = [];
  $memberLogIn['UserID'] = $_POST['UserID'] ?? '';
  $memberLogIn['Password'] =  $_POST['Password'] ?? '';

  $noErr = true;
  // Checks if User ID blank
  if(blank($memberLogIn['UserID'])) {
    $errorMsg[0] = "<p class='errors'>User ID cannot be blank</p>";
    $noErr = false;
  }
  // Checks if Password blank
  if(blank($memberLogIn['Password'])) {
    $errorMsg[1] = "<p class='errors'>Password cannot be blank</p>";
    $noErr = false;
  }
  // If no fields are blank attempt get userID info from database members table
  if($noErr === true) {
    $memberResults = findMemberByUserID($memberLogIn);
    // If successfully found member info using UserID
    if($memberResults) {
      // If password matchs UserID's hashed password against the password used in input field.
      if(password_verify($memberLogIn['Password'], $memberResults['HashedPassword'])) {
        $logInSessionStart = setLogInMemberInfo($memberResults);
        // If log in session variables added closes pop-up window and redirects
        if($logInSessionStart) {
          echo '<script type="text/javascript">window.close();opener.location.href="members_page.php";</script>';
        }
        // Message displayed with redirect for unmatching password against hash password
      } else {
        $_SESSION['logInFailed'] = '<p class="failed">Log on was unsuccesful, please try again or register!</p>';
        redirectTo(urlGoTo('/HTML/logIn.php'));
      }
      // Message displayed with redirect for unmatching User ID
    } else {
      $_SESSION['logInFailed'] = '<p class="failed">Log on was unsuccesful, please try again or register!</p>';
      redirectTo(urlGoTo('/HTML/logIn.php'));
    }
  }
}
?>

<!-- content wrapper -->
<div id="contentWrapper">
<!--Content-->
<form action="logIn.php" method="post">
  <div id="newReg">
    <h2 class="formHeading">Log On</h2>
    <div class="forms">
      <p>If you aren't already an existing member click this link below:</p>
      <a href="newMemberReg.php" onclick="return openFormPage(this);">New Member Registration</a>
    </div>
    <label class="labels" for="UserID">User ID: </label>
    <input class="inputs" type="text" name="UserID" placeholder="Username..." value="">
    <?php if(isset($errorMsg[0])) {echo $errorMsg[0];}?>
    <label class="labels" for="Password">Password: </label>
    <input class="inputs" type="password" name="Password" placeholder="Password..." value="">
    <?php if(isset($errorMsg[1])) {echo $errorMsg[1];}?>

  </div>
  <div id="formBtns">
    <button type="submit" name="submit">Submit</button>
    <button type="submit" name="cancel" onclick="closeWindow()">Cancel</button>
  </div>
</form>
</div>
<!-- end wrapper -->
</div>
<?php include 'includeFilesHTML/footer.php';?>
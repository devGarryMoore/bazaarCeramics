<?php 
require_once 'includeFilesHTML/init.php';
$pageTitle = 'Customer Sign Up';
include 'includeFilesHTML/formHeader.php';

$errorMsg = [];
// Checks for post request
if(postRequest()) {
  $customer = [];
  $customer['GivenName'] = $_POST['GivenName'] ?? '';
  $customer['LastName'] = $_POST['LastName'] ?? '';
  $customer['Email'] = $_POST['Email'] ?? '';
  $customer['Address'] = $_POST['Address'] ?? '';
  $customer['Suburb'] = $_POST['Suburb'] ?? '';
  $customer['State'] = $_POST['State'] ?? '';
  $customer['PostCode'] = $_POST['PostCode'] ?? '';
  $customer['Country'] = $_POST['Country'] ?? '';
  $customer['PhoneNumber'] = $_POST['PhoneNumber'] ?? '';
  $customer['AccountFlag'] = $_POST['AccountFlag'] ?? '';

  $noErr = true;
  // Checks if Given name blank
  if(blank($customer['GivenName'])) {
    $errorMsg[0] = "<p class='errors'>Given name cannot be blank.</p>";
    $noErr = false;
  } 
  // Checks if Last name blank
  if(blank($customer['LastName'])) {
    $errorMsg[1] = "<p class='errors'>Last name cannot be blank.</p>";
    $noErr = false;
  } 
  // Checks if Email blank
  if(blank($customer['Email'])) {
    $errorMsg[2] = "<p class='errors'>Email cannot be blank.</p>";
    $noErr = false;
  } 
  // Checks if Address blank
  if(blank($customer['Address'])) {
    $errorMsg[3] = "<p class='errors'>Address cannot be blank.</p>";
    $noErr = false;
  } 
  // Checks if Phone number blank
  if(blank($customer['PhoneNumber'])) {
    $errorMsg[4] = "<p class='errors'>Phone number cannot be blank.</p>";
    $noErr = false;
  } 
  // Checks if phone used numbers and no spaces with regex
  if(!PhoneNumberRegexErr($customer['PhoneNumber'])){
    $errorMsg[5] = "<p class='errors'>Phone number uses numbers only and no spaces!</p>";
    $noErr = false;
  } 
  // Checks if email contains @
  if(!EmailRegexErr($customer['Email'])){
    $errorMsg[6] = "<p class='errors'>Email needs @</p>";
    $noErr = false;
  } 
  /* If no error found, inserts customer info into database and sets id
  from last customer made to a session variable */
  if($noErr === true) {
    insertNewCustomerReg($customer);
    $lastId = mysqli_insert_id($db);
    $_SESSION['CustomerID'] = $lastId;
  }
}
?>

<!-- content wrapper -->
<div id="contentWrapper">
<!--Content-->
<form action="newCustomerReg.php" method="post" novalidate>
  <div id="newReg">
    <h2 class="formHeading">New Customer Registration</h2>
    <div class="forms">
      <p>If you are already an existing member click this link below:</p>
      <a href="newMemberReg.php" onclick="return openFormPage(this);">New Member Registration</a>
    </div>
    <p id="formRequired">Fields with <span id="formSpan">*</span> are required</p>
    <label class="labels required" for="GivenName">Given Name:</label>
    <input class="inputs" type="text" name="GivenName" placeholder="Given name...">
    <?php if(isset($errorMsg[0])) {echo $errorMsg[0];}?>
    <label class="labels required" for="LastName">Last Name: </label>
    <input class="inputs" type="text" name="LastName" placeholder="Last name...">
    <?php if(isset($errorMsg[1])) {echo $errorMsg[1];}?>
    <label class="labels required" for="Email">Email:</label>
    <input class="inputs" type="email" name="Email" placeholder="Email...">
    <?php if(isset($errorMsg[2])) {echo $errorMsg[2];} 
    elseif(isset($errorMsg[6])) {echo $errorMsg[6];}?>
    <label class="labels required" for="Address">Address: </label>
    <input class="inputs" type="text" name="Address" placeholder="Address...">
    <?php if(isset($errorMsg[3])) {echo $errorMsg[3];}?>
    <label class="labels" for="Suburb">Suburb: </label>
    <input class="inputs" type="text" name="Suburb" placeholder="Suburb...">
    <label class="labels" for="State">State: </label>
    <input class="inputs" type="text" name="State" placeholder="State...">
    <label class="labels" for="PostCode">Post code: </label>
    <input class="inputs" type="text" name="PostCode" placeholder="Post code...">
    <label class="labels" for="Country">Country: </label>
    <input class="inputs" type="text" name="Country" placeholder="Country...">
    <label class="labels required" for="PhoneNumber">Phone No: </label>
    <input class="inputs" type="text" name="PhoneNumber" placeholder="Phone number...">
    <?php if(isset($errorMsg[4])) {echo $errorMsg[4];} 
    if(isset($errorMsg[5])) {echo $errorMsg[5];}?>
    <label class="labels hidden" for="AccountFlag">Account Flag: </label>
    <div class="radioBtn">
      <label class="hidden" for="AccountFlag">True: </label>
      <input class="hidden" type="radio" value="1" name="AccountFlag">
      <label class="hidden" for="AccountFlag">False: </label>
      <input class="hidden" type="hidden" value="0" name="AccountFlag" checked>
    </div>
  </div>
  <div id="formBtns3">
    <button type="submit" name="submit">Submit</button>
    <button type="reset" name="reset" onclick="newCustomerReg();">Reset</button>
    <button type="submit" name="cancel" onclick="closeWindow()">Cancel</button>    
  </div>
</form>
<!-- end wrapper -->
</div>
  
<?php include 'includeFilesHTML/footer.php';?>
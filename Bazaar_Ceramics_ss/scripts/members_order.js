// Removes hexidecimals created when passing query strings into the URL
var uRI = decodeURI(location.search);
// Splits the query string at & and puts it into an array
var queryArray = uRI.split("&");
// Using innerHTML to add a h1 and dynamically add a string to the div with header ID
document.getElementById("Header").innerHTML = "<h1>" + queryArray[1] + "</h1>";
// Sets variable for the second to nineteenth chars in the query string
var imgName = uRI.substring(10 , 28);

// Preloaded array of image objects
var imgArray = new Array();
// Variable for array index of different objects
var arrNum = 0;
// Nested for loop to preload images objects using imgArray variable
for(imgRows = 1; imgRows < 5; imgRows++){
  for(var col = 1; col < 6; col++, arrNum++){
    imgArray[arrNum] = new Image();
    imgArray[arrNum].src += '../images/' + imgName + '_r' + (imgRows) + '_c' + (col) + '.jpg';
    imgArray[arrNum].alt += queryArray[1];
  }
};

// Assemble image slice in a table using preload image array objects
function displayImg(){
  var arrNum = 0;
  var rows = 4;
  var columns = 5;
  var displayImg = '';
  displayImg += '<table cellspacing = "0" cellpadding = "0">'
  // Nested for loop to render images into the table
  for(var row = 0; row < rows; row++){
    displayImg += ('<tr>');
    for(var col = 0; col < columns; col++ , arrNum ++){
      // Add style display:block to remove gaps between rows
      displayImg += '<td><img src=' + imgArray[arrNum].src + ' alt="' + imgArray[arrNum].alt + '"  style="display:block;height:100px;width:120px;"></td>';
    }
    displayImg += '</tr>';
  }
  displayImg += '</table>'
  // Add assembled images to div with id of imageCRB using innerHTML
  document.getElementById('imageCRB').innerHTML += displayImg;
};

// function displayImg(){
// // Creates a variable that selects the div by an id of 'imageCRB'
//   var imageContainerDiv = document.getElementById('imageCRB');
// // To remove the spacing between the rows of images 
//       imageContainerDiv.style.lineHeight = '0';
// // Nested for loops
//   for (var a = 0; a < imgArray.length; a++) {
//     for(var b = 0; b < nestedImgArray.length; b++) {
// // Creates a variable to create an img tag ie.<img>
//       var createImg = document.createElement('img');
// /* Uses the variable that creates the element of a img tag, and
// creates a src attribute to each img tag, and adds the string from the nested arrays */
//       createImg.src = nestedImgArray[b];
//       createImg.alt = queryArray[1];
// // Removes the need for a table by setting the width of the five images in a row by 20%
//       createImg.style = 'width:20%;height:100px;'
// /* The child element in this case the img tags being created will be 
// added inside the parent element which is the div with the id of 'imageCRB'*/
//       imageContainerDiv.appendChild(createImg);
//     };
//   };
// };

function setFormData(){
  // Sets element with id CRBTitle value to the second string in the array
  document.getElementById('CRBTitle').value = queryArray[1];
  // Sets element with id CRBDesc value to the third string in the array
  document.getElementById('CRBDesc').value = queryArray[2];
  // Sets element with id CRBPrice value to the fourth string in the array
  document.getElementById('CRBPrice').value = queryArray[3];
};

var reset = document.getElementById('Clear');
/* Changes only the quantity and total price of the form
when Clear button is clicked */
reset.addEventListener('click', () => {
  document.getElementById('CRBQuantity').value = 1;
  document.getElementById('CRBTotalPrice').value = 0;
});

/* display errors if quantity not > 0, null, empty string or space,
otherwise works out total price */
function calTotal() {
  var errorMsg = "";
// create variables to get values from these elements
  var quantity = document.getElementById('CRBQuantity').value;
  var price = document.getElementById('CRBPrice').value;
  if(isNaN(quantity)){
    errorMsg = "Quantity must be a number!";
    alert(errorMsg);
  }
  else if(quantity < 0){
    errorMsg = "Quantity cannot be negative!";
    alert(errorMsg);
  } 
  else if(quantity === null || quantity === "" || quantity === " "){
    errorMsg = "Quantity cannot be blank!";
    alert(errorMsg);
  } 
  else if(quantity == 0){
    errorMsg = "Quantity cannot be zero!";
    alert(errorMsg);
  }
  else{
    var totalPrice = quantity * price;
    // create a value for this element
    document.getElementById('CRBTotalPrice').value = totalPrice;
  }
}
/* Displays a form of data in the order form currently, 
which is displayed in a confirm window or displays error */
function confirmOrder(){
  calTotal();
  var quantity = document.getElementById('CRBQuantity').value;
  if(quantity > 0){
  var confirmThisOrder = "Please confirm you have ordered the following below:\n\n";

  confirmThisOrder += "Name:  " + document.querySelector("#CRBTitle").value + "\n";
  confirmThisOrder += "Description:  " + document.querySelector("#CRBDesc").value + "\n";
  confirmThisOrder += "Quantity:  " + document.querySelector("#CRBQuantity").value + "\n";
  confirmThisOrder += "Price:  $" + document.querySelector("#CRBPrice").value + "\n";
  confirmThisOrder += "Total price:  $" + document.querySelector("#CRBTotalPrice").value + "\n";
  confirmThisOrder += "Is this correct?";
  return confirm(confirmThisOrder);
  }else{
    alert("Please fix error in Order Details and try again");
  }
}

// close window script 
function closeWindow() {
  window.close();
};
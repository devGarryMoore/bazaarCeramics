// script for image slider and information display toggling
/* This starts off by selecting the div with id of 'outer' which will wait for a click on this div to use the function toggleState(). This uses variables galleryView, infoView, outer and slider to select divs with those ids, it then has an if else statement to check if div with id of 'slider5' has a class of 'active'. If it does it will remove the two classes 'active' and 'outerActive' from the div and galleryView variable style used to display 'flex' and the infoView variable to used to display 'none', else it will add the two classes 'active' and 'outerActive' and the galleryView variable is used to style display 'none' while infoView variable is styled to display 'flex'.
*/
document.getElementById('outer').addEventListener('click', toggleState);   
function toggleState() {
  var galleryView = document.getElementById('galleryView');
  var infoView = document.getElementById('infoView');
  var outer = document.getElementById('outer');
  var slider5 = document.getElementById('slider5');
  if (slider5.classList.contains('active')) {
    slider5.classList.remove('active');
    outer.classList.remove('outerActive');
    galleryView.style.display = 'flex';
    infoView.style.display = 'none'; 
    } else {
    slider5.classList.add('active');
    outer.classList.add('outerActive');
    galleryView.style.display = 'none';
    infoView.style.display = 'flex';
  };
};
//Function toggleToImages will do the if statement of the function toggleState().
document.getElementById('Images').addEventListener('click', toggleToImages);   
function toggleToImages() {
  var galleryView = document.getElementById('galleryView');
  var infoView = document.getElementById('infoView');
  var outer = document.getElementById('outer');
  var slider5 = document.getElementById('slider5');
    slider5.classList.remove('active');
    outer.classList.remove('outerActive');
    galleryView.style.display = 'flex';
    infoView.style.display = 'none'; 
};
// Function toggleToInformation will do the else statement of the function toggleState().
document.getElementById('Information').addEventListener('click', toggleToInformation);   
function toggleToInformation() {
  var galleryView = document.getElementById('galleryView');
  var infoView = document.getElementById('infoView');
  var outer = document.getElementById('outer');
  var slider5 = document.getElementById('slider5');
    slider5.classList.add('active');
    outer.classList.add('outerActive');
    galleryView.style.display = 'none';
    infoView.style.display = 'flex';
};
// Image object of all images in the image silder using the variable 'imgObject'.
var imgObject = [
  '../images/openingclay.jpg',
  '../images/sequence1.jpg',
  '../images/sequence2.jpg',
  '../images/sequence3.jpg',
  '../images/sequence4.jpg',
  '../images/sequence5.jpg',
  '../images/liftingclay.jpg',
  '../images/sequence6.jpg',
  '../images/sequence7.jpg',
  '../images/sequence8.jpg',
  '../images/sequence9.jpg',
  '../images/sequence10.jpg',
  '../images/sequence11.jpg',
  '../images/sequence12.jpg',
  '../images/sequence13.jpg',
  '../images/finishing.jpg',
  '../images/finishing2.jpg'
];
// These are different variables given diferent number values to use for looping over.
var mainImg = 0;
var prevImg = imgObject.length - 1;
var prevImg2 = imgObject.length - 2;
var prevImg3 = imgObject.length - 3;
var nextImg = 1;
var nextImg2 = 2;
var nextImg3 = 3;
/* Function loadGallery() uses different variables leftview, 2, 3, mainView and rightView, 2, 3 that select that class to style the divs with a different images in the Array named imgObject, this is by using the different variables above this function to get the different strings. This also adds a style no-repeat to spot the getting addition copies of the same image and style contain to keep it inside the div styled area ie its height and width.
*/
function loadGallery() {
  var leftView3 = document.querySelector(".leftView3");
  leftView3.style.background = "url(" + imgObject[prevImg3] + ")";
  leftView3.style.backgroundRepeat = "no-repeat";
  leftView3.style.backgroundSize = "contain";
  var leftView2 = document.querySelector(".leftView2");
  leftView2.style.background = "url(" + imgObject[prevImg2] + ")";
  leftView2.style.backgroundRepeat = "no-repeat";
  leftView2.style.backgroundSize = "contain";
  var leftView = document.querySelector(".leftView");
  leftView.style.background = "url(" + imgObject[prevImg] + ")";
  leftView.style.backgroundRepeat = "no-repeat";
  leftView.style.backgroundSize = "contain";
  var mainView = document.querySelector(".mainView");
  mainView.style.background = "url(" + imgObject[mainImg] + ")";
  mainView.style.backgroundRepeat = "no-repeat";
  mainView.style.backgroundSize = "contain";
  var rightView = document.querySelector(".rightView");
  rightView.style.background = "url(" + imgObject[nextImg] + ")";
  rightView.style.backgroundRepeat = "no-repeat";
  rightView.style.backgroundSize = "contain";
  var rightView2 = document.querySelector(".rightView2");
  rightView2.style.background = "url(" + imgObject[nextImg2] + ")";
  rightView2.style.backgroundRepeat = "no-repeat";
  rightView2.style.backgroundSize = "contain";
  var rightView3 = document.querySelector(".rightView3");
  rightView3.style.background = "url(" + imgObject[nextImg3] + ")";
  rightView3.style.backgroundRepeat = "no-repeat";
  rightView3.style.backgroundSize = "contain";
};
// functions for the image slider
/* function scrollRight() starts off by changing the different variables to equal a different variable ie prevImg3 = prevImg2, it then uses different variables to select divs with classes of LeftView, 2, mainView and rightView, 2, 3. It then uses these variables to replace the classes ie div with class of 'leftView2' becomes 'leftView3'. It then uses an if else statement to find nextImg3's position in the array, enabling the carousel to work by repositioning the image elements.
*/
function scrollRight() {
  prevImg3 = prevImg2;
  prevImg2 = prevImg;
  prevImg = mainImg;
  mainImg = nextImg;
  nextImg = nextImg2;
  nextImg2 = nextImg3;

  var leftView2 = document.querySelector(".leftView2");
  var leftView = document.querySelector(".leftView");
  var mainView = document.querySelector(".mainView");
  var rightView = document.querySelector(".rightView");
  var rightView2 = document.querySelector(".rightView2");
  var rightView3 = document.querySelector(".rightView3");

  leftView2.classList.replace('leftView2', 'leftView3');
  leftView.classList.replace('leftView', 'leftView2');
  mainView.classList.replace('mainView', 'leftView');
  rightView.classList.replace('rightView', 'mainView');
  rightView2.classList.replace('rightView2', 'rightView');
  rightView3.classList.replace('rightView3', 'rightView2');

  if (nextImg3 >= (imgObject.length -1)) {
    nextImg3 = 0;
    galleryContainer = document.getElementById('galleryContainer');
    navRight = document.getElementById('navRight');
    var newImg = document.createElement('div');
    newImg.setAttribute('class', 'rightView3');
    newImg.style.background = "url(" + imgObject[nextImg3] + ")";
    newImg.style.backgroundRepeat = "no-repeat";
    newImg.style.backgroundSize = "contain";
    galleryContainer.insertBefore(newImg, navRight);
  } else {
    nextImg3++;
    galleryContainer = document.getElementById('galleryContainer');
    navRight = document.getElementById('navRight');
    var newImg = document.createElement('div');
    newImg.setAttribute('class', 'rightView3');
    newImg.style.background = "url(" + imgObject[nextImg3] + ")";
    newImg.style.backgroundRepeat = "no-repeat";
    newImg.style.backgroundSize = "contain";
    galleryContainer.insertBefore(newImg, navRight);
  }; 
};
/* function removeLeft() uses a variable called 'leftView3' to select a div with the class leftView3 and use the 'remove()' method that will remove that element.
*/
function removeLeft(){
  var leftView3 = document.querySelector('.leftView3');
  leftView3.remove();
};
/* function scrollLeft() starts off by changing the different variables to equal a different variable ie nextImg3 = nextImg2, it then uses different variables to select divs with classes of rightView, 2, mainView and leftView, 2, 3. It then uses these variables to replace the classes ie div with class of 'rightView2' becomes 'rightView3'. It then uses an if else statement to find prevImg3's position in the array, enabling the carousel to work by repositioning the image elements.
*/
function scrollLeft() {
  nextImg3 = nextImg2;
  nextImg2 = nextImg;
  nextImg = mainImg;
  mainImg = prevImg;
  prevImg = prevImg2;
  prevImg2 = prevImg3;

  var rightView2 = document.querySelector(".rightView2");
  var rightView = document.querySelector(".rightView");
  var mainView = document.querySelector(".mainView");
  var leftView = document.querySelector(".leftView");
  var leftView2 = document.querySelector(".leftView2");
  var leftView3 = document.querySelector(".leftView3");

  rightView2.classList.replace('rightView2', 'rightView3');
  rightView.classList.replace('rightView', 'rightView2');
  mainView.classList.replace('mainView', 'rightView');
  leftView.classList.replace('leftView', 'mainView');
  leftView2.classList.replace('leftView2', 'leftView');
  leftView3.classList.replace('leftView3', 'leftView2');
   
  if (prevImg3 === 0) {
    prevImg3 = imgObject.length - 1;
    galleryContainer = document.getElementById('galleryContainer');
    navLeft = document.getElementById('navLeft');
    var newImg = document.createElement('div');
    newImg.setAttribute('class', 'leftView3');
    newImg.style.background = "url(" + imgObject[prevImg3] + ")";
    newImg.style.backgroundRepeat = "no-repeat";
    newImg.style.backgroundSize = "contain";
    galleryContainer.insertBefore(newImg, galleryContainer.firstElementChild.nextSibling);
  } else {
    prevImg3--;
    galleryContainer = document.getElementById('galleryContainer');
    navLeft = document.getElementById('navLeft');
    var newImg = document.createElement('div');
    newImg.setAttribute('class', 'leftView3');
    newImg.style.background = "url(" + imgObject[prevImg3] + ")";
    newImg.style.backgroundRepeat = "no-repeat";
    newImg.style.backgroundSize = "contain";
    galleryContainer.insertBefore(newImg, galleryContainer.firstElementChild.nextSibling);
  };
};
/* function removeRight() uses a variable called 'RightView3' to select a div with the class rightView3 and uses the 'remove()' method that will remove that element which in this case it's the div with the class 'rightView3'.
*/
function removeRight(){
  var rightView3 = document.querySelector('.rightView3');
  rightView3.remove();
};
/*These next functions are all functions that enable the user to scroll through the carousel.
*/

// This is the navLeft click event function that will scroll left.
document.getElementById("navLeft").addEventListener("click",() => {
  removeRight();
  scrollLeft();
  var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
  document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
});
// This is the navigates left twice if leftView2 is clicked.
document.getElementById("galleryContainer").addEventListener("click",function(e){
  if(e.target && e.target.className == 'leftView2'){
    removeRight();
    scrollLeft();
    removeRight();
    scrollLeft();
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  }
});
// This is the navigates left if leftView is clicked.
document.getElementById("galleryContainer").addEventListener("click",function(e){
  if(e.target && e.target.className == 'leftView'){
    removeRight();
    scrollLeft();
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  }
});
// This changes the enlarged image to be the same as the mainView if it's clicked.
document.getElementById("galleryContainer").addEventListener("click",function(e){
  if(e.target && e.target.className == 'mainView'){
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  }
});
// This is the navigates right if rightView is clicked.
document.getElementById("galleryContainer").addEventListener("click",function(e){
  if(e.target && e.target.className == 'rightView'){
    scrollRight();
    removeLeft();
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  }
});
// This is the navigates right twice if rightView2 is clicked.
document.getElementById("galleryContainer").addEventListener("click",function(e){
  if(e.target && e.target.className == 'rightView2'){
    scrollRight();
    removeLeft();
    scrollRight();
    removeLeft();
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  }
});
// This is the navRight click event function which will scroll right.
document.getElementById("navRight").addEventListener("click",() => {
  scrollRight();
  removeLeft();
  var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
  document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
});
/* This function waits for a keyup event using the key code 37 or 39 which is left and right on the keyboard which will follow the same process as navLeft, leftView for left key code 37 or navRight, rightView for right key code 39.
*/
document.addEventListener('keyup',function(e){
  if (e.keyCode === 37) {
    removeRight();
    scrollLeft();
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  } else if(e.keyCode === 39) {
    scrollRight();
    removeLeft();
    var mainImgSrc = document.querySelector('.mainView').style.backgroundImage;
    document.querySelector('.mainViewEnlarged').style.backgroundImage = mainImgSrc;
  }
});
/* This will run the loadGallery() function above to make sure the page load with all the div with the inline styling
*/
loadGallery();
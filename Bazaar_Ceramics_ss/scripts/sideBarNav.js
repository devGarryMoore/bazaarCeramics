// Script for side bar navigation
// Function openNav() Changes the style of div with an id of 'mySideNav' to 300px
function openNav() {
  document.getElementById('mySideNav').style.width = '300px';
}
// Function closeNav() Change the style of div with an id of ''mySideNav' to 0px
function closeNav() {
  document.getElementById('mySideNav').style.width = '0';
}
/* This for loop controls the drop-down menu by listening for a click on the a tag  with a class of 'dropdown' then toggling a class of 'active' to display 'block' or 'none' styling of the following element's sibling.
*/
var dropdown = document.querySelectorAll('.dropdown');
for (var i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener('click', function() {
  this.classList.toggle('active');
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === 'block') {
  dropdownContent.style.display = 'none';
  } else {
  dropdownContent.style.display = 'block';
  }
  });
}
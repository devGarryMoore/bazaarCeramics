/*openFormPage function uses a parameter to get the anchor tag's href that is clicked on. It checks if the variable openOrderForm is open if it is closes it and then opens a new window, if not just opens the window this also stop the anchor tag by returning false to stop the normal achor tag from doing it's normal operations.*/
function openFormPage(href){
  var thisHref = href.getAttribute('href');
  if(openOrderForm){
    openOrderForm.close();
  };
  var openOrderForm = window.open(thisHref, "currentWindow", "width=1050,height=670");
  return false;
};
// close window script 
function closeWindow() {
  window.close();
};
  
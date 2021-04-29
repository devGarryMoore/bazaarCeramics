/* script for search bar */
/* Function searchFunction() controls the search bar on the page by using different variables input, filiter, ul, li, a, i txtValue. It includes an if else statement to display or not depending on the value is equals 0 or not inside the input tag with id of 'myInput', then it uses a for loops over all li tag's a tag text values, uppercase it like the filter var to find a match an display the li that matches if not display none.
*/ 
function searchFunction() {
  var input = document.getElementById('myInput');
  var filter = input.value.toUpperCase();
  var ul = document.getElementById('myUL');
  var li = ul.getElementsByTagName('li');
  if(input.value.length === 0){
        ul.style.display = 'none';
        return;
    }else{
        ul.style.display = 'block';
    }
  for (var i = 0; i < li.length; i++) {
    var a = li[i].getElementsByTagName('a')[0];
    var txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = '';
    } else {
      li[i].style.display = 'none';
    }
  }
}
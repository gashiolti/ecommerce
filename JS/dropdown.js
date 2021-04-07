
// FUNCTION FOR SHOPPING CART DROPDOWN
function cartPopUp() {
  var modal = document.getElementById('shoppingcart');
  var btn = document.getElementById('cart');
  var span = document.getElementsByClassName("closeCart")[0];

  if(modal.style.display === "none") {
    modal.style.display = "block";
  } else {
    modal.style.display = "none";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  //When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}

function accountPopUp() {

  var span = document.getElementsByClassName("close")[0];
  var div = document.getElementById('accountinfo');

  if(div.style.display === "none") {
    div.style.display = "block";
  } else {
    div.style.display = "none";
  }

  span.onclick = function() {
    div.style.display = "none";
  }

  //When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      div.style.display = "none";
    }
  }
}




// FUNCTION FOR SHOPPING CART DROPDOWN
function cartPopUp() {
  var modal = document.getElementById('shoppingcart');
  var btn = document.getElementById('cart');
  var span = document.getElementsByClassName("closeCart")[0];

  btn.onclick = function() {
    modal.style.display = "block";
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
  var modal = document.getElementById('accountinfo');
  var btn = document.getElementById('account');
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
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
  // (function(){
 
  //   $("#cart").on("click", function() {
  //     $("#shoppingcart").fadeToggle( "fast");
  //   });
    
  // })();

// // FUNCTION FOR ACCOUNT DROPDOWN INFO
//   (function(){
 
//     $("#account").on("click", function() {
//       $(".account-info").fadeToggle( "fast");
//     });
    
//   })();

// function popUp() {
//   var popup = document.getElementById("shoppingcart");
//   popup.classList.toggle("show");

function accountEdit() {
    var modal = document.getElementById('form-wrapper');
    var btn = document.getElementById('editButton');
    var exit = document.getElementById("exitForm")[0];
  
    btn.onclick = function() {
      modal.style.display = "block";
    }
  
    // click x to remove
    exit.onclick = function() {
      modal.style.display = "none";
    }
  
    //When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }

function accountEdit2() {
    var modal = document.getElementById('form-wrapper2');
    var btn = document.getElementById('editButton2');
    var exit = document.getElementById("exitForm")[0];
  
    btn.onclick = function() {
      modal.style.display = "block";
    }
  
    // click x to remove
    exit.onclick = function() {
      modal.style.display = "none";
    }
  
    //When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }

  function accountEdit3() {
    var modal = document.getElementById('form-wrapper3');
    var btn = document.getElementById('editButton3');
    var exit = document.getElementById("exitForm")[0];
  
    btn.onclick = function() {
      modal.style.display = "block";
    }
  
    // click x to remove
    exit.onclick = function() {
      modal.style.display = "none";
    }
  
    //When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
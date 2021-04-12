const userLink = document.querySelector(".userid"),
incoming_id = userLink.querySelector(".incoming_id").value,
userName = document.querySelector(".main-wrapper"),
user = document.querySelector(".userlink"),
form = document.querySelector(".myForm"),
sendingTo = form.querySelector(".receiver").value,
inputField = form.querySelector(".deliver-message"),
sendBtn = form.querySelector(".send"),
chatBox = document.querySelector(".main-bottom");


//GET USER CHAT FROM CHAT LIST FOR HELP AGENT
$('.aside a').click(function (event) {
    event.preventDefault();

    var value = $(this).data("custom-value");
    // or use return false;
    // console.log(incoming_id);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/getmessageclient.inc.php?sendingto="+value, true);
    xhr.onload = ()=> {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userName.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let formData = new FormData(userLink);
    xhr.send(formData);
});
















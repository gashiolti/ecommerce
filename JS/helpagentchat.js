const userLink = document.querySelector(".userid"),
incoming_id = userLink.querySelector(".incoming_id").value,
userName = document.querySelector(".main-wrapper"),
user = document.querySelector(".userlink"),
form = document.querySelector(".myForm"),
sendingTo = form.querySelector(".receiver").value,
inputField = form.querySelector(".deliver-message"),
sendBtn = form.querySelector(".send"),
chatBox = document.querySelector(".main-bottom");
// var value;

function submitUserID() {
    userLink.submit();
}

// document.getElementById("myForm").onsubmit = function(e) {
//     e.preventDefault(); //prevent form from submitting
// };

// $(document).ready(function() {
    // $('form[id=myForm]').submit(function (event) {
    //     event.preventDefault();
    // });
// });

// function receiverID() {
//     var id;
//     $("#userlink").click(function () {
//         id = $(this).data("custom-value");
//         // return false;
//     });
//     return id;
// }

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
                // userLink.submit();
                // submitUserID();
                // alert(value);
                let data = xhr.response;
                userName.innerHTML = data;
                // console.log(userName);
                // setInterval(() =>{
                //     let data = xhr.response;
                //     userName.innerHTML = data;
                //     // alert(value);
                // }, 1);
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let formData = new FormData(userLink);
    xhr.send(formData);
});


// setInterval(() =>{
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "includes/getmessageclient.inc.php", true);
//     xhr.onload = ()=>{
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//             let data = xhr.response;
//             chatBox.innerHTML = data;
//             scrollToBottom();
//           }
//       }
//     }
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     let formData = new FormData(form);
//     xhr.send(formData);
//     // xhr.send("incoming_id="+incoming_id);
// }, 1500);

// function getMessages() {
//     // Prior to getting your messages.
//   shouldScroll = chatBox.scrollTop + chatBox.clientHeight === chatBox.scrollHeight;
//   if (!shouldScroll) {
//     scrollToBottom();
//   }
// }

// function scrollToBottom(){
//     // chatBox.scrollTop = chatBox.scrollHeight;
//     var log = $('#main-bottom');
//     log.animate({ scrollTop: log.prop('scrollHeight')}, 1500);
// }


// scrollToBottom();

// setInterval(getMessages, 1500);













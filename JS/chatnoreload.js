
    const form = document.querySelector(".myFormName"),
    
    inputField = form.querySelector(".form-control"),
    sendBtn = form.querySelector(".submit"),
    chatBox = document.getElementById("msg-page");

    form.onsubmit = (e)=> {
        e.preventDefault(); //preventing form from submitting
    }

    sendBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "includes/sendmessageclient.inc.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status === 200) {
                    inputField.value = "";
                    // scrollToBottom();
                    // xhr.consolelog(xhr.responseText);
                }
            }
        }
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // We have to send the form data through ajax to php
        let formData = new FormData(form); //creating new formData Object
        xhr.send(formData); //sending the form data to php
    }

    setInterval(() =>{
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "includes/gethelpagentmessage.inc.php", true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                let data = xhr.response;
                chatBox.innerHTML = data;
                scrollToBottom();
              }
          }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        let formData = new FormData(form);
        xhr.send(formData);
        // xhr.send("incoming_id="+incoming_id);
    }, 1500);

    // function appendMessage() {
    //     const message = document.getElementsByClassName('outgoing-chats')[0];
    //     const newMessage = message.cloneNode(true);
    //     chatBox.appendChild(newMessage);
    // }


    function getMessages() {
        // Prior to getting your messages.
      shouldScroll = chatBox.scrollTop + chatBox.clientHeight === chatBox.scrollHeight;
      /*
       * Get your messages, we'll just simulate it by appending a new one syncronously.
       */
    //   appendMessage();
      // After getting your messages.
      if (!shouldScroll) {
        scrollToBottom();
      }
    }

    function scrollToBottom(){
        // chatBox.scrollTop = chatBox.scrollHeight;
        var log = $('#msg-page');
        log.animate({ scrollTop: log.prop('scrollHeight')}, 1500);
        // // chatBox.scrollTop(chatBox.prop("scrollHeight"));
        // var log = $('#msg-page');
        // log.animate({ scrollTop: log.prop('scrollHeight')}, 0);
    }



    scrollToBottom();

    setInterval(getMessages, 1500);
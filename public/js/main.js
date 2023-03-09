
function setMessage(cls, msg) {
    var messageContainer = document.querySelector('.trans');
    console.log(messageContainer);
    console.log(cls);
    console.log(msg);

    if (cls == 'has-success') {
        messageContainer.classList.add('has-success');
        messageContainer.innerHTML= msg;



    }
    else 
        messageContainer.classList.add('has-faild');
        messageContainer.innerHTML= msg;

}
const { default: axios } = require('axios');

require('./bootstrap');

const channel  = Echo.channel('play-ground-channel');
const listMsg = document.getElementById('list-messages');
document.getElementById('form').addEventListener('submit',function(e){
    e.preventDefault();
    var name = document.getElementById('input-name').value;
    axios.post('chat-message',{
        message:name
    });

});
channel.subscribed(()=>{
    console.log('subscribed');
}).listen('.playground',(event)=>{
    const msg = event.name;
    const li = document.createElement('li');
    li.textContent = msg;
    listMsg.append(li);
    console.log(event)
});
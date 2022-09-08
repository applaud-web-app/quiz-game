const { default: axios } = require('axios');

require('./bootstrap');

const channel  = Echo.channel('participants-channel');

channel.subscribed(()=>{}).listen('.participants',(event)=>{
 if(event.com_id==userId){
    window.location.href = '/play-game';
 }
});
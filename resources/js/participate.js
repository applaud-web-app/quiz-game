const { default: axios } = require('axios');

require('./bootstrap');

const channel  = Echo.channel('participants-channel');

channel.subscribed(()=>{}).listen('.participants',(event)=>{
    console.log(event);
 if(event.com_id==userId || event.user_id==userId){
    console.log("redirect success");
 }
});
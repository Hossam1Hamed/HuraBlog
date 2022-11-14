import './bootstrap'

import Echo from "laravel-echo"


import { io } from "socket.io-client"
window.io = io


window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
});

window.Echo.join(`online`)
    .here((users) => {
        console.log(users);
    })
    .joining((user) => {
        console.log(user.name);
    })
    .leaving((user) => {
        console.log(user.name);
    })
    .error((error) => {
        console.error(error);
    });


window.Echo.channel(`post-channel`)
    .listen('PostEvent', (e) => {
        $('#notification').append(
            '<li class="mb-2"><p>$(e.user.name) add new post</p></li>' 
        )
    });

window.Echo.channel(`comment-channel`)
.listen('CommentEvent', (e) => {
    $('#notification').append(
        '<li class="mb-2"><p>$(e.user.name) commented on your post</p></li>' 
    )
});
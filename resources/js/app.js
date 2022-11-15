import './bootstrap'

import Echo from "laravel-echo"


import { io } from "socket.io-client"
window.io = io


window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001',
});

let onlineUsersLength = 0;

window.Echo.join(`online`)
    .here((users) => {
        
        onlineUsersLength = users.length;
        if(users.length > 1){
            $('no-online-users').css('display','none');
        }

        let userId = $('meta[name=user-id]').attr('content');
        if(user.id  == userId){
            return;
        }

        users.foeEach(function(user){
            $('#online-users').append(`<li id="user-${user.id}" class="list-group-item"><span class="fa fa-circle text-success"></span> ${user.name}</li>`)
        })
        console.log(users);
    })
    .joining((user) => {

        onlineUsersLength++;

        $('no-online-users').css('display','none');

        $('#online-users').append(`<li id="user-${user.id}" class="list-group-item"><span class="fa fa-circle text-success"></span> ${user.name}</li>`)
    })
    .leaving((user) => {
        onlineUsersLength--;
        if(onlineUsersLength == 1){
            $('no-online-users').css('display','block');
        }
        
        $('#user-' + user.id).remove();
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


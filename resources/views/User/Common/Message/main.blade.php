@extends('User.Template.layout')

@section('content')
   <div class="flex bg-white dark:bg-dark2">

            <!-- sidebar -->
            @include('User.Common.Message.sidebar')

            <!-- message center -->
            <div class="flex-1">

                <!-- chat heading -->
                @include('User.Common.Message.heading')
                    
                <!-- chats bubble -->
                @include('User.Common.Message.chat')

                <!-- sending message area -->
                @include('User.Common.Message.send')

            </div>

            <!-- user profile right info -->
            @include('User.Common.Message.profile-right')
            
        </div>

@endsection
@section('ajax-scripts')
    <script src="https://cdn.socket.io/4.7.5/socket.io.min.js"></script>

<script>

    $(document).ready(function(){
        let socket = io("http://localhost:3000");
       function userSearch(){
         $.ajax({
            url: MainURL + "/message/search",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + MainToken
            },
            data: {
                search: $("#MessagePageSearch").val()
            },
            success: function(response){
                let html = "";
               response.data.forEach(element => {
                   html += `
                   <a href="javascript:void(0);" onclick="loadUser(${element.id})" class="relative flex items-center gap-4 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-14 h-14 shrink-0"> 
                                <img src="${getImageUrl(element.profile?.profile_image)}" alt="" class="object-cover w-full h-full rounded-full">
                                <div class="w-4 h-4 absolute bottom-0 right-0  bg-green-500 rounded-full border border-white dark:border-slate-800"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1.5">
                                    <div class="mr-auto text-sm text-black dark:text-white font-medium">${element.profile?.display_name || element.username}</div>
                                    <div class="text-xs font-light text-gray-500 dark:text-white/70">${ element.last_message?.created_at ? humanizeDate(element.last_message?.created_at) : ""}</div> 
                                </div>
                                <div class="font-medium overflow-hidden text-ellipsis text-sm whitespace-nowrap">${element.last_message?.message || ""}</div>
                            </div>
                        </a>
                   `;
               });
               $("#MessageUserList").html(html);
            }
        })
       }
       $("#MessagePageSearch").on("input", function(){
           userSearch();
       })

       window.loadUser = function(id){
            $.ajax({
                url: MainURL + "/message/load-user/",
                type: "GET",
                headers: {
                    'Authorization': 'Bearer ' + MainToken
                },
                data: {
                    user_id: id
                },
                success: function(response){
                    let {user} = response.data;
                    console.log(user);
                    localStorage.removeItem("other_user");
                    localStorage.setItem("other_user", JSON.stringify(user));
                    console.log(user);
                    let html = "";
                    html += `
                    <div class="flex items-center gap-2" id="ChatHeader">
                        <div class="relative cursor-pointer max-md:hidden"  uk-toggle="target: .rightt ; cls: hidden">
                            <img src="${getImageUrl(user.profile?.profile_image)}" alt="" class="w-8 h-8 rounded-full shadow">
                            <div class="w-2 h-2 bg-teal-500 rounded-full absolute right-0 bottom-0 m-px"></div>
                        </div>
                        <div class="cursor-pointer" uk-toggle="target: .rightt ; cls: hidden">
                            <div class="text-base font-bold">${user.profile?.display_name || user.username}</div>
                            <div class="text-xs text-green-500 font-semibold"> Online</div>
                        </div>
                    </div>
                    `;
                    $("#ChatHeader").html(html);
                    loadChats();
                    // let chatHtml = "";
                    // response.data.messages.forEach(element => {
                    //     console.log(element);
                    //     if(element.sender_id == user.id){
                    //         chatHtml += sentMessage(element.message,element.is_media,user);
                    //     }else{
                    //         chatHtml += receivedMessage(element.message,element.is_media,user);
                    //     }
                    // });
                    // $("#ChatContainer").html(chatHtml);
                }
            })
       }
       

       function receivedMessage(message,is_media,user)
       {
            let html = "";
            html += `
                <div class="flex gap-3">
                    <img src="${user?.profile ? getImageUrl(user.profile?.profile_image) : ""}" alt="" class="w-9 h-9 rounded-full shadow">
                    <div class="px-4 py-2 rounded-[20px] max-w-sm bg-secondery"> ${message} </div>
                </div> 
            `;
            return html;
        }

        function sentMessage(message,is_media,user){
            let html = "";
            html += `
                <div class="flex gap-2 flex-row-reverse items-end">
                    <img src="${user?.profile ? getImageUrl(user.profile?.profile_image) : ""}" alt="" class="w-5 h-5 rounded-full shadow">
                    <div class="px-4 py-2 rounded-[20px] max-w-sm bg-gradient-to-tr from-sky-500 to-blue-500 text-white shadow"> ${message} </div>
                </div>  
            `;
            return html;
        }


        function loadChats(){
            let user = JSON.parse(localStorage.getItem("user_data"));
            let other_user = JSON.parse(localStorage.getItem("other_user"));
            $.ajax({
                url: MainURL + "/message/load-chats/",
                type: "GET",
                headers: {
                    'Authorization': 'Bearer ' + MainToken
                },
                data: {
                    other_user_id: other_user.id
                },
                success: function(response){
                    localStorage.removeItem("chat_session");
                    localStorage.setItem("chat_session", JSON.stringify(response.data.chat_session));
                    registerUserForSocket();

                    let html = "";
                    response.data.chats.forEach(element => {
                        console.log(element.user_id == other_user.id+ " "+ other_user.id)
                        if(element.user_id != other_user.id){
                            html += sentMessage(element.message,element.is_media,user);
                        }else{
                            html += receivedMessage(element.message,element.is_media,user);
                        }
                    });
                    $("#ChatContainer").html(html);
                }
            })
        }
            
       userSearch();
       loadChats();


    // ============== chat code area ===========================

     function registerUserForSocket(){
        let user = JSON.parse(localStorage.getItem("user_data"));
        let chat_session = JSON.parse(localStorage.getItem("chat_session"));
        
        // Disconnect existing socket if any
        if(socket) {
            socket.disconnect();
        }
        
        // Create new socket connection
        socket = io("http://localhost:3000");
        
        const userId = user.id;
        const roomId = chat_session.id;
        
        console.log("Registering user:", userId, "Room:", roomId);
        
        socket.emit("registerUser", {
            userId: userId,
            roomId: roomId
        });

        // Listen for incoming messages - THIS SHOULD BE HERE, NOT IN sendMessage()
        socket.on("receiveMessage", function(data) {
            console.log("Message received:", data);
            
            let user = JSON.parse(localStorage.getItem("user_data"));
            let other_user = JSON.parse(localStorage.getItem("other_user"));

            let html = "";
            if (data.from === user.id) {
                html = sentMessage(data.message, false, user);
            } else {
                html = receivedMessage(data.message, false, other_user);
            }
            
            $("#ChatContainer").append(html);
            
            // Optional: Scroll to bottom
            $("#ChatContainer").scrollTop($("#ChatContainer")[0].scrollHeight);
        });

        // Listen for connection status
        socket.on("connect", function() {
            console.log("Socket connected:", socket.id);
        });

        socket.on("disconnect", function() {
            console.log("Socket disconnected");
        });

        socket.on("error", function(error) {
            console.error("Socket error:", error);
        });
    }

    function sendMessage(){
        if(!socket || !socket.connected) {
            console.error("Socket not connected");
            return;
        }

        let user = JSON.parse(localStorage.getItem("user_data"));
        let chat_session = JSON.parse(localStorage.getItem("chat_session"));
        let auth_token = localStorage.getItem("auth_token");
        
        const userId = user.id;
        const message = $("#MessageInput").val();
        const roomId = chat_session.id;

        if(!message.trim()) {
            return; // Don't send empty messages
        }

        console.log("Sending message:", message);
        
        socket.emit("sendMessage", {
            userId: userId,
            roomId: roomId,
            message: message,
            authToken: auth_token
        });

        // Clear input after sending
        $("#MessageInput").val("");
    }

    $("#SendMessageButton").on("click", function(){
        sendMessage();
        
    });

    // Optional: Send message on Enter key
    $("#MessageInput").on("keypress", function(e){
        if(e.which === 13 && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });
      
    })
</script>
@endsection

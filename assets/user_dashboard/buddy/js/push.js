var host = $("meta[name='host']").attr("content");

function getNotification(id, key){
  var pusher = new Pusher(key, {
    cluster: 'ap2'
  });
 
  var channel = pusher.subscribe('noti-chatChannel.'+id);
  channel.bind('notiChat', function(data) {
    //notiSound();
  });
}

function getMessage(id1, id2, key){
  var pusher = new Pusher(key, {
    cluster: 'ap2'
  });

  var channel = pusher.subscribe('send-chatChannel.'+id1+'.'+id2);
  channel.bind('sendChat', function(data) {
     notiSound();
     var response = data;
     var chat_block = '<li><div class="chat-img"><img  src="'+host+'/../public/storage/user/profile_img/'+response.image+'" onerror="this.onerror=null;this.src='+host+'/public/user-placeholder.jpg;" /></div><div class="chat-content"><h5>'+response.name+'</h5><div class="box bg-light-info">'+response.message+'</div></div></li>';

     $('#talksall').append(chat_block);
     chatScrollDown();

  });
}
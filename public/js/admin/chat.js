/**
 * Created by 城府& on 2019/02/25.
 */
var openid = $("#openid").val();

setInterval(function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url     :   '/admin/chat?openid=' + openid + '&pos=' + $("#msg_pos").val(),
        type    :   'get',
        dataType:   'json',
        success :   function(d){
            if(d.errno==0){     //服务器响应正常
                console.log(d);
                //数据填充
                if(d.data.type==0){
                    var msg_str="<p class='time' align='center'><span>"+d.data.ctime+
                        "</span></p><li class='others' style='width:2000px;height: 100px;' align='left'> <div><img style='width:50px;height:50px;' src='"+ d.res.headimgurl +
                        "' alt=''></div><div class='content'><p class='author'>" + d.res.nickname+
                        "</p><div class='msg'>" + d.data.text+
                        "</div></div></li>";
                }else if(d.data.type==1){
                    var msg_str="<li class='others' style='width:2000px;height: 100px;' align='center'> <div></div><div class='content'><p class='author'>" +
                        "</p><div class='msg'>客服:" + d.data.text+
                        "</div></div></li>";
                }


                $("#J__chatMsgList").append(msg_str);
                $("#msg_pos").val(d.data.id)
            }else{

            }
        }
    });
},5000);

// 客服发送消息 begin
$("#send_msg_btn").click(function(e){
    e.preventDefault();
    var send_msg = $("#send_msg").val().trim();
    var msg_str="<li class='others' style='width:2000px;height: 100px;' align='center'> <div></div><div class='content'><p class='author'>" +
        "</p><div class='msg'>客服:" + send_msg+
        "</div></div></li>";

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url     :   '/admin/textMsg?openid=' + openid + '&text=' + send_msg,
        type    :   'get',
        dataType:   'json',
        success :   function(d){

        }
    });

    $("#J__chatMsgList").append(msg_str);
    $("#send_msg").val('');
});

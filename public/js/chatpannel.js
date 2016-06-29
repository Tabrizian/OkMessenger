$('.chat-history[data-chat=person1]').addClass('active-chat');
$('.person[data-chat=person1]').addClass('active');

$('.left .person').mousedown(function(){
    if ($(this).hasClass('.active')) {
        return false;
    } else {
        var findChat = $(this).attr('data-chat');
        var personName = $(this).find('.name').text();
        $('.right .top .name').html(personName);
        $('.chat-history').removeClass('active-chat');
        $('.left .person').removeClass('active');
        $(this).addClass('active');
        $('.chat-history[data-chat = '+findChat+']').addClass('active-chat');
    }
});

function sendFunction(){
    var node = document.createElement("div");
    var textnode = document.createTextNode(document.getElementById("message-to-send").value);
    node.appendChild(textnode);
    node.className="bubble me active-chat";
    document.getElementsByClassName("active-chat")[0].appendChild(node);

};

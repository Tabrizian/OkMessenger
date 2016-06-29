<?php require_once('../includes/initialize.php'); ?>
<?php include_layout_template('chat-header.php'); ?>

<div class="wrapper">
    <div class="container">
        <div class="left">
            <div class="top">
                <div class="search">
                    <div class="row">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="search" style="color: #999999" />
                    </div>
                </div>
            </div>
            <ul class="people">
                <li class="person" data-chat="person1">
                    <img src="#" alt="" />
                    <span class="name">friend 1</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">last message</span>
                </li>
                <li class="person" data-chat="person2">
                    <img src="http://s3.postimg.org/yf86x7z1r/img2.jpg" alt="" />
                    <span class="name">friend2</span>
                    <span class="time">1:44 PM</span>
                    <span class="preview">last massage</span>
                </li>
                <li class="person" data-chat="person3">
                    <img src="http://s3.postimg.org/h9q4sm433/img3.jpg" alt="" />
                    <span class="name">friend3</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">last massage</span>
                </li>
                <li class="person" data-chat="person4">
                    <img src="http://s3.postimg.org/quect8isv/img4.jpg" alt="" />
                    <span class="name">friend4</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">last massage</span>
                </li>
                <li class="person" data-chat="person5">
                    <img src="http://s16.postimg.org/ete1l89z5/img5.jpg" alt="" />
                    <span class="name">friend5</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">last massage</span>
                </li>
                <li class="person" data-chat="person6">
                    <img src="http://s30.postimg.org/kwi7e42rh/img6.jpg" alt="" />
                    <span class="name">friend6</span>
                    <span class="time">2:09 PM</span>
                    <span class="preview">last massage</span>
                </li>
            </ul>
        </div>
        <div class="right" >
            <div class="top"><span>To: <span class="name">friend 2</span></span></div>

            <div  class="chat-history"  data-chat="person1">

                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>

                <div class="bubble you">
                    Hello,
                </div>

                <div class="bubble me">
                    it's me.
                </div>

                <div class="bubble you">
                    I was wondering...
                </div>

            </div>
            <div  class="chat-history"  data-chat="person2">

                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
            </div>
            <div  class="chat-history"  data-chat="person3">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
            </div>
            <div  class="chat-history"  data-chat="person4">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
            </div>
            <div  class="chat-history"  data-chat="person5">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
            </div>
            <div  class="chat-history"  data-chat="person6">
                <div class="conversation-start">
                    <span>Today, 6:48 AM</span>
                </div>
            </div>

            <div class="write">

                <div class="chat-message clearfix">
                    <input type="text"  name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"/>

                    <a href ="http://www.google.com" class="btn " ><i class="fa fa-btn fa-smile-o "></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href ="http://www.google.com" class="btn " ><i class="fa fa-file-image-o"></i></a>

                    <button onclick="sendFunction()" >Send</button>

                </div>

            </div>-
        </div>
    </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



<script src="js/chatpannel.js"></script>

<?php include_layout_template('login-footer.php'); ?>
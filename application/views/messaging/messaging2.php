<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../../assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower_components/bootstrap-horizon/bootstrap-horizon.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php') ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/models/GatorMessage.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/models/GatorUser.php'); ?>
</head>
<style>
    .container {
        max-width: 1170px;
        margin: auto;
        padding: 1em;
        margin: 0 -1em;
        border-bottom: 1px
    }

    img {
        max-width: 100%;
    }

    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%;
        border-right: 1px solid #c4c4c4;
    }

    .inbox_msg {
        border: 3px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }

    .top_spac {
        margin: 20px 0 0;
    }


    .recent_heading {
        float: left;
        width: 40%;
    }

    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
        padding:
    }

    .headind_srch {
        padding: 10px 29px 10px 20px;
        overflow: hidden;
        border-bottom: 1px solid #5F5B80;
    }

    .recent_heading h4 {
        color: #5F5B80;
        font-size: 21px;
        margin: auto;
    }

    .srch_bar input {
        border: 1px solid #5F5B80;
        border-width: 0 0 1px 0;
        width: 80%;
        padding: 2px 0 4px 6px;
        background: none;
    }

    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
        font-family: Arial;
    }

    .srch_bar .input-group-addon {
        margin: 0 0 0 -27px;
    }

    .chat_ib h5 {
        font-size: 15px;
        color: #5F5B80;
        margin: 0 0 8px 0;
        font-family: Arial;
    }

    .chat_ib h5 span {
        font-size: 13px;
        float: right;
    }

    .chat_ib p {
        font-size: 20px;
        color: #5F5B80;
        margin: auto
    }

    .chat_img {
        float: left;
        width: 11%;
    }

    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people {
        overflow: hidden;
        clear: both;
    }

    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }

    .inbox_chat {
        height: 1000px;
        overflow-y: scroll;
    }

    .active_chat {
        background: #ebebeb;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
        height: 30px;
        font-size: 20px;
    }

    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }

    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 20px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }

    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .received_withd_msg {
        width: 57%;
    }

    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #5F5B80 none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 20px;
        margin: 0;
        color: #fff;
        padding: 5px 10px 5px 12px;
    }

    .outgoing_msg {
        overflow: hidden;
        margin: 26px 0 26px;
    }

    .sent_msg {
        float: right;
        width: 46%;
    }

    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 20px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }

    .msg_send_btn {
        background: #5F5B80 none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 20px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }

    .messaging {
        padding: 0 0 50px 0;
    }

    .msg_history {
        height: 100vh;
        overflow-y: auto;
    }
</style>





<body>


<!-- Banner -->
<section id="banner_abt">
    <div class="col-md-15">
        <div class="container">
            <div class="container-lg">
                <h2 class="text-center">Messaging Dashboard</h2>
                <h6 class="text-center">Connecting you to the perfect place</h6>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Inbox</h4>
                    </div>
                    <!-- <div class="srch_bar">
                      <div class="stylish-input-group">
                        <input type="text" class="search-bar"  placeholder="Search" >
                        <span class="input-group-addon">
                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                        </span> </div>
                    </div> -->
                </div>


                <div class="inbox_chat">
                    <div class="chat_list active_chat">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput </h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput</h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput </h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput </h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>

                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput </h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput</h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>
                            </div>
                        </div>
                    </div>
                    <div class="chat_list">
                        <div class="chat_people">
                            <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                       alt="sunil"></div>
                            <div class="chat_ib">
                                <h5>Sunil Rajput </h5>
                                <p>Test, which is a new approach to have all solutions
                                    astrology under one roof.</p>
                                <span class="time-stamp">Recieved: 07/27/20 at 9:45pm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sample controller -->
            <?php

            $me = '03424813579798943994194923479425';   // Raymond
            $them = '59265290859313583450252586370018'; // 123

            $getMeName = new GatorUser();
            $getMeName->get($me);
            $me_name = $getMeName->first_name;

            $getThemName = new GatorUser();
            $getThemName->get($them);
            $them_name = $getThemName->first_name;


            $msg = new GatorMessage();
            $msg->addQuery('sender_id', '=', $me);
            $msg->addQuery('receiver_id', '=', $them);
            $msg->addQueryOR('sender_id', '=', $them);
            $msg->addQuery('receiver_id', '=', $me);
	    $msg->orderBy('created', 'ASC');
            $msg->query();
            GatorHub::console_log("Found " . $msg->getRowCount() . " messages");

            ?>


            <!-- right side of the UI that shows messages -->
            <?php
            echo '<div class="mesgs">';
            echo '<div class="msg_history">';
            ?>
            <?php

            while ($msg->next()) {
                // I sent it
                if ($msg->sender_id == $me) {
                    echo '<div class="outgoing_msg">';
                    echo '<div class="sent_msg">';
                    echo "<p>$msg->content</p>";
                    echo "<span class='time_date'> $msg->created</span> </div>";
                    echo '</div>';
                }
                // they sent it
                else if ($msg->sender_id == $them) {
                    echo '<div class="incoming_msg">';
                    echo '<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>';
                    echo '<div class="received_msg">';
                    echo '<div class="received_withd_msg">';
                    echo "<p>$msg->content</p>";
                    echo "<span class='time_date'> $msg->created</span> </div>";
                    echo '</div>';
                    echo '</div>';
                }
            }


            ?>
            <!--
            <div class="mesgs">
                <div class="msg_history">

                    <div class="incoming_msg">
                        <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                           alt="sunil"></div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>Test which is a new approach to have all solutions</p>
                                <span class="time_date"> 11:01 AM    |    June 9</span></div>
                        </div>
                    </div>

                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Test which is a new approach to have all
                                solutions</p>
                            <span class="time_date"> 11:01 AM    |    June 9</span></div>
                    </div>

                    <div class="incoming_msg">
                        <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                           alt="sunil"></div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>Test, which is a new approach to have</p>
                                <span class="time_date"> 11:01 AM    |    Yesterday</span></div>
                        </div>
                    </div>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>Apollo University, Delhi, India Test</p>
                            <span class="time_date"> 11:01 AM    |    Today</span></div>
                    </div>
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png"
                                                           alt="sunil"></div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>We work directly with our designers and suppliers,
                                    and sell direct to you, which means quality, exclusive
                                    products, at a price anyone can afford.</p>
                                <span class="time_date"> 11:01 AM    |    Today</span></div>
                        </div>
                    </div>
                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <input type="text" class="write_msg" placeholder="Type a message"/>
                        <button class="msg_send_btn" type="button">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>

<!-- Announcement -->
<!-- <div class="container-fluid p-5">
    <div class="text-center">


        <ul class="list-group m-3 p-5">
            <?php
// $msg = new GatorMessage();
// $msg->addQuery('receiver_id', '=', $_SESSION['sys_id']);
// $msg->query();


// while ($msg->next()) {
//     $sender = new GatorUser();
//     //obtaining person who sent message (their sys_id = sender_id from our message)
//     $sender->get( $msg->sender_id);
//     printf('<li class="list-group-item">%s %s %s</li>', $sender->first_name, $msg->content, $msg->created);
// }
?>
        </ul>


        Next btn -->
<!-- <div class="m-4 p-4 text-center">
    <a href="profile.php">
        <button type="button" class="btn btn-secondary">Back to profile</button>
    <a>
</div>
</div>
</div>

</div></div> -->


<?php include '../include/footer.php'; ?>


<!-- Script Tags -->
<script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

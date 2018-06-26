<!-- Facebook and Direct Chat -->
<script>
    // $(document).on('click',function(){
    //     $('.collapse').collapse('hide');
    // })
    window.fbAsyncInit = function() {
        FB.init({
          appId      : '387834344756149',
          xfbml      : true,
          version    : 'v2.7'
        });
        FB.AppEvents.logPageView();
    };
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<style>
    /* FeedBack */
    a.rightfixed {
        position: relative;
        background: #1F4774;
        padding: 15px 25px;
        z-index: 99;
        color: #fff;
        border-radius: 3px;
        font-size: 12px;
        padding-left: 34px;
        cursor: pointer;
        -webkit-transition: all .5s;
        transition: all .5s;
        text-decoration: none;
        opacity: 1;
        margin-bottom: 1px;
        clear: both;
        float: none;
        left: 0;
    }
    a.rightfixed:hover {
      opacity: 1;
    }
    a.rightfixed i::before {
        color: #fff;
        top: 10px;
        left: 7px;
        font-size: 20px;
    }
    a.feedback {
        background: #a22314;
    }
    a.referral {
      background: #1b8330;
    }
    .popRightBlog {
        width: 350px;
        height: 260px;
        left: 35%;
        top: 10%;
    }
    .popRightBlog textarea{
        height: 150px;
        min-height: 150px;
        max-height: 150px;
        width: 100%;
        min-width: 100%;
        max-width: 100%;
    }
    .popRightBlog input[type=email], .popRightBlog input[type=text]{
        width: 65%;
        margin-bottom: 2px;
        padding: 5px;
        border: 1px solid #ccc;
    }
    .popRightBlog input[type=text] {
      width: 34%;
      margin-right: 2px;
    }
    a.feedback:hover {
        margin-left: -66px;
    }
    .chat a.enquiries {
        background: url(//storage.googleapis.com/instapage-user-media/e315080c/8593373-0-s-bg.jpg) no-repeat right center #1F4774;
        background-size: 23px;
        background-position-x: 103px;
        color: #fff;
    }
    a.enquiries:hover {
        left: 93px;
    }
    a.referral:hover {
        margin-left: -56px;
    }
    
    .enquiry-content {
        background: #fff;
        border: 1px solid #D7D7D7;
        padding: 10px 10px 0;
        position: absolute;
        width: 142px;
        left: -120px;
        font-size: 12px;
        text-align: center;
        bottom: -130px;
        -webkit-transition: all .5s;
        transition: all .5s;
        padding-bottom: 10px;
        color: #444;
        z-index: -1;
    }
    a.enquiries:hover .enquiry-content, .enquiry-content:hover {
           left: 0;
    }    
    .cover {
        position: relative;
        clear: both;
    }
    .cover img {
        position: absolute;
        right: 2px;
        top: 5px;
        display: none;
    }
    .cover p.msg {
        width: 100%;
        color: #fff;
        padding: 5px 10px;
        background: #a22314;
        display: none;
    }
    .cover-rightfixed {
        position: fixed;
        top: 20%;
        left: -95px;
        z-index: 999;
        text-align: left;
    }
    .text-t.rightfixed {
        position: relative;
        background: red;
        padding: 15px 10px;
        z-index: 99;
        color: #fff;
        border-radius: 3px;
        font-size: 12px;
        padding-left: 50px;
        cursor: pointer;
        -webkit-transition: all .5s;
        transition: all .5s;
        text-decoration: none;
        opacity: 1;
        margin-bottom: 1px;
        clear: both;
        float: none;
        left: 0;
        font-size: 15px; 
        float:left; 
        background: url(<?php echo base_url();?>assets/spa/multi.png) no-repeat right center red;
        background-size: 23px;
        background-position-x: 275px;
        margin-left: -168px;
        width: 313px;
        text-align: left;
    }
    .text-t.rightfixed:hover {
        opacity: 1;
        z-index: 9999999;
        margin-left: 0
    }
    .text-t.rightfixed i::before {
        color: #fff;
        top: 10px;
        left: 7px;
        font-size: 20px;
    }
    .text-t.feedback:hover {
        margin-left: -66px;
    }
    .text-t.enquiries:hover {
        left: 95px;
        width: 313px;
    }
    .text-t.referral:hover {
        margin-left: -56px;
    }
    .text-t.enquiries:hover .enquiry-content, .enquiry-content:hover {
        left: 0px;

    }
    .text-t .enquiry-content ul {
        padding: 0;
        margin: 0;
    }
    .text-t .enquiry-content ul li{
        display: inline-block;
        list-style: none;
        width: 100%;
    }

    .text-t .enquiry-content ul li.divider{
        border-bottom: 1px #000 solid;
        width: 100%;
        float: left;
        margin-bottom: 5px;
    }
    .text-t .enquiry-content ul li a{
        color: #000;
        padding: 10px 8px;
        font-size: 15px;
        float: left;
    }
    .text-t .enquiry-content ul li a:hover{
        color: #203864;
        text-decoration: underline;
    }
    .text-t  .enquiry-content {
        bottom: -529px;
        left: -313px;
        width: 313px;
    }

    .multiple-list.rightfixed {
        position: relative;
        padding: 15px 10px;
        padding-left: 50px;
        z-index: 99;
        color: #fff;
        border-radius: 3px;
        font-size: 12px;
        cursor: pointer;
        -webkit-transition: all .5s;
        transition: all .5s;
        text-decoration: none;
        opacity: 1;
        margin-bottom: 1px;
        clear: both;
        float: none;
        left: 0;
        background: url(<?php echo base_url();?>assets/spa/icon-report.png) no-repeat right center green; 
        background-size: 23px;
        background-position-x: 275px;
        margin-left: -168px;
        width: 313px;
        text-align: left;
    }
    .multiple-list.rightfixed:hover {
        opacity: 1;
        z-index: 9999999;
        margin-left: 0;
    }
    .multiple-list.rightfixed i::before {
        color: #fff;
        top: 10px;
        left: 7px;
        font-size: 20px;
    }
    .multiple-list.feedback:hover {
        margin-right: -66px;
    }

    .multiple-list.enquiries:hover {
        left: 95px;
        width: 313px;
    }
    .multiple-list.referral:hover {
        margin-right: -56px;
    }
    .multiple-list.enquiries:hover .enquiry-content, .enquiry-content:hover {
        left: 0;
    }
    .multiple-list .enquiry-content ul {
        padding: 0;
        margin: 0;
    }
    .multiple-list .enquiry-content ul li{
        display: inline-block;
        list-style: none;
        width: 100%;
        text-align: left;
    }
    .multiple-list .enquiry-content ul li a{
        color: #000;
        padding: 10px 8px;
        font-size: 15px;
        float: left;
    }
    .multiple-list .enquiry-content ul li a:hover{
        color: #203864;
        text-decoration: underline;
    }
    .multiple-list  .enquiry-content {
        bottom: -67px;
        width: 313px;
        left: -219px
    }
    .cover-rightfixed.chat{
        top: 36%;
    }
    .glyphicons.remove_2 i:before {
        cursor: pointer;
        color: #000 !important;
        top: 0 !important;
    }
    .cover-fix-menu {
        position: fixed;
        left: 0; 
        width: 52px;
        height: 100%;
        overflow: hidden;
        z-index: 9999999;
    }
    .cover-fix-menu:hover {
        /*width: 350px;*/
    }
</style>
<div class="cover-fix-menu" id="sidemenu" style="position: fixed;left: 0;">
    <!-- Side fix right -->
    <div class="cover-rightfixed cover-rightfixed1 " style="z-index: 99999;">
        <div class="rightfixed enquiries text-t btn-rounded  no-js " style="">
            Menu
            <div class="enquiry-content">
                <ul style="text-align: left; font-size: 13px; color: #000; ">
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/pos"><span data-bind="text: lang.lang.pos"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/session"><span data-bind="text: lang.lang.session_management"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/books"><span data-bind="text: lang.lang.booking_management"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/services"><span data-bind="text: lang.lang.serving_customer"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/pay"><span data-bind="text: lang.lang.cash_receipt"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/customer"><span data-bind="text: lang.lang.customer"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/rooms"><span data-bind="text: lang.lang.room_facility"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/employee"><span data-bind="text: lang.lang.employee"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/loyalty"><span data-bind="text: lang.lang.loyalty"></span></a></li>
                    <li><a href="<?php echo base_url(); ?>wellnez_ktv/setting"><span data-bind="text: lang.lang.setting"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url()?>rrd" target="_blank">Back to BanhJi</a></li>
                </ul>
            
            </div>
        </div>
    </div>
    <div class="cover-rightfixed " style="top: 28%; z-index: 9999; left: -95px;">
        <div class="rightfixed enquiries multiple-list  btn-rounded glyphicons glyphicons-plus no-js " style="float:left;  font-size: 15px;">
            Reports
            <div class="enquiry-content">
                <ul >
                    <li>
                        <a href="<?php echo base_url(); ?>wellnez_ktv/reports">
                            <span data-bind="text: lang.lang.reports"></span>         
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cover-rightfixed chat" style=" z-index: 999; left: -92px;">
        <a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 142px;float:left;">
            Support
            <div class="enquiry-content">
                <p style="font-size: 14px;">Call us by<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
                <div class="fb-messengermessageus" 
                    messenger_app_id="1301847836514973" 
                    page_id="298877880530498"
                    color="blue"
                    width="180"
                    size="standard" ></div>
            </div>
        </a>
    </div>
    <!-- End -->
</div>
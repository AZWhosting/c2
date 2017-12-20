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
        background: url(//storage.googleapis.com/instapage-user-media/e315080c/8593373-0-s-bg.jpg) no-repeat 15px center #1F4774;
        background-size: 23px;
    }
    a.enquiries:hover {
        left: -95px;
    }
    a.referral:hover {
        margin-left: -56px;
    }
    .cover-rightfixed {
        position: fixed;
        top: 39.7%;
        right: -95px;
        z-index: 999;
        text-align: left;
    }
    .enquiry-content {
        background: #fff;
        border: 1px solid #D7D7D7;
        padding: 10px 10px 0;
        position: absolute;
        width: 142px;
        right: -120px;
        font-size: 12px;
        text-align: center;
        bottom: -152px;
        -webkit-transition: all .5s;
        transition: all .5s;
        padding-bottom: 10px;
        color: #444;
        z-index: -1;
    }
    a.enquiries:hover .enquiry-content, .enquiry-content:hover {
           right: 0;
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
</style>

<!-- Side fix right -->
<div class="cover-rightfixed cover-rightfixed1 " style="z-index: 99999;">
    <div class="rightfixed enquiries text-t btn-rounded  no-js " style="font-size: 15px; float:left; background: url(<?php echo base_url();?>/assets/spa/plus.png) no-repeat 15px center red; background-size: 23px;">
        Transaction
        <div class="enquiry-content">
            <ul style="text-align: left; font-size: 13px; color: #000; ">
                <li><a href="#/calendar">Create Calendar</a></li>
                <li><a href="#/cash-sale">Create Cash Sale</a></li>
                <li><a href="#/receipt">Create Receipt</a></li>
                <li><a href="#/invoice">Create Invoice</a></li>
                <li><a href="#/expenses">Create Expenses</a></li>
                <li class="divider"></li>
                <li><a href="#/add_customer">Add New Customer</a></li>
                <li><a href="#/add_staff">Add New Staff</a></li>
                <li><a href="#/add_service">Add New Service</a></li>
            </ul>
        
        </div>
    </div>
</div>
<div class="cover-rightfixed " style="top: 45.9%; z-index: 9999;">
    <div class="rightfixed enquiries multiple-list  btn-rounded glyphicons glyphicons-plus no-js " style="float:left;  font-size: 15px;">
        Multitasks
        <div class="enquiry-content">
            <ul data-template="multiTaskList-row-template" data-bind="source: multiTaskList">
                <li>
                    <a href="#/calendar">
                        Create Calendar
                        <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                            <i></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#/receipt">
                        Create Receipt
                        <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                            <i class="icon-remove"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#/invoice">
                        Create Invoice
                        <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                            <i class="icon-remove"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="cover-rightfixed chat" style=" z-index: 999">
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

<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));


    // Google Font
    WebFontConfig = {
        google: {
            families: ['Battambang::khmer']
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();

  </script>
  <script type="text/javascript">

    function createCookie(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000000000000000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }
    function eraseCookie(name) {
        createCookie(name,"");
    }
    jQuery(function(){
        var quickfitText=function(reset) {
            var quickFitClass="text-large";             //Base class of elements to adapt
            var quickFitGroupClass="quickfitGroup";     //Elements in a group will all have the same size
            var quickFitIndependantClass="quickfitIndependant"; //Elements with this class won't be taken for quickfitGroup (they will be independant)
            var quickFitSetClass="text-large";          //Elements with size set will get this class
            var quickFitFontSizeData="quickfit-font-size";
            //Set the font-size property of your element to the MINIMUM size you want for your content
            
            if(reset)
            { jQuery("."+quickFitSetClass).removeClass(quickFitSetClass); }

            //The magic happens here
            var setMaxTextSize=function(jElement) {
                //Get and set the font size into data for reuse upon resize
                var fontSize=parseInt(jElement.data(quickFitFontSizeData)) || parseInt(jElement.css("font-size"));
                jElement.data(quickFitFontSizeData,fontSize);
            
                //Gradually increase font size unti the element gets a big increase in height (ie line break)
                var i=0;
                var previousHeight;
                do
                {
                    previousHeight=jElement.height();
                    jElement.css("font-size",""+(++fontSize)+"px");
                }
                while(i++<300 && jElement.height()-previousHeight<fontSize/2)

                //Finally, go back before the increase in height and set the element as resized by adding quickFitSetClass
                fontSize-=1;
                jElement.addClass(quickFitSetClass).css("font-size",""+fontSize+"px");

                return fontSize;
            };
            jQuery("."+quickFitClass).each(function() {
                var jThis=$(this);

                if(!jThis.hasClass(quickFitSetClass))
                {
                    var jFitGroup=jThis.closest("."+quickFitGroupClass);
                    if(!jThis.hasClass(quickFitIndependantClass) && jFitGroup.length>0)
                    {
                        //We are in a group, set the max fit size for all
                        var minFontSize=1000;
                        jFitGroup.find("."+quickFitClass+":not(."+quickFitIndependantClass+")").each(function(i,item) {
                            minFontSize=Math.min(minFontSize,setMaxTextSize($(item)));
                        }).css("font-size",""+minFontSize+"px");
                    }
                    else
                    { setMaxTextSize(jThis); }
                }
            });
        };
        quickfitText(); //Run once...
        jQuery(window).on("resize orientationchange",function() { quickfitText(true); });
    });
    $(document).ready(function(e) {
        $("#feedBackSend").click(function(){
            var MSG = $("#feedbackMsg").val();
            var CurrentURL = $(location).attr('href');
            var UserName = banhji.userData.username;
            var d = new Date();
            var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
            $.ajax({  
                type: 'POST',
                url: '<?php echo base_url(); ?>api/feedbacks', 
                data: { msg: MSG, cURL: CurrentURL, uName: UserName, datesend: strDate },
                success: function(response) {
                    alert(response.message);
                    $("#feedbackMsg").val("");
                    $(".cloze").click();
                }
            });
        });
        $("#referralSend").click(function(){
            var name1 = $("#refferalName1").val();
            var email1 = $("#refferalEmail1").val();
            var name2 = $("#refferalName2").val();
            var email2 = $("#refferalEmail2").val();
            var name3 = $("#refferalName3").val();
            var email3 = $("#refferalEmail3").val();
            var name4 = $("#refferalName4").val();
            var email4 = $("#refferalEmail4").val();
            var name5 = $("#refferalName5").val();
            var email5 = $("#refferalEmail5").val();
            var UserName = banhji.userData.username;
            var d = new Date();
            var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
            $.ajax({  
                type: 'POST',
                url: '<?php echo base_url(); ?>api/referrals',
                data: { uName: UserName, datesend: strDate, rName1: name1, rName2: name2, rName3: name3, rName4: name4, rName5: name5, rMail1: email1, rMail2: email2, rMail3: email3, rMail4: email4, rMail5: email5 },
                success: function(response) {
                    alert(response.message);
                    //$("#feedbackMsg").val("");
                    $(".cloze").click();
                }
            });
        });

        //eraseCookie("isshow");
        var isshow = readCookie("isshow");
        
        if (isshow != 1) {
            createCookie("isshow", 1);
            $(".aWelcome").click();  
        }

        $(".cover-welcome-four-blog a").click(function(){
            $(".close").click();
        });
    });
   </script>
</body>
</html>
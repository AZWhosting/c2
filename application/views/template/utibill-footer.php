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
			var quickFitClass="text-large";				//Base class of elements to adapt
			var quickFitGroupClass="quickfitGroup";		//Elements in a group will all have the same size
			var quickFitIndependantClass="quickfitIndependant";	//Elements with this class won't be taken for quickfitGroup (they will be independant)
			var quickFitSetClass="text-large";			//Elements with size set will get this class
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
		quickfitText();	//Run once...
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
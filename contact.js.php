 //This function refreshes the security or captcha code when you click on the refresh link at the form
//This is the JS function that sends the mail - It is called when you click on the submit button which is in the form
    function vpb_submit_form()
    {//subjetc
        //Variable declaration and assignment
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var name = $("#name").val();
        var companie = $("#companie").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var message = $("#message").val();

        if (name == "") //Validation against empty field for fullname
        {
            $("#response_brought").html('<br clear="all"><div class="pilate_error" align="left">Please enter your name in the required field to proceed. Thanks.</div>');
            $("#name").focus();
        }

        else if (email == "") //Validation against empty field for email address
        {
            $("#response_brought").html('<br clear="all"><div class="pilate_error" align="left">Please enter your email address in the required email field to proceed. Thanks. </div>');
            $("#email").focus();
        }
        else if (reg.test(email) == false) //Validation for working email address
        {
            $("#response_brought").html('<br clear="all"><div class="pilate_error" align="left">Sorry, your email address is invalid. Please enter a valid email address to proceed. Thanks.</div>');
            $("#email").focus();
        }
        else if (phone == "") //Validation against empty field for telephone number
        {
            $("#response_brought").html('<br clear="all"><div class="pilate_error" align="left">Please enter your phone number in the required field to proceed. Thanks.</div>');
            $("#phone").focus();
        }

        else if (message == "") //Validation against empty field for email message
        {
            $("#response_brought").html('<br clear="all"><div class="pilate_error" align="left">Please enter your message in the required message field to proceed. Thanks.</div>');
            $("#message").focus();
        }
        else
        {
            var dataString = {'name': name, 'companie': companie, 'email': email, 'phone': phone, 'message': message, 'submitted': '1'}; //here

            //Show loading image
            $("#response_brought").html('<div style="padding-top: 6px;margin-top: 36px;"><span style="color:#636467;font-weight:bold;font-family:\'Oswald\', Geneva, sans-serif;font-size:14px;">Please wait</span> <img src="http://www.truepilatesprague.com/wp-content/themes/pilate/images/load-ajax.gif" alt="Loading...." align="absmiddle" title="Loading...."/></div>');

            $.post('http://www.truepilatesprague.com/wp-content/themes/pilate/includes/pilate_contact_form.php', dataString, function(response)
            {
                //Check to see if the message is sent or not
                var response_brought = response.indexOf('Congrats');
                if (response_brought != -1)
                {
                    //Clear all form fields on success
                    $("#name").val('');
                    $("#companie").val('');
                    $("#email").val('');
                    $("#phone").val('');
                    $("#message").val('');

                    //Display success message if the message is sent
                    $("#response_brought").html(response);

                    //Remove the success message also after a while of displaying the message to the user
                    setTimeout(function() {
                        $("#response_brought").html('');
                    }, 30000);
                }
                else
                {
                    //Display error message is the message is not sent
                    $("#response_brought").html(response);

                }
            });
        }
    }
 
function doClear(theText) {
    var nb = 1;
    if (theText.value == theText.defaultValue) {
        theText.value = "";
        nb = 2;
    }
    if (theText.value == "") {
        if (nb == 1) {
            theText.value = theText.defaultValue;
        }
    }
}


function Start_element() {

    $("body").css("overflow", "hidden");

    var height_header = $('#canvas_header').height();

    var height_doc = $(window).height();
    var width_doc = $(window).width();

    var height_doc_body = $(document).height();
    var width_doc_body = $(document).width();
    $("body").css("overflow", "auto");

    var height_home = $(".home_logo_container").height();
    if (height_home < height_doc) {
        height_home = height_doc;
    }


    try {
        $(".slider_page").css({'height': (height_home - height_header) + 'px'});
    } catch (err) {
    }
    $("#home_contenaire").css({'height': height_home + 'px'});
    $("#home_contenaire2").css({'height': height_home + 'px'});

    /*	if (width_doc > 900 || jQuery.browser.mobile  ){
     $(".menu").fadeIn(500);
     $(".menu li a.active").next().fadeIn(300);
     }else{
     $(".menu").fadeOut(500);
     $(".menu li ul").fadeOut(0).stop();;
     }*/




    var p = 0;
    $(".pager_wraper_content").each(function(index) {
        //	$(this).css({  'left' :   (p * 25) +'%' });;
        p = p + 1
    });


    var activedivheight = $('.activated').height();
    $(".pager_wraper_all").css({'height': activedivheight + 'px'});


}



function menu_start_element() {

    $("body").css("overflow", "hidden");
    var width_doc = $(window).width();
    $("body").css("overflow", "auto");



    if (width_doc > 900 || jQuery.browser.mobile) {
        $(".menu").fadeIn(500);
        $(".menu li a.active").next().fadeIn(300);
    } else {
        $(".menu").fadeOut(500);
        $(".menu li ul").fadeOut(0).stop();
        ;
    }

}


$(document).ready(function() {

    try {


        Start_element();
        menu_start_element();
		var selectedtabs = $('.menu_container .menu li a').eq(0).attr('name');
        get_html('page_id_studio',selectedtabs);
        $("#page_id_studio").addClass('activated');



        $(window).scroll(function() {
            Start_element();
            //setTimeout("Start_element()", 100 );
        });
        $(window).resize(function() {
            Start_element();
            menu_start_element();
        });
        $(document).resize(function() {
            Start_element();
            menu_start_element();
        });
    } catch (err) {
    }



});



$(document).ready(function() {




    try {

        $('.homeslider').royalSlider({
            arrowsNav: true,
            loop: true,
            keyboardNavEnabled: true,
            controlsInside: false,
            imageScaleMode: 'fill',
            arrowsNavAutoHide: false,
            autoScaleSlider: false,
            autoHeight: false,
            controlNavigation: 'none',
            thumbsFitInViewport: false,
            startSlideId: 0,
            autoPlay: {
                // autoplay options go gere
                enabled: true,
                pauseOnHover: false
            },
            transitionType: 'fade',
            globalCaption: false
        });

    } catch (err) {
    }



    try {
        $('.slider_ul').bxSlider({
            controls: true,
            mode: 'fade',
            responsive: true,
            auto: false,
            pager: false,
            captions: true
        });
    } catch (err) {
    }


});


// Menu and submenu
$(document).ready(function() {
    $(".menu li ul").fadeOut(0).stop();
    $(".menu li .principal").click(
            function() {
                $(".menu li .principal").removeClass("active");
                $(this).addClass("active");
                $(".menu li ul").fadeOut(1);
                $(this).next().fadeIn(300);
                return false;
            }
    );

    $(".menubtn").click(
            function() {
                $(".menu li ul").fadeOut(1);
                $(".menu").animate({height: 'toggle'}, 400);
                return false;
            }
    );

});


// ------------------------------------------------ navigation

$(document).ready(function() {

    $(".godown").live('click', function() {
        var position = $('#canvas_header').position();
        $("html, body").animate({scrollTop: position.top}, 1000);
        return false;
    });

    $(".godownhome").live('click', function() {
        var position = $('.home_section_action').position();
        $("html, body").animate({scrollTop: position.top}, 1000);
        return false;
    });



    $("#section_header .logo, .logo_pilates").live('click', function() {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });


    $(".footer_backtotop").live('click', function() {
        var position = $('#canvas_header').position();
        $("html, body").animate({scrollTop: position.top + 1}, 1700);
        return false;
    });


    $(".menu_container .menu a , .big_icons a").live('click', function() {

        try {
            Start_element();
            var height_doc = $(window).height();
            var height_menu = $("#header_contenaire").height();
            var sectionname = $(this).attr("class");

            var position = $('.nav_section_' + sectionname).position();

            var p = $('.nav_section_' + sectionname);
            var offset = p.offset();

            $("html, body").delay(400).animate({scrollTop: offset.top - height_menu - 1}, 1200);



            var width_doc = $(document).width();
            if (width_doc < 900 || jQuery.browser.mobile) {
                if ($(this).parent().parent().is("ul")) {
                    $(this).parent().parent().animate({height: 'toggle'}, 200);
                    $(this).parent().parent().parent().parent().animate({height: 'toggle'}, 500);
                }
            }


            return false;

        } catch (err) {
            return false;
        }

    });


$('.extralinks').live('click',function(){

	navigatef(this);return false;
});

function navigatef(objetss){
        try {
            

        
            
            var selected_tab= $(objetss).attr("rel");
            var namepage_selected = $(objetss).attr('name');
            var val = 0;
            var active_index ;
            var index = $(objetss).parent().index() ;
            var active_id;
 
             
            $(".pager_wraper_content").each(function( index ) {
                if ($(objetss).hasClass("activated")){   active_index = val ; active_id = $(objetss).attr("id"); }
                val = val + 1 ;
            });
         
            $(".pager_wraper_content").removeClass("activated");
            $("#" + selected_tab + "").fadeIn(0);
            
            //$("#" + selected_tab + "").fadeTo(1, 0.7 );
            
            
            //alert(active_index + " " + index) ;
        /*    if(active_index<index){$("#" + selected_tab + "").css({ left: '' + (active_index*25) + '%'}); $("#" + active_id + "").animate({ left: '-' + (index*25) + '%' }, 800,  
            function() {}); }
            if(active_index>index){$("#" + selected_tab + "").css({ left: '-' + (active_index*25) + '%'}); $("#" + active_id + "").animate({ left: '' + (index*25) + '%' }, 800,  
            function() {}); }*/
            
             if ($(objetss).hasClass('footerlink') ) {
                    $('.pager_wraper_content').animate({ left: '-' +  (4 * 20) + '%' }, 800,  function() {});
            }else if ($(objetss).hasClass('extralinks') ) {
                    $('.pager_wraper_content').animate({ left: '-' +  (3 * 20) + '%' }, 800,  function() {});
			}else{        
            if (index == 0 ) {
                    $('.pager_wraper_content').animate({ left: '0' }, 800,  function() {});
         
            } else{
             
                $('.pager_wraper_content').animate({ left: '-' +  (index * 20) + '%' }, 800,  function() {});
            }}
        
         
         
         

              //$("#" + selected_tab + "").animate({ left: '-' + (index*25) + '%' }, 800, 'swing', function() { });
            
            //$("#" + selected_tab + "").delay(450).fadeTo(100,1 );
            $("#" + selected_tab + "").addClass("activated");
            
            
            
            
            var initialval = $('#' + selected_tab + '').html();            
            var width_doc = $(window).width();
            if (width_doc > 900 ||  initialval=='<span class="firstspan">1</span>' ){
                var position = $('#canvas_header').position();
                $("html, body").delay(1200).animate({ scrollTop: position.top + 1 }, 850); 
            } 
            
            
            
    
            get_html(selected_tab,namepage_selected);
            return false;
    
        } catch(err) {return false;}

}

$(".menu_container .menu .principal, .footerlink").on('click',function() {
	navigatef(this);

    });


  



    $(window).scroll(function() {



        var position = $('#allpage').position();
        if ($(this).scrollTop() >= (position.top)) {
            $('#section_header').css({'position': 'fixed'});
            $('#section_header').addClass("boxshadow");
        } else {
            $('#section_header').css({'position': 'relative'});
            $('#section_header').removeClass("boxshadow");
        }
    });


    try {
        //$(".menu_container .menu  .active .principal").trigger('click');
    } catch (err) {
        return false;
    }

});



function get_html(selected_tab,namepage_selected) {

    $.ajax({
        url: "http://www.truepilatesprague.com/wp-content/themes/pilate/" + selected_tab + ".php",
        type: "POST",
        dataType: "text",
		data : {"pageselect":namepage_selected},
        success: function(data) {

            $('#' + selected_tab + '').html(data);
            Start_element();





            var activedivheight = $('#' + selected_tab + '').height();
            $(".pager_wraper_all").css({'height': activedivheight + 'px'});

            try {
                $('.slider_ul').bxSlider({
                    controls: true,
                    mode: 'fade',
                    responsive: true,
                    auto: false,
                    pager: false,
                    captions: true
                });
            } catch (err) {
            }






            try {

                $('.full-width-slider').royalSlider({
                    arrowsNav: false,
                    loop: true,
                    keyboardNavEnabled: true,
                    controlsInside: false,
                    imageScaleMode: 'fill',
                    arrowsNavAutoHide: false,
                    autoScaleSlider: false,
                    autoHeight: false,
                    controlNavigation: 'bullets',
                    thumbsFitInViewport: false,
                    startSlideId: 0,
                    autoPlay: {
                        // autoplay options go gere
                        enabled: true,
                        pauseOnHover: false
                    },
                    transitionType: 'fade',
                    globalCaption: false
                });

            } catch (err) {
            }


        }
    });
}
;
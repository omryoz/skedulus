/* Author:

*/

	

    $('.tool').tooltip('hide')



$(document).ready(function(){
_page = window.location.pathname.split('/')[2];
       $('a[href="'+_page+'"]').parent().addClass('active');

});


            $('.endtime').timepicker({
			showInputs: false,						  
			showMeridian: false,
			   minuteStep: 15,
               disableFocus: true,
			    defaultTime:'19:45' 
			
			});
			$('.starttime').timepicker({
			showInputs: false,						  
			showMeridian: false,
			   minuteStep: 15,
               disableFocus: true,
			    defaultTime:'10:45' 
			
			});
			  $('.disabletime').timepicker({                                  
                               showMeridian: false,
                               minuteStep: 15,
                               showInputs: false,        
                               disableFocus: true,
                               template: false,
                               defaultTime:'11:45' 
                       });         
			
			 
     $('.date_pick').datepicker('hide')

		$('.offer_block').click('live',function(){
window.location.href='offer.php'; 
});
		

		
<!--Business profile click accordian scripts Start-->		
$(document).ready(function(){
	$('.accordion-heading').click('live',function(){
		$(this).toggleClass('accordian_back');
	});
});
<!--Business profile click accordian scripts end-->
<!--Mouse over image slider for compilation scripts Start-->

(function($) {
	$(function() { //on DOM ready
		$(".scroller").simplyScroll({
        	auto: false,
			speed: 7
		});
	});
})(jQuery);

<!--Mouse over image slider for compilation scripts end-->
<!-------------------------------------------->

// JavaScript Document
$(document).ready(function() {
		//Thumbnailer.config.shaderOpacity = 1;
$(".image_popup").click(function(){		
							   
		var tn1 = $('.mygallery').tn3({
						skinDir:"skins",
						imageClick:"fullscreen",
						image:{
						maxZoom:1.5,
						crop:true,
						clickEvent:"dblclick",
						transitions:[{
						type:"blinds"
						},{
						type:"grid"
						},{
						type:"grid",
						duration:460,
						easing:"easeInQuad",
						gridX:1,
						gridY:8,
						// flat, diagonal, circle, random
						sort:"random",
						sortReverse:false,
						diagonalStart:"bl",
						// fade, scale
						method:"scale",
						partDuration:360,
						partEasing:"easeOutSine",
						partDirection:"left"
						}]
						}
				});
			});
		});

<!--------------------------------------->


$(document).ready(function(){
	  <!-----functtion for my appointments start---->
	$('.switch').click('live',function(){
		$('.'+$(this).attr("id")+'').toggleClass('bordered_new');
		$(this).toggleClass("well-style");
	});
	<!-----functtion for my appointments end----->
<!-----functtion for business profile start---->
/*$('.accordion-heading').click('live',function(){
$('.icon-chevron-down').toggleClass('icon-chevron-up');

});*/
<!-----functtion for business profile start---->

$(".accordion-toggle").click(function(){
	if($(this).hasClass("collapsed")){
		$(this).children().find('i.icon-chevron-down').removeClass("icon-chevron-down").addClass("icon-chevron-up");
	}else{
		$(this).children().find('i.icon-chevron-up').removeClass("icon-chevron-up").addClass("icon-chevron-down");
	}
});
$('.star-rate').raty({ precision: true });
$('.star-rate').raty({

  half     : true,
  size     : 24,
  starHalf : 'img/star-half-big.png',
  starOff  : 'img/star-off-big.png',
  starOn   : 'img/star-on-big.png'
});
});
<!-----functtion for business profile end---->







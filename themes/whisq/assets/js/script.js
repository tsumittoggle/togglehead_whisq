(function($) {

$(document).ready(function(){

  //Banner slider window height javascript
  
   
if(window.innerWidth > 1300 ) {
	jQuery('#myCarousel').css('height','auto'); 
}

if(window.innerWidth < 1300 ) {
  //Banner slider window height javascript
   $('.item:first-child').addClass('active');	
   var header_height = $('header').height();
   var padding_space = 40;
   total = padding_space + header_height;
   var height = $(window).height();
   jQuery('#myCarousel').css('height',height - total+'px'); 
   console.log("LoL" + total);
}
$(window).on("load", function(){
	$('.test33').each(function() {
	label = $(this).find('label');
	labi = $(this).find('i');
	
	console.log(label);
	$(this).find('span').addClass('form-group');
$(this).find('span').find("input").attr("required","required");	
	$(this).find('span').append(label);
	$(this).find('span').append(labi);	
});
});
	 

    $('#carousel01').owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        980:{
            items:3
        }
    }
});

$('#carousel02').owlCarousel({
    loop: true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('#carousel03').owlCarousel({
    loop: true,
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

$('.product-remove').click(function(){
    setInterval(function(){ 
      location.reload(); 
    }, 1000);
});

  //adding class for add to card
  $('.product_type_simple').addClass('feature-btn');

  var $feture_height = $('.feature-item').height();
  //var $product_height = $('.woocommerce .products li').height();
  var f = $feture_height + 45;
  //var p = $product_height + 45;
  //$('.feature-item').css('height', f + 'px');
   //$('.woocommerce .products li').css('height', p + 'px');
   
   $('.accessoriesused').click(function(){

//	   $('.product-list').css('height','auto');
   });
   
   
   

  //setting height for carousal
  if(window.innerWidth < 768 ){
    jQuery('#myCarousel').css('height','auto');
  }

  $("a[href='#top']").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
  });

  $(window).scroll(function() {    
    var scroll = $(window).scrollTop();    
    if (scroll <= 400) {
        $("#backtop").removeClass("back-top").addClass("remove-top");
    }
    else {
      $("#backtop").addClass("back-top").removeClass("remove-top");
    }

    if (scroll > 10) {
      $("header").addClass("sticky");
    }
    else {
      $("header").removeClass("sticky");
    }
});
  
  //js for opening menu
  $('.hamburger').click(function(){
  if($('.menu-main').hasClass('menu-open')){
    $('.menu-main').removeClass('menu-open');
    $('.menu-main').addClass('menu-close');
    $('body').css('position','static');
  } else {
    $('.menu-main').removeClass('menu-close');
    $('.menu-main').addClass('menu-open'); 
    $('body').css('position','fixed');
  }
  
  //js for hamburger
  if($(this).hasClass('hamb-open')){
    $(this).removeClass('hamb-open');
    $(this).addClass('hamb-close');
  } else {
    $(this).removeClass('hamb-close');
    $(this).addClass('hamb-open'); 
  }

});
  
//js for opening user profile
$('.user-btn').click(function(){
    if($('.user-profile').hasClass('profile-open')){
    $('.user-profile').removeClass('profile-open');
    $('.user-profile').addClass('profile-close');
  } else {
    $('.user-profile').removeClass('profile-close');
    $('.user-profile').addClass('profile-open'); 
  }
});

//js for opening search 
$('.search-btn').click(function(){
    $('.sub-menu').removeClass('menu-open');
    if($('.yith-ajaxsearchform-container').hasClass('search-open')){
    $('.yith-ajaxsearchform-container').removeClass('search-open');
    $('.yith-ajaxsearchform-container').addClass('search-close');
        $('.fa-times').addClass('close-serach');
    $('.fa-search').removeClass('close-serach');
  } else {
    $('.yith-ajaxsearchform-container').removeClass('search-close');
    $('.yith-ajaxsearchform-container').addClass('search-open'); 
        $('.fa-times').removeClass('close-serach');
    $('.fa-search').addClass('close-serach');
  }
});

  //js for foodhall locate
  $(".addwrap").fadeOut();
  
  $(".locate-list").on("click", function(){
	  $(".lcate-store-img img").css("filter", "grayscale(100%)");
	  $(".locate-list").css("box-shadow", "none");
	  $(".locate-list").css("background-color", "rgba(223, 223, 223, 0.05)");
	  $(this).css("box-shadow", " 0 0 15px rgba(0, 0, 0, 0.12)");
	  $(this).css("background-color", "#ffffff");
	  $(this).find(".lcate-store-img img").css("filter", "grayscale(0%)");
	  var id = $(this).attr("id");
	  
	  if(id == 'all'){
		  $(".all").fadeIn();
		  $(".addwrap").fadeOut();
	  }
	  else{		  
		  $(".all").hide();
		  $(".addwrap").fadeOut();
		  $("."+id+'-address').fadeIn();
	  }
  });
  
  $( ".cities" ).change(function() {
	  
  var changecity = $('#cities :selected').val();
	if(changecity=="city"){
	$(".citywrap").hide();
	$(".citywrap").fadeIn();	
	}
	else {
   $(".citywrap").hide();
   $("."+changecity).fadeIn();
   }
});

  //product listing
  $('#product_cats li').click(function(){
    $value = $(this).text();
    document.cookie = "cat name="+$value;
    location.reload();
  });

  $('.product').click(function(){
    document.cookie = "cat name = all";
  });

  $('.sub-menu li').click(function(e){
    $value = $(this).text();
	  e.stopPropagation();
    document.cookie = "cat name="+$value; 
  });

  //product listing pagination
    $('#pagination li').click(function(){
    $offset_value = $(this).val();
    document.cookie = "whisq_offset ="+$offset_value;
    location.reload();
  });
  
 $('#pagination .next').click(function(){
   $offset_value = $('#pagination #active').val();
   $final = $offset_value + 10;
   document.cookie = "whisq_offset ="+$final;
   location.reload();
 });  

 $('#pagination .prev').click(function(){
   $offset_value = $('#pagination #active').val();
   if($offset_value > 0) {
   $final = $offset_value - 10;
   document.cookie = "whisq_offset ="+$final;
   location.reload();
   }
 });

//short by
$('.sort-cat li').click(function(){
    $value = $(this).attr("value");
    document.cookie = "short_cat="+$value;
    location.reload();
});

  //category
  $('.category li').click(function(){
    $value = $(this).text();
    document.cookie = "category name="+$value;
    location.reload();
  });


//zoom error creating problem for media query
$(document).keydown(function(event) {
if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
        event.preventDefault();
     }
    // 107 Num Key  +
    // 109 Num Key  -
    // 173 Min Key  hyphen/underscor Hey
    // 61 Plus key  +/= key
});

$(window).bind('mousewheel DOMMouseScroll', function (event) {
       if (event.ctrlKey == true) {
       event.preventDefault();
       }
});
 //zoom error closed
 
	$("#all").trigger("click");
	
	
	
	if(window.innerWidth <= 1024 ){
	
	$(".left-side-bar h4").click(function(){
        $(".sort-cat").hide(500);
        $("#product_cats").slideToggle(500);		
		$(".left-side-bar h4").toggleClass('caticorotate');
		
    });
	
	$(".short-by h4").click(function(){
		$("#product_cats").hide(500);
        $(".sort-cat").slideToggle(500);
		$(".left-side-bar h4").removeClass('caticorotate');
    });
	
	
	}
	
	
	if(window.innerWidth > 1024 ){
	$(".short-by h4").click(function(){
        $(".sort-cat").slideToggle();
		$(this).toggleClass('addinline');
    });
		}
		
	$(".youmaylike").click(function(){		
		$(".single-recipes .recipe").removeClass('recipelisthide');
        $(".single-recipes .related-accesories").addClass('recipelisthide');
    });
	
	$(".accessoriesused").click(function(){
        $(".single-recipes .related-accesories").removeClass('recipelisthide');
		$(".single-recipes .recipe").addClass('recipelisthide');
    });
		
		
	if(window.innerWidth < 1025 ){
	$(".recipe-sidebar .category ul").hide();
	$(".recipe-sidebar .category h3").click(function(){
        $(".recipe-sidebar .category ul").slideToggle();
		$(".recipe-sidebar .category h3").toggleClass('caticorotate');
		$(this).toggleClass('addinline');
    });
	
	}		
	
			if(window.innerWidth > 1024 ){
   var maxHeight = -1;

   $('.recipes-page-list p').each(function() {
     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });

   $('.recipes-page-list p:nth-child(3)').each(function() {
     $(this).height(maxHeight);	 
   });
   
		}
		
		
					if(window.innerWidth > 768 ){
   var maxHeight = -1;

   $('.feature-recipes-list p').each(function() {
     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });

   $('.feature-recipes-list p:nth-child(3)').each(function() {
     $(this).height(maxHeight);
   });
		}
		
if(window.innerWidth > 768 ){
   var maxHeight = -1;

   $('.event-excerpt p').each(function() {
     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });

   $('.event-excerpt p:first-child').each(function() {
     $(this).height(maxHeight);
   });
		}		

		if(window.innerWidth > 768 ){
   var maxHeight = -1;

   $('.thumbContent address').each(function() {
     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });

   $('.thumbContent address').each(function() {
     $(this).height(maxHeight);
   });
		}
		
	$(".select-extra li").click(function () {
    $(".select-extra li").removeClass("active");
    $(this).addClass("active");   
});

if(window.innerWidth > 768 ){
   var maxHeight = -1;

   $('.thumbContent h3').each(function() {
     maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
   });

   $('.thumbContent h3').each(function() {
     $(this).height(maxHeight);
   });
		}
		
	$(".select-extra h3").click(function () {
    $(".select-extra h3").removeClass("active");
    $(this).addClass("active");   
});

 //share icon
$('.share-icon').css('display','none');
$('.shareact').click(function(){	 
	 $(this).next().toggle('slow');
   // $(this).children('.share-icon').toggle('slow');

 });   
 
 //event page scripts
 $('.atcb-link').addClass('btn');
 

 $('.event-cat li').click(function(){
    $value = $(this).attr("value");
    document.cookie = "event_cat="+$value;
    location.reload();
});  

 
 $(".eventsort-by h4").click(function(){
        $(".event-cat").slideToggle();
		$(this).toggleClass('addinline');
    });
	

/*$('.contact-form input').click(function(){
	
$tel = $('.contact-form .wpcf7-validates-as-tel').val();
if($tel == '') {
$('.contact-form .control-label').css({'top':'4px','color':'gray'});
}

$tel = $('.contact-form .wpcf7-validates-as-email').val();
if($mail == '') {
$('.contact-form .control-label').css({'top':'4px','color':'gray'});
}

$(this).parent('.wpcf7-form-control-wrap').next().next().css({'top':'-16px','color':'#333'});

});	*/

});


$(document).ready(function(){
    $(".question").on("click", function(){
      $(this).parent().hasClass("active")
      if($(this).parent().hasClass("active")){
        $(".qa-body").removeClass("active");
        $(this).parent().removeClass("active");
      }
      else{
        $(".qa-body").removeClass("active");
        $(this).parent().addClass("active");
      }
    });


    $(".cross").on("click", function(){
      $(".woocommerce-MyAccount-navigation").toggleClass('open-menu');
    });

    $(window).on("scroll", function(){
      var windowscroll = $(window).scrollTop();
      if(windowscroll > 10){
        $(".woocommerce-MyAccount-navigation").addClass('position-adjust');
      }
      else{
        $(".woocommerce-MyAccount-navigation").removeClass('position-adjust');
      }
    });

$("#reg").validate({
                ignore: ".ignore",

                rules: {
                    hiddenRecaptcha: {
                         required: function() {
                             if (grecaptcha.getResponse() == '') {
                                 return true;
                             } else {
                                 return false;
                             }
                         }
                     }

                    
                },
                messages: {

                    hiddenRecaptcha : {
                        required: "Please select Captch",
                    }       
                },      
                submitHandler: function(form) {     
                    form.submit();      
                }       
            }); 
  });



})(jQuery);



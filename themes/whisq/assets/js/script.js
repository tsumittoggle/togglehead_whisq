(function($) {

$(document).ready(function(){

  //Banner slider window height javascript
   $('.item:first-child').addClass('active');	
   var header_height = $('header').height();
   var padding_space = 0;
   total = padding_space + header_height;
   var height = $(window).height();
   jQuery('#myCarousel').css('height',height - total+'px'); 
   console.log("LoL" + total);

  //Banner slider auto height javascript
  if(window.innerWidth < 1120 ){
    jQuery('#myCarousel').css('height','auto');
  }
 
  //owl carousal for feature javascript
   $('.owl-carousel').owlCarousel({
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

  //adding class for add to card
  $('.product_type_simple').addClass('feature-btn');

  var $feture_height = $('.feature-item').height();
  var f = $feture_height + 45;
  $('.feature-item').css('height', f + 'px');

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

  $()

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

//js for mega menu if has child class to menu
$('.menu-item-has-children').click(function(){

  if($(this).find('.sub-menu').hasClass('menu-open')){
    $('.menu-item-has-children').find('.sub-menu').removeClass('menu-open').addClass('menu-close');
    $(this).find('.sub-menu').addClass('menu-close');
  } 
  else{
    $('.menu-item-has-children').find('.sub-menu').removeClass('menu-open').addClass('menu-close');
     $(this).find('.sub-menu').addClass('menu-open');
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
	  $(".locate-list").css("box-shadow", "none");
	  $(this).css("box-shadow", "0px 0px 5px 2px rgba(0, 0, 0, 0.16)");
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

});

$(document).ready(function(){
   $("#myCarousel").swiperight(function() {
         $(this).carousel('prev');
     });
     $("#myCarousel").swipeleft(function() {
         $(this).carousel('next');
     });
});
})(jQuery);

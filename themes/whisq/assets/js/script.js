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
})

  //adding class for add to card
  $('.product_type_simple').addClass('feature-btn');

  //setting height for carousal
  if(window.innerWidth < 768 ){
    jQuery('#myCarousel').css('height','auto');
  }

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
    if($('.sub-menu').hasClass('menu-open')){
    $(this).children('.sub-menu').removeClass('menu-open');
    $(this).children('.sub-menu').addClass('menu-close');
  } else {
    $(this).children('.sub-menu').removeClass('menu-close');
    $(this).children('.sub-menu').addClass('menu-open'); 
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
    if($('.yith-ajaxsearchform-container').hasClass('search-open')){
    $('.yith-ajaxsearchform-container').removeClass('search-open');
    $('.yith-ajaxsearchform-container').addClass('search-close');
  } else {
    $('.yith-ajaxsearchform-container').removeClass('search-close');
    $('.yith-ajaxsearchform-container').addClass('search-open'); 
  }
});

});
})(jQuery);


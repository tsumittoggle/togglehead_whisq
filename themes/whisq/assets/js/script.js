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


  //adding class for add to card
  $('.product_type_simple').addClass('feature-btn');

  var $feture_height = $('.feature-item').height();
  var $product_height = $('.woocommerce .products li').height();
  var f = $feture_height + 45;
  var p = $product_height + 45;
  $('.feature-item').css('height', f + 'px');
   $('.woocommerce .products li').css('height', p + 'px');
   
   $('.accessoriesused').click(function(){

	   $('.product-list').css('height','auto');
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


var $prod_height = $('.product-list').height();
  var fp = $prod_height + 65;
  $('.product-list').css('height', fp + 'px');

 	
	$("#all").trigger("click");
	
		
	
	if($('.spatulas').hasClass('spatulas'+'-active')){
	$('.spatulas').addClass('catactive');
	}
	
	else if($('.all-product').hasClass('all'+'-active')){
	$('.all-product').addClass('catactive');
	}
	
	else if($('.pans').hasClass('pans'+'-active')){
	$('.pans').addClass('catactive');
	}
	
	else if($('.bakeryaccessories').hasClass('bakeryaccessories'+'-active')){
	$('.bakeryaccessories').addClass('catactive');
	}
	
	if(window.innerWidth <= 768 ){
	
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
	
	
	if(window.innerWidth > 768 ){
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
		

 //share icon
  $('.share-icon').css('display','none');
 $('.share-rec').click(function(){

    $(this).children('.share-icon').toggle();
 });   

});


})(jQuery);




var lastId,
    topMenu = $(".navbar"),
    topMenuHeight = topMenu.outerHeight()+0,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind click handler to menu items
// so we can get a fancy scroll animation
menuItems.click(function(e){
  var href = $(this).attr("href"),
      offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
  $('html, body').stop().animate({ 
      scrollTop: offsetTop
  }, 2000);
  e.preventDefault();
});

// Bind to scroll
$(window).scroll(function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+topMenuHeight;
   
   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   
   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
       menuItems
         .parent().removeClass("active")
         .end().filter("[href=#"+id+"]").parent().addClass("active");
   }                   
});



// main-slide
 $(document).ready(function() {
      $("#owl-slide").owlCarousel({
		navigation : false,
		pagination:false,
		singleItem : true,
		transitionStyle:"fadeUp",
		autoPlay:true		
	  });

  
});


// tab-slide
 $(document).ready(function() {
      $("#owl-slide2").owlCarousel({
		navigation : true,
		pagination:false,
		singleItem : true,
		transitionStyle:"goDown",
		autoPlay:true,
		navigationText:false		
	  });

  
});

// testimonial-slide
 $(document).ready(function() {
      $("#owl-slide3").owlCarousel({
		navigation : true,
		pagination:true,
		singleItem : true,
		transitionStyle:"backSlide",
		autoPlay:false,
		navigationText:false		
	  });

  
});


$(function() {
    // setup ul.tabs to work as tabs for each div directly under div.panes
    $("ul.tabs").tabs("div.panes > div");
});

//gallery hover
$('.img-th').hover(function() {
	$(this).children(".hover").stop(true, false).fadeToggle(); 
});

/*---------- anish ----*/

	$(function(){
		
		$(".gallery").owlCarousel({
			items:1,
			itemsDesktop:[1199,1],
			itemsDesktopSmall:[979,1],
			itemsTablet:[768,1],
			autoPlay:true,
			navigation:true,
			pagination:false
		});
		
		$(".img-th").fancybox();
		
		
		$('a.scroll-top').click(function(){
			$("html, body").animate({ scrollTop: 0 }, 2000);
			return false;
		});

	
	});
	$(window).scroll(function(){
		if ($(this).scrollTop() > 800) {
			$('a.scroll-top').fadeIn();
		} else {
			$('a.scroll-top').fadeOut();
		}
	});
		// scroll-to-top animate
		




	$(function(){
		
		// set sidebar height
		
		function sideBarHeight(){
			var winwidth = $(window).width();
			if(winwidth > 750)
			{	
				var docHeight = $(document).height();
				$(".flock-sidebar").css('min-height',docHeight + 150);
				$(".commen-base").css('min-height',docHeight + 150);
			}else
			{
				$(".flock-sidebar").css('min-height','0');
				$(".commen-base").css('min-height','0');
			}
			
		}
		sideBarHeight();
		
		$(window).resize(function(){
			sideBarHeight();
		});
		
		$(".chart-outer").matchHeight();
		
		jQuery.fn.exists = function(){return this.length>0;}
		
		// Dashboard pie chart
		function dashboardChart(){
			if($('.opend-chart').exists())
			{
				new Chartist.Pie('.opend-chart', {
				  series: [70, 30]
					}, {
					  donut: true,
					  donutWidth: 15,
					  startAngle: 0,
					  total: 100,
					  showLabel: false
				});
			}
			
			if($('.opend-chart').exists())
			{
				new Chartist.Pie('.unopend-chart', {
				  series: [40, 70]
					}, {
					  donut: true,
					  donutWidth: 15,
					  startAngle: 0,
					  total: 100,
					  showLabel: false
				});
			}
			if($('.bounced-chart').exists())
			{
				new Chartist.Pie('.bounced-chart', {
				  series: [85, 15]
					}, {
					  donut: true,
					  donutWidth: 15,
					  startAngle: 0,
					  total: 100,
					  showLabel: false
				});
			}
		}
		
		dashboardChart();
		
		// sidebar toggle 
		
			
		$(".menu-close").click(function(){
			/*var cusWidth = $(window).width();
			if(cusWidth > 750)
			{
				$(this).toggleClass("active");
				$(".commen-base").toggleClass("sidebar-toggle");
				$(".temp-cm-block").matchHeight();
			}else
			{
				$(this).removeClass("active");
				$(".commen-base").removeClass("sidebar-toggle");
			}*/
			
			if($(".commen-base").hasClass("sidebar-toggle"))
			{
				$(".commen-base").removeClass("sidebar-toggle");
				$(this).removeClass("active");
				$(".second-sidebar .sidebar-nav > ul > li > a.open").parent().find(">ul").show(); 
			}else
			{
				
				$(".commen-base").addClass("sidebar-toggle");
				$(this).addClass("active");
				$(".temp-cm-block").matchHeight();
			}
		});
		
		function resetSidebar(){
			var cusSet = $(window).width();
			if(cusSet < 750)
			{
				$(".menu-close").removeClass("active");
				$(".commen-base").removeClass("sidebar-toggle");
			}
		}
		
		resetSidebar();
		
		$(window).resize(function(){
			resetSidebar();
		});
				
		// template accordian
		
		
		
		$(".temp-cm-block").matchHeight();
		
		$(".code-block").matchHeight();
		
		if($('.cm-select').exists())
		{
			$(".cm-select").selecter();
		}
		
		if($(".cm-checkbox").exists())
		{
			$(".cm-checkbox").uniform();
		}
		
		$(".cc-height").matchHeight();
		
		if($(".commen-radio-1").exists())
		{
			$(".commen-radio-1").uniform();
		}
		if($(".commen-radio").exists())
		{
			$(".commen-radio").uniform();
		}
		if($(".sl-select").exists())
		{
			$(".sl-select").selecter();
		}
		
		if($(".cs-tooltip").exists())
		{
			$('.cs-tooltip').smallipop();
		}
		
		if($(".ffs-scroll").exists())
		{
			 $(".ffs-scroll").mCustomScrollbar();
		}
		
		if($(".fancy-view").exists())
		{
			 $(".fancy-view").fancybox();
		}
		
		$(".st-height").matchHeight();
		
		
		
		// grap showing 
		
		function CustomGraph(){
			  new Chartist.Bar('.chart-ghs', {
				  labels: ['Jan', 'Feb', 'Mar', 'Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'],
				  series: 
				  [
					[1,2,4,3,5]
				  ],
			  
			}, {
			  seriesBarDistance: 10,
			  axisX: {
				offset: 25
			  },
			  axisY: {
				offset: 40,
				labelInterpolationFnc: function(value) {
				  return value 
				},
				scaleMinSpace: 50,
			  },
			});
		}
			
		if($(".graph-base").exists())
		{
			CustomGraph();
		}
		
		if($(".cm-upload").exists())
		{
			 $(".cm-upload").uniform({
				 fileButtonHtml:'Import'
			 });
		}
		
		
		$(".file-mgr").click(function(){
			$(".file-manager-popup").fadeIn(150);
		});
		
		$(".popup-close").click(function(){
			$(this).parent()
			.parent().fadeOut(150);
		});
		
		if($(".file-upload").exists())
		{
			$(".file-upload").uniform({
				 fileButtonHtml:'Upload'
			});
		}
		
		if($(".commen-tab").exists())
		{
			 $(".commen-tab").easyResponsiveTabs({
				type: 'default',        
				width: 'auto', 
				fit: true,   
				closed: false, 
				activate: function() {
					CustomGraph();
					dashboardChart();
				},  
				tabidentify: 'tab_identifier_child',
				activetab_bg: '#B5AC5F', 
				inactive_bg: '#E0D78C', 
				active_border_color: '#9C905C', 
				active_content_border_color: '#9C905C'
			});
		}
		
		
		function menuSpacing(){
			
			var OuterWidth = $(".tab-margin > ul").width();
			
			var totalWidth = 0;
			$(".tab-margin > ul >li > a").each(function(){
				 totalWidth = totalWidth + $(this).width();
			});
			
			var totalLi = $(".tab-margin > ul >li").size();
			var ramiangSpace = OuterWidth - totalWidth;
			var paddingSpace =  ramiangSpace/totalLi;
			var actualPadding = paddingSpace/2;
			
			$(".tab-margin > ul > li > a").css('paddingLeft',actualPadding - 2);
			$(".tab-margin > ul > li > a").css('paddingRight',actualPadding - 2);
		}
		
		//menuSpacing();
				
		$(window).resize(function(){
			menuSpacing();
		});
		
		$(window).load(function(){
			menuSpacing();
		});
		
		/*---- 2015/05/22 -----*/
		
		/*$(".second-sidebar .sidebar-nav > ul > li").hover(function(){
			$(this).addClass("menu-active");
			}, function(){
			$(this).removeClass("menu-active");
		});*/
		
		//$(".sidebar-nav > ul > li > a").append('<div class="clearfix"></div>');
		
		 
		/*$(".sidebar-nav > ul").hover(function(){
			if($(".commen-base").hasClass("sidebar-toggle"))
			{
				$(".commen-base").removeClass("sidebar-toggle");
				$(".menu-close").removeClass("active");
			}
		});*/
		
		// detect dropdown menu
		
		$(".sidebar-nav > ul > li").find(">ul").parent().addClass("drp");
		
		function dropDownMenu(){
			var allAccordions = $('.sidebar-nav > ul > li > ul');
			var allAccordionItems = $('.sidebar-nav > ul > li > a');
			$(allAccordionItems).click(function() {
				if($(".commen-base").hasClass("sidebar-toggle"))
				{
					
					
				}else
				{
					if($(this).hasClass('open'))
					{
						$(this).removeClass('open');
						$(this).parent().removeClass('active');
						$(this).next().slideUp(150);
					}
					else
					{
						allAccordions.slideUp(150);
						allAccordionItems.removeClass('open');
						allAccordionItems.parent().removeClass('active');
						$(this).addClass('open');
						$(this).parent().addClass('active');
						$(this).next().slideDown(150);
						return false;
					}
				}
			});
			
			$(".second-sidebar .sidebar-nav > ul > li").hover(function(){
				if($(".commen-base").hasClass("sidebar-toggle"))
				{
					$(".second-sidebar .sidebar-nav > ul > li > ul").hide();
					$(this).addClass("hover");
					$(this).find(" > ul").show();
				}
				}, function(){
					
				if($(".commen-base").hasClass("sidebar-toggle")){
					$(this).removeClass("hover");
					$(this).find(" > ul").hide();
				}
				
			});
		}
		
		dropDownMenu();
		
		
		function menuMobile(){
			
			var menuHtml = $(".sidebar-nav").html();
			$(".mobile-menu-base").html(menuHtml);
			
			$(".menu-toggle").click(function(){
				$(".mobile-menu-base").stop(true, false).slideToggle(250);
			});
			
			/*---- menu working as accordian----*/
			
			var allAccordions = $('.mobile-menu-base > ul > li > ul');
			var allAccordionItems = $('.mobile-menu-base > ul > li.drp > a');
			
			
			
			$(allAccordionItems).click(function() {
				if($(this).hasClass('active'))
				{
					$(this).removeClass('active');
					$(this).next().slideUp(250);
				}
				else
				{
					allAccordions.slideUp(250);
					allAccordionItems.removeClass('active');
					$(this).addClass('active');
					$(this).next().slideDown(250);
					return false;
				}
			});
			
			
			
		}
		
		menuMobile();
		
		$(".tbr-height").matchHeight();
		
		
	});
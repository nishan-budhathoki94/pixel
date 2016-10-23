'use strict';

$ = jQuery;

$(document).ready(function(){
	var scrollWidth = 0,
			parent, 
      child;

	if (scrollWidth === 0) {
	  parent      = $('<div style="width: 50px; height: 50px; overflow: auto"><div/></div>').appendTo('body');
	  child       = parent.children();
	  scrollWidth = child.innerWidth() - child.height(99).innerWidth();
	  parent.remove();
	}

	$('.jLoad').each(function(){
		$(this).removeClass('jLoad');
	});

	$('.header-social-toogle').on('click', function(){
		$('.header-social-wrap').addClass('open');
	});
	$('.header-social-close').on('click', function(){
		$('.header-social-wrap').removeClass('open');
	});

	$('.header-search-form-toogle').on('click', function(){
		$('.header-search-wrap').addClass('open');
    $('.header-search-wrap').find('input[type=search]').focus();
    closeSoc();
	});
	$('.header-search-close').on('click', function(){
		$('.header-search-wrap').removeClass('open');
	});

	$('.panel-nav-button').on('click', function(){
		$('.main-panel').toggleClass('open');
	});

	$('.trending-carousel').lightSlider({
		item: 1,
		auto: true,
		loop: true,
		pause: 10000,
		pager: false,
		adaptiveHeight: true
	});

	$('.trending-line').endlessRiver({
    speed: 50,
    pause: true,
    buttons: false
  });

  /*-------------------------------------------------------*/
  /*------ Function determines which menu items hide ------*/
  /*-------------------------------------------------------*/

  function moreMenuItem() {
  	var menuWrap = $('.header-menu-wrap'),
  			menuChild = 0;

  	menuWrap.children().each(function(){
  		if($(this).is('.header-menu') != true) {
  			menuChild = menuChild + $(this).outerWidth(true);
  		}
  	});

    var totalWidth = 0,
        menuWidth  = menuWrap.width() - menuChild - 100;

    $('.header-menu ul.primary-menu > li:not(.more-menu)').each( function () {
      totalWidth = totalWidth + $(this).outerWidth(true);
      if (menuWidth < totalWidth) {
        if($('.more-menu').length === 0){
          $('<li class="more-menu"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="21.986px" height="6.073px" viewBox="0 0 21.986 6.073" enable-background="new 0 0 21.986 6.073" xml:space="preserve" class="svg replaced-svg"><circle fill="#FFFFFF" cx="2.903" cy="3.114" r="2.529"></circle><circle fill="#FFFFFF" cx="11.011" cy="3.114" r="2.529"></circle><circle fill="#FFFFFF" cx="18.982" cy="3.114" r="2.529"></circle></svg></a><ul class="sub-menu"></ul></li>').appendTo('.header-menu ul.primary-menu');
        } else if($('.more-menu').hasClass('hide')) {
          $('.more-menu').removeClass('hide');
        }
        $(this).addClass('more-li');
        $(this).appendTo('.more-menu > ul.sub-menu');
      }
    });
  }


  /*--------------------------------------------------------*/
  /*------------ Function that returns all "li" ------------*/
  /*-------------  in overall container menu  --------------*/
  /*--------------------------------------------------------*/

  function clearMenuRes(){
    if($('li.more-menu > ul.sub-menu > li.more-li').length === 0) {
      $('li.more-menu').addClass('hide');
    }
    setTimeout(function(){
      if($('li.more-menu > ul.sub-menu > li.more-li').length === 0) {
        $('li.more-menu').addClass('hide');
      }
    }, 200);

    $('.header-menu ul.primary-menu > li.more-menu > ul.sub-menu > li.more-li').each( function () {
      $(this).removeClass('more-li').appendTo('.header-menu ul.primary-menu');
    });
    $('.header-menu ul.primary-menu > li.more-menu').appendTo('.header-menu ul.primary-menu');
  }

  /*--------------------------------------------------------*/
  /*----------------- Resize Function Menu -----------------*/
  /*--------------------------------------------------------*/

  var moreMenu = function (){
    if ($('body').width() + scrollWidth <= 991) {
      clearMenuRes();
    }
    else if ($('body').width() + scrollWidth >= 992) {
      clearMenuRes();
      moreMenuItem();
    }
  }	
  
  moreMenu();

  $(window).resize(function(){
    moreMenu();
  });

  // Hide Sub Menu
  $(document).on("mouseenter.menu", ".header-menu .primary-menu li, .header-social-name", function(e){
    if ($('body').width() + scrollWidth > 992) {
      var $this = $(this);
      $this.addClass('active').children('.sub-menu').stop().fadeIn(200).addClass('sub-hover');
      // Sub menu position
      if($this.offset().left > $(window).width()/2 ){
        if($this.children('.sub-menu').hasClass('left-position') === false){
          $this.children('.sub-menu').addClass('left-position');
        }
      }
    }
  });

  // Hide Sub Menu
  $(document).on("mouseleave.menu", ".header-menu .primary-menu li, .header-social-name", function(e){
    if ($('body').width() + scrollWidth > 992) {
      var $this = $(this);
      $this.removeClass('active').children('.sub-menu').stop().fadeOut(200).removeClass('sub-hover').queue(function(){
          $this.children('.sub-menu').removeClass('left-position').dequeue();
      });
    }
  });

  var display = true,
      hsn = $('.header-social-name');
  $(document).on("click.ff", ".header-social-name", function(e){
    if ($('body').width() + scrollWidth <= 991) {
      if (display === true) {
        hsn.addClass('active');
        hsn.children('.sub-menu').fadeIn(200);
        display = false;
        hsn.focus()
      } else if (display === false) {
        hsn.removeClass('active');
        hsn.children('.sub-menu').fadeOut(200);
        display = true;
      }
    }
  });

  var closeSoc = function(){
    if(display === false){
      hsn.removeClass('active');
      hsn.children('.sub-menu').fadeOut(200);
      display = true;
    }
  };
  $(window).resize(function(){
    closeSoc();
  });

  $(document).on("click.headerSearch", ".header-search-wrap button", function(e){
  	var $search = $('.header-search-wrap');
  	if($search.find('input[type=search]').val() == ''){
  		e.preventDefault();
  		$search.find('input[type=search]').focus();
  	}
  });

  $(document).on("click.menuOpen", ".panel-nav-button-wrap .panel-nav-button", function(e){
  	$('.header-menu-wrap').toggleClass('open');
    closeSoc();
  });

  $(document).on("click.subMenuOpen", ".menu-item-children", function(e){
  	$(this).children('.sub-menu').toggle('show');
    closeSoc();
  });

  /* Converting img to svg
   -------------------------------------------------------------*/
  $('img.svg').each(function(){
    var $img = $(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    $.get(imgURL, function(data) {
      var $svg = $(data).find('svg');
      if(typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      if(typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass+' replaced-svg');
      }
      $svg = $svg.removeAttr('xmlns:a');
      $img.replaceWith($svg);

    }, 'xml');
  });

});



































jQuery(document).ready(function($) {
    toggleProjet();
    detailProjet();
    listeProjet();
    scrollTop();
    scrollTo();
    menuMobile();
    slick();
    arrowScroll();
    arrowScrollProject();


    if (jQuery('.single-projet').length) {
      openProjectDetail();
    }
    // Home
    if(jQuery('.home').length){
      // Enable logo resize
      resizeLogoOnScroll();

      // Enable newsletter signup
      newsletterSignup();
    }

    
});

jQuery(window).on('popstate', function() {

  if (jQuery('.single-projet').length || jQuery('.post-type-archive-projet').length) {
    if(window.location.pathname == '/projet/'){
      jQuery('.projet-push, .projet-visuels').removeClass('none').removeClass('open');
      jQuery('#projets .lien-liste').removeClass('none');
      jQuery('.grid.tools').show();
      jQuery('.projet-visuels').removeClass('stop-overflow');
      jQuery('html, body').removeClass('stop-overflow');
    }else{
      openProjectDetail();
    }
  }

});

var openProjectDetail = function(){
  jQuery('.projet-push').addClass('none');
  jQuery('a[href*="'+window.location.pathname+'"]').next().addClass('open');
  jQuery('#projets .lien-liste').addClass('none');
  jQuery('.grid.tools').hide();
  jQuery('html, body').scrollTop(0);
};

var arrowScroll = function(){
  if(jQuery(window).width() > 1024){
    jQuery(".arrow-down").click(function(event){
      jQuery('html, body').animate({scrollTop: '+='+window.screen.height}, 800);
    });
  }
};

var arrowScrollProject = function(){
  if(jQuery(window).width() > 1024){
    jQuery(".arrow-down-project").click(function(event){
      var pos = getCurrentImage();
      var images = jQuery('.open .images-projet img');
      if (images.length - 1 > pos) {
        pos++;
      }
      scrollToImage(images[pos]);
    });
  }
};

var getCurrentImage = function() {
  var images = jQuery('.open .images-projet img');
  var centreEcran = window.innerHeight / 2 + jQuery(window).scrollTop();
  var currentImage = 0;
  var minDist;
  images.each(function(i, image) {
    var $image = jQuery(image);
    var centreImage = $image.offset().top + ($image.height() / 2);
    var distance = Math.abs(centreEcran - centreImage);
    if (!minDist || minDist > distance) {
      minDist = distance;
      currentImage = i;
    }
  });
  return currentImage;
}

var scrollToImage = function(image) {
  var image = jQuery(image);
  var demiEcran = window.innerHeight / 2;
  var centreImage = image.offset().top + (image.height() / 2);
  var scrollTop = centreImage - demiEcran;
  jQuery('html, body').animate({
    scrollTop: scrollTop
  }, 800);
}

var resizeLogoOnScroll = function(){

  jQuery(window).on('scroll', function(e){

    if(jQuery(window).width() > 1024){

        var scrollTop = jQuery(window).scrollTop();
        var percent, percentWidth, percentPadding = 0;

        if (scrollTop <= 200) {
          percent = (jQuery(window).scrollTop() / 200);
          percentWidth = 488 - ((371 * percent)  );
          percentPadding = 254 - ((223 * percent) );

          jQuery('header .logo').css({
            'width': percentWidth+'px',
            'padding-bottom':percentPadding+'px'
          });
        }else{
            jQuery('header .logo').css({
                'width': '117px',
                'padding-bottom':'31px'
              });
        }
    }
 });
};

var newsletterSignup = function(){

  // Listen form submit
  jQuery('form').on('submit', function(e){
    e.preventDefault();

    // Send ajax request to wordpress
    jQuery.ajax({
      method: 'post',
      url: jQuery(this).attr('action'),
      data: jQuery(this).serialize()
    })
    .done(function( msg ) {

      // Display confirmation message
      if(msg){
        if(jQuery('html').attr('lang') == 'fr-FR'){
          jQuery('form input[name="email"]').val("Merci pour votre inscription");
        }else{
          jQuery('form input[name="email"]').val("Thank your for your subscription");
        }
        jQuery('form input[type="submit"]').css('visibility', 'hidden');
      }
    });

    return false;
  }); 
  
};


var menuMobile = function() {
    jQuery('.menu-mobile').on('click', function() {
        jQuery('body').toggleClass('menu-open');
    });
};


var toggleProjet = function() {
    // Open projet
    jQuery('#projets .projet-push').on('click', function(e) {
        e.preventDefault();
        jQuery('.projet-push').addClass('none');
        jQuery(this).next().addClass('open');
        jQuery('#projets .lien-liste').addClass('none');
        jQuery('.grid.tools').hide();
        jQuery('html, body').scrollTop(0);
        history.pushState(null, null, jQuery(this).attr('href'));

        return false;
    });

    // Close projet
    jQuery('#projets .closeprojet').on('click', function(e) {
        e.preventDefault();
        jQuery('.projet-push, .projet-visuels').removeClass('none').removeClass('open');
        jQuery('#projets .lien-liste').removeClass('none');
        jQuery('.grid.tools').show();
        jQuery('.projet-visuels').removeClass('stop-overflow');
        jQuery('html, body').removeClass('stop-overflow');
        history.pushState(null, null, jQuery(this).attr('href'));

        return false;
    });
};

var detailProjet = function() {
    // Open detail
    jQuery('#projets .lien-detail').on('click', function() {
        jQuery(this).parent().find('.projet-details').addClass('open');
        jQuery('.projet-visuels').addClass('stop-overflow');
        jQuery('html, body').addClass('stop-overflow');
        jQuery('#scrolldown').removeClass('arrow-down');

    });

    // Close detail
    jQuery('#projets .closedetail').on('click', function() {
        jQuery(this).parent().removeClass('open');
        jQuery('.projet-visuels').removeClass('stop-overflow');
        jQuery('html, body').removeClass('stop-overflow');
        jQuery('#scrolldown').addClass('arrow-down');

    });
    jQuery('.projet-visuels img').on('click', function(){
        jQuery('.projet-visuels.open .projet-details').removeClass('open');
        jQuery('.projet-visuels').removeClass('stop-overflow');
        jQuery('html, body').removeClass('stop-overflow');
    });
};

var listeProjet = function() {

    // Open liste
    jQuery('.lien-liste').on('click', function() {
        jQuery(this).hide();
        jQuery("#projets").hide();
        jQuery('.projet-liste').show();
        jQuery('.up').hide();
        jQuery('html, body').scrollTop(0);
    });

    // Close liste
    jQuery('.projet-liste .closedetail').on('click', function(){
        jQuery('.lien-liste').show();
        jQuery("#projets").show();
        jQuery('.projet-liste').hide();
        jQuery('.up').show();
    });
};

var scrollTop = function() {
    jQuery('a[href^="#scroll"]').click(function() {
        var the_id = jQuery(this).attr("href");

        jQuery('html, body, .projet-visuels').animate({
            scrollTop: jQuery(the_id).offset().top
        }, 'slow');
        return false;
    });
};

var scrollTo = function() {
    jQuery('#redirection').click(function() {
         jQuery('body').removeClass('menu-open');
        jQuery('html,body').animate({ scrollTop: jQuery("#scrollto").offset().top }, 'slow');
    });
};

var slick = function() {
    jQuery('.home .container').slick({
        draggable:false,
        swipeToSlide: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        infinite: true,
        autoplay: false,
        arrows: true,
        prevArrow: '<div class="slick-prev"></div>',
        nextArrow: '<div class="slick-next"></div>',

        responsive: [
          {
            breakpoint: 1024,
            settings: {
              arrows: false,
            }
          }
        ]

    });
};

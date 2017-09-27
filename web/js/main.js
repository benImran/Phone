$(document).ready(function() {
    toggleInscriptionConnexion();
});

var toggleInscriptionConnexion = function() {

    // $('.connect .title h2').on('click', function() {
    //   $(this).toggleClass('active');
    //   var titleAttr = $(this).attr('data-content');
    //   var contentAttr = $('.content[data-content'+ titleAttr +']').toggleClass('active');
    //   console.log(titleAttr);
    //   console.log(contentAttr);

    //   if (jQuery('.connect .title h2').hasClass('active') && jQuery('.connect .content').hasClass('active')) {
    //     jQuery('.connect .title h2').removeClass('active');
    //     jQuery('.connect .content').removeClass('active');
    //     jQuery(this).toggleClass('active');
    //   }
    // });
    var titleAttr = $('.connect .title h2').attr('data-content');
    console.log(titleAttr);
    var contentAttr = $('.content[data-content='+ titleAttr +']');
    console.log(contentAttr);


    $('.connect').on('click', function() {
      console.log(titleAttr);
    });
};
$(document).ready(function() {
    toggleInscriptionConnexion();
});

var toggleInscriptionConnexion = function() {
  $('.connect .title h2').on('click', function() {
    var titleAttr = $(this).attr('data-content');
    var contentAttr = $('.content[data-content="' + titleAttr + '"]').addClass('active');
    if (jQuery('.connect .title h2').hasClass('active') || jQuery('.connect .content').hasClass('active')) {
      jQuery('.connect .title h2').toggleClass('active', false);
      jQuery('.connect .content').toggleClass('active', false);
      $(this).toggleClass('active', true);
      contentAttr.toggleClass('active', true);
    } else {
      $(this).toggleClass('active');
    }
  });
};
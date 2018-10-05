$(function () {
    $(document).scroll(function () {
        var $txt = $(".txtBar");
        var $nav = $(".navbar-fixed-top");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
        $txt.toggleClass('scrolled', $(this).scrollTop() > $txt.height());
      });
  });
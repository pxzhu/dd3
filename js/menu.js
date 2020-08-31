$(document).ready(function() {
  $(".btn").click(function() {
    $("#menu").addClass("open");
  });
  $(".close").click(function () {
    $("#menu").removeClass("open");
  });
  $(".menu>a").click(function () {
    var submenu = $(this).next("ul");         
    if (submenu.is(":visible")) {
      submenu.slideUp();
    } else {
      submenu.slideDown();
    }
  });
});
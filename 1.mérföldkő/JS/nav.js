$(window).resize(function () {
  if (window.innerWidth > 700) {
    $(".menu").removeClass("invisible");
  }
});
$("#myBtn").click(function () {
  $(".menu").toggleClass("invisible");
});

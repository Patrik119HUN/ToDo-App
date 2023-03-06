$(window).resize(function () {
  if (window.innerWidth > 700) {
    $("[id=menu]").removeClass("invisible");
  }
});
$("#myBtn").click(function () {
  $("[id=menu]").toggleClass("invisible");
});

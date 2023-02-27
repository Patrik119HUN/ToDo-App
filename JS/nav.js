$(window).resize(function() {
    if (window.innerWidth > 700) {
      $("[id=menu]").removeClass("invisible");
    }
  });
  $("#myBtn").click(function() {
    $("[id=menu]").toggleClass("invisible");
  });

const currantPage = window.location;
const navLinks = document.querySelectorAll('nav a').forEach(link => {
  if(link.href.includes(`${currantPage}`)){
    link.classList.add('currant');
  }
})
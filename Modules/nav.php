<link rel="stylesheet" href="../Styles/nav.css" />

<nav class="topnav">
  <div id="menu">
    <a href="/" class="active">ToDo APP</a>
    <a href="/galeria">Galéria</a>
    <a href="/rolunk">Rólunk</a>
  </div>
  <div class="mobile">
    <p class="logo">ToDo APP</p>
    <button class="ham" id="myBtn"><img src="../SVG/menu.svg" alt="" style="width: 2rem;"></button>
  </div>
  <div class="asd" id="menu">
    <a>Regisztráció</a>
    <a href="../Sites/bejelentkezes.html">Bejelentkezés</a>
  </div>
</nav>
<script>
  $(window).resize(function() {
    if (window.innerWidth <  600) {
      $("[id=menu]").addClass("invisible");
    } else {
      $("[id=menu]").removeClass("invisible");
    }
  });
  $("#myBtn").click(function() {
    console.log("asd");
    $("[id=menu]").toggle("invisible");
  });
</script>
<link rel="stylesheet" href="../Styles/nav.css" />

<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

<nav class="topnav">
  <ul>
    <p class="logo">ToDo APP</p>
    <button class="ham" id="myBtn"><img src="../SVG/menu.svg" alt="" style="width: 2rem;"></button>
  </ul>
  <ul id="menu">
    <li class='<?= ($activePage == 'index') ? 'active' : ''; ?> '><a href="/">Kezdőlap</a></li>
    <li class='<?= ($activePage == 'galeria') ? 'active' : ''; ?>'><a href="/galeria">Galéria</a></li>
    <!--<li><a class='</*?= ($activePage == 'rolunk') ? 'active':''; ?>*/' href="/rolunk">Rólunk</a></li>-->
  </ul>
  <ul id="menu">
    <li class='<?= ($activePage == 'regisztracio') ? 'active' : ''; ?>'><a href="/regisztracio">Regisztráció</a></li>
    <li class='<?= ($activePage == 'bejelentkezes') ? 'active' : ''; ?>'><a href="/bejelentkezes">Bejelentkezés</a></li>
  </ul>
</nav>

<script src="../JS/nav.js"></script>
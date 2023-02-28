<link rel="stylesheet" href="../Styles/nav.css" />

<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");?>

<nav class="topnav">
  <ul>
    <p class="logo">ToDo APP</p>
    <button class="ham" id="myBtn"><img src="../SVG/menu.svg" alt="" style="width: 2rem;"></button>
  </ul>
  <ul id="menu">
    <li><a class='<?= ($activePage == 'index') ? 'active':''; ?>' href="/" >ToDo APP</a></li>
    <li><a class='<?= ($activePage == 'galeria') ? 'active':''; ?>' href="/galeria">Galéria</a></li>
    <li><a class='<?= ($activePage == 'rolunk') ? 'active':''; ?>' href="/rolunk">Rólunk</a></li>
  </ul>
  <ul id="menu">
    <li><a class='<?= ($activePage == 'regisztracio') ? 'active':''; ?>' href="/regisztracio">Regisztráció</a></li>
    <li><a class='<?= ($activePage == 'bejelentkezes') ? 'active':''; ?>' href="/bejelentkezes">Bejelentkezés</a></li>
  </ul>
</nav>

<script src="../JS/nav.js"></script>
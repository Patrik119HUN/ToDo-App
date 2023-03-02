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
    <?php if (isset($_SESSION["user"])) { ?>
      <li><a href="/"><?php echo $_SESSION["user"]["id"]?></a></li>
      <li><a href="/kijelentkezes">Kijelentkezés</a></li>
      <?php } else { ?>
      <li class='<?= ($activePage == 'regisztracio') ? 'active' : ''; ?>'><a href="/regisztracio">Regisztráció</a></li>
      <li class='<?= ($activePage == 'bejelentkezes') ? 'active' : ''; ?>'><a href="/bejelentkezes">Bejelentkezés</a></li>
    <?php } ?>
  </ul>
</nav>

<script src="../JS/nav.js"></script>
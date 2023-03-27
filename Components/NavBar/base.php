<!--<li><a class='</*?= ($activePage == 'rolunk') ? 'active':''; ?>*/' href="/rolunk">Rólunk</a></li>-->
<!-- </ul>
<ul id="menu">
    <li class='<?= ($activePage == 'regisztracio') ? 'active' : ''; ?>'><a href=" /regisztracio">Regisztráció</a></li>
    <li class='<?= ($activePage == 'bejelentkezes') ? 'active' : ''; ?>'><a href="/bejelentkezes">Bejelentkezés</a></li>
</ul> -->
<?php require 'item.php' ?>

<div>
    <a href="../Sites/index.html" class="logo">ToDo APP</a>
    <button class="ham" id="myBtn">
        <img src="../SVG/menu.svg" alt="" style="width: 2rem" />
    </button>
</div>
<?php foreach ( $_SESSION['alma'] as $as) {
    echo "<ul class='menu'>";
    foreach ($as as $fajl => $nev) {
        NavItem($fajl, $nev);
    }
    echo "</ul>";
}
?>
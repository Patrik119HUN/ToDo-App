<ul>
    <p class="logo">ToDo APP</p>
    <button class="ham" id="myBtn"><img src="../../SVG/menu.svg" alt="" style="width: 2rem;"></button>
</ul>
<ul id="menu">
    <li class='<?= ($activePage == 'teendok') ? 'active' : ''; ?> '><a href="/teendok">Teendőid</a></li>
</ul>
<ul id="menu">
    <li class='<?= ($activePage == 'felhasznalo') ? 'active' : ''; ?> '><a href="/felhasznalo"><?php echo $_SESSION["user"]["id"] ?></a></li>
    <li><a href="/kijelentkezes">Kijelentkezés</a></li>
</ul>
<div>
    <a href="../Sites/index.html" class="logo">ToDo APP</a>
    <button class="ham" id="myBtn">
        <img src="../SVG/menu.svg" alt="" style="width: 2rem" />
    </button>
</div>
<?php require 'item.php' ?>
<?php
$bejelentkezve = $_SESSION['Bejelentkezve'];
foreach ($bejelentkezve as $linkek) {
    echo "<ul class='menu'>";
    foreach ($linkek as $url => $nev) {
        NavItem($url, $nev);
    }
    echo "</ul>";
}
?>
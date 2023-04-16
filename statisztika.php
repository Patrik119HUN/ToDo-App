<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
if (isset($_SESSION["user"]["id"])) {
    $links[0][1]["felhasznalo.php"] = $_SESSION["user"]["id"];
}
$page = new PageBuilder($links);
$page->getHeader()->addCss("../Styles/stat.css");
$page->getHeader()->setTitle("Statisztika");
$page->pageContent('Sites/statisztika.php');

$page->render();

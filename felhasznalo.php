<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
$links[0][1]["felhasznalo.php"] = $_SESSION["user"]["id"];
$page = new PageBuilder($links);
$page->getHeader()->addCss("../Styles/felhasznalo.css");
$page->getHeader()->setTitle("Felhasználó");
$page->pageContent('Sites/felhasznalo.php');

$page->render();

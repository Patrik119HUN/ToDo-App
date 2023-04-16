<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
if (isset($_SESSION["user"]["id"])) {
    $links[0][1]["felhasznalo.php"] = $_SESSION["user"]["id"];
}
$page = new PageBuilder($links);
$page->getHeader()->addCss("Components/Card/Card.css");
$page->getHeader()->addCss("Components/Hero/Hero.css");
$page->getHeader()->setTitle("ToDo App");
$page->pageContent('Sites/kezdolap.php');

$page->render();

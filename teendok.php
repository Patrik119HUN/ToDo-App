<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
if (isset($_SESSION["user"]["id"])) {
    $links[0][1]["felhasznalo.php"] = $_SESSION["user"]["id"];
}
$page = new PageBuilder($links);
$page->getHeader()->setTitle("Teendők");
$page->getHeader()->addCss("../Components/TaskManager/Task/Task.css");
$page->getHeader()->addCss("../Components/TaskManager/TaskList/TaskList.css");
$page->getHeader()->addCss("../Components/TaskManager/TaskManager.css");
$page->getHeader()->addCss("../Styles/feladatok.css");
$page->pageContent('Sites/teendok.php');

$page->render();

<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
$page = new PageBuilder($links);
$page->getHeader()->setTitle("Feladatszerkesztő");
$page->getHeader()->addCss("../Styles/feladat.css");
$page->pageContent('Sites/feladatszerkeszto.php');

$page->render();

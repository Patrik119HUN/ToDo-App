<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
$page = new PageBuilder($links);
$page->getHeader()->addCss("../Styles/galeria.css");
$page->getHeader()->setTitle("Galeria");
$page->pageContent('Sites/galeria.php');

$page->render();

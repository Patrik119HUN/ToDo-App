<?php
include 'Components/PageBuilder/PageBuilder.php';
include 'Components/links.php';

session_start();
$page = new PageBuilder($links);
$page->getHeader()->addCss("../Styles/form.css");
$page->getHeader()->setTitle("Regisztráció");
$page->pageContent('Sites/regisztracio.php');

$page->render();

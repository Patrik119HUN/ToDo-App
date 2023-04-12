<?php
include 'Route.php';

include 'Components/PageBuilder/PageBuilder.php';
use Steampixel\Route;

$kijelentkezve = [
  [
    "/" => "Kezdőlap",
    "galeria" => "Galéria",
    "feladatszerkeszto" => "Feladatszerkesztő",
  ],
  [
    "regisztracio" => "Regisztráció",
    "bejelentkezes" => "Bejelentkezés"
  ]
];

$bejelentkezve = [
  [
    "teendok" => "Teendők",
  ],
  [
    "felhasznalo" => "alma",
    "kijelentkezes" => "Kijelentkezés",
  ]
];

$links = [$bejelentkezve, $kijelentkezve];

Route::add('/', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->addCss("../Components/Card/Card.css");
  $page->getHeader()->addCss("../Components/Hero/Hero.css");
  $page->getHeader()->setTitle("ToDo App");
  $page->pageContent('Sites/index.php');

  $page->render();
});
Route::add('/galeria', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->addCss("../Styles/galeria.css");
  $page->getHeader()->setTitle("Galeria");
  $page->pageContent('Sites/galeria.php');

  $page->render();
});
Route::add('/regisztracio', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->addCss("../Styles/form.css");
  $page->getHeader()->setTitle("Regisztráció");
  $page->pageContent('Sites/regisztracio.php');

  $page->render();
}, 'get');
Route::add('/bejelentkezes', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->addCss("../Styles/form.css");
  $page->getHeader()->setTitle("Bejelentkezés");
  $page->pageContent('Sites/bejelentkezes.php');

  $page->render();
}, 'get');
Route::add('/feladatszerkeszto', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->setTitle("Feladatszerkesztő");
  $page->getHeader()->addCss("../Styles/feladat.css");
  $page->pageContent('Sites/feladatszerkeszto.php');

  $page->render();
});
Route::add('/teendok', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->setTitle("Teendők");
  $page->getHeader()->addCss("../Components/TaskManager/Task/Task.css");
  $page->getHeader()->addCss("../Components/TaskManager/TaskList/TaskList.css");
  $page->getHeader()->addCss("../Components/TaskManager/TaskManager.css");
  $page->getHeader()->addCss("../Styles/feladatok.css");
  $page->pageContent('Sites/teendok.php');

  $page->render();
}, 'get');

Route::add('/felhasznalo', function () {
  global $links;
  session_start();
  $page = new PageBuilder($links);
  $page->getHeader()->addCss("../Styles/felhasznalo.css");
  $page->getHeader()->setTitle("Felhasználó");
  $page->pageContent('Sites/felhasznalo.php');

  $page->render();
});

Route::add('/kijelentkezes', function () {
  session_start();
  session_unset();
  session_destroy();

  session_start();
  header("Location: /bejelentkezes");    // átirányítás
});
Route::pathNotFound(function ($path) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 404 Not Found');
  echo 'Error 404 :-(<br>';
  echo 'The requested path "' . $path . '" was not found!';
});
Route::run('/');

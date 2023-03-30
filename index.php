<?php
include 'Route.php';

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
    "teendok" => "teendok",
  ],
  [
    "felhasznalo" => "alma",
    "kijelentkezes" => "Kijelentkezés",
  ]
];
$GLOBALS['Bejelentkezve'] = $bejelentkezve;
$GLOBALS['Kijelentkezve'] = $kijelentkezve;

Route::add('/', function () {
  session_start();

  if (!isset($_SESSION['Kijelentkezve']) || !isset($_SESSION['Bejelentkezve'])) {
    $_SESSION['Kijelentkezve'] = $GLOBALS['Kijelentkezve'];
    $_SESSION['Bejelentkezve'] = $GLOBALS['Bejelentkezve'];
  }
  include('./Sites/index.php');
});

Route::add('/galeria', function () {
  session_start();
  include('./Sites/galeria.php');
});
Route::add('/regisztracio', function () {
  session_start();
  include('./Sites/regisztracio.php');
}, 'get');
Route::add('/bejelentkezes', function () {
  session_start();
  include('./Sites/bejelentkezes.php');
}, 'get');

Route::add('/feladatszerkeszto', function () {
  session_start();
  include('./Sites/feladatszerkeszto.php');
});
Route::add('/teendok', function () {
  session_start();
  include('./Sites/teendok.php');
});

Route::add('/felhasznalo', function () {
  session_start();
  include('./Sites/felhasznalo.php');
});

Route::add('/kijelentkezes', function () {
  session_start();
  session_unset();
  session_destroy();

  session_start();
  if (!isset($_SESSION['Kijelentkezve']) || !isset($_SESSION['Bejelentkezve'])) {
    $_SESSION['Kijelentkezve'] = $GLOBALS['Kijelentkezve'];
    $_SESSION['Bejelentkezve'] = $GLOBALS['Bejelentkezve'];
  }
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

<?php 
include 'Route.php';
use Steampixel\Route;

Route::add('/', function() {
  include('./Sites/index.php');
});

Route::add('/galeria', function() {
  include('./Sites/galeria.php');
});

Route::pathNotFound(function($path) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 404 Not Found');
  echo 'Error 404 :-(<br>';
  echo 'The requested path "'.$path.'" was not found!';
});
Route::run('/');
?>

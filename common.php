<?php


define('ROOT_DIR', dirname(__FILE__));
$root = $_SERVER['DOCUMENT_ROOT'];
function loadFile($path)
{
  $users = [];          

  
  if (file_exists($path) === FALSE) {
    $file = fopen($path, "w");
    fclose($file);
  }
  $file = fopen($path, "r");

  while (($line = fgets($file)) !== FALSE) {  
    $user = unserialize($line);  
    $users[] = $user;            
  }

  fclose($file);
  return $users;                 
}


function saveToFile($path, $users)
{
  $file = fopen($path, "w");    
  if ($file === FALSE)          
    die("HIBA: A fájl megnyitása nem sikerült!");

  foreach ($users as $user) {    
    $serialized_user = serialize($user);      
    fwrite($file, $serialized_user . "\n");
  }

  fclose($file);
}


function uploadProfilePicture($username) {
    global $fajlfeltoltes_hiba;   

    if (isset($_FILES["profile-pic"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {  
      $allowed_extensions = ["png", "jpg", "jpeg"];                                           
      $extension = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));  

      if (in_array($extension, $allowed_extensions)) {      
        if ($_FILES["profile-pic"]["error"] === 0) {        
          if ($_FILES["profile-pic"]["size"] <= 31457280) { 
            $path = "pics/ProfilPics/" . $username . "." . $extension;  

            if (!move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $path)) { 
              $fajlfeltoltes_hiba = "A fájl átmozgatása nem sikerült!";
            }
          } else {
            $fajlfeltoltes_hiba = "A fájl mérete túl nagy!";
          }
        } else {
          $fajlfeltoltes_hiba = "A fájlfeltöltés nem sikerült!";
        }
      } else {
        $fajlfeltoltes_hiba = "A fájl kiterjesztése nem megfelelő!";
      }
    }
  }

<?php
  // a regisztrált felhasználók fájlból való betöltéséért felelő függvény

  function loadUsers($path) {
    $users = [];                  // ez a tömb fogja tartalmazni a regisztrált felhasználókat

    $file = fopen($path, "r");    // fájl megnyitása olvasásra
    if ($file === FALSE)          // hibakezelés
      die("HIBA: A fájl megnyitása nem sikerült!");

    while (($line = fgets($file)) !== FALSE) {  // fájl tartalmának beolvasása soronként
      $user = unserialize($line);  // a sor deszerializálása (visszaalakítása az adott felhasználót reprezentáló asszociatív tömbbé)
      $users[] = $user;            // a felhasználó hozzáadása a regisztrált felhasználókat tároló tömbhöz
    }

    fclose($file);
    return $users;                 // a felhasználókat tároló 2D tömb visszaadása
  }

  // a regisztrált felhasználók adatait fájlba író függvény

  function saveUsers($path, $users) {
    $file = fopen($path, "w");    // fájl megnyitása írásra
    if ($file === FALSE)          // hibakezelés
      die("HIBA: A fájl megnyitása nem sikerült!");

    foreach($users as $user) {    // végigmegyünk a regisztrált felhasználók tömbjén
      $serialized_user = serialize($user);      // szerializált formára alakítjuk az adott felhasználót
      fwrite($file, $serialized_user . "\n");   // a szerializált adatot kiírjuk a kimeneti fájlba
    }

    fclose($file);
  }
?>
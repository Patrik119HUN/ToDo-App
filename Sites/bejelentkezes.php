  <?php
  include "./common.php";
  $fiokok = loadFile("users.txt");

  $uzenet = "";                     // az űrlap feldolgozása után kiírandó üzenet

  if (isset($_GET["login"])) {    // miután az űrlapot elküldték...
    if (!isset($_GET["username"]) || trim($_GET["username"]) === "" || !isset($_GET["psw"]) || trim($_GET["psw"]) === "") {
      // ha a kötelezően kitöltendő űrlapmezők valamelyike üres, akkor hibaüzenetet jelenítünk meg
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      // ha megfelelően kitöltötték az űrlapot, lementjük az űrlapadatokat egy-egy változóba
      $id = $_GET["username"];
      $jelszo = $_GET["psw"];

      // bejelentkezés sikerességének ellenőrzése
      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";  // alapból azt feltételezzük, hogy a bejelentkezés sikertelen

      foreach ($fiokok as $fiok) {              // végigmegyünk a regisztrált felhasználókon
        // a bejelentkezés pontosan akkor sikeres, ha az űrlapon megadott felhasználónév-jelszó páros megegyezik egy regisztrált felhasználó belépési adataival
        // a jelszavakat hash alapján, a password_verify() függvénnyel hasonlítjuk össze
        if (($fiok["id"] === $id || $fiok["email"] === $id) && password_verify($jelszo, $fiok["jelszo"])) {
          $uzenet = "Sikeres belépés!";        // ekkor átírjuk a megjelenítendő üzenet szövegét
          $_SESSION["user"] = $fiok;
          $_SESSION["Bejelentkezve"][1]["felhasznalo"] = $id;
          header("Location: /");                                // mivel találtunk illeszkedést, ezért a többi felhasználót nem kell megvizsgálnunk, kilépünk a ciklusból 
        }
      }
    }
  }
  ?>
  <main class="bg-img" id="bejelentkezes">
    <form action="/bejelentkezes" class="form" id="reset" method="GET">
      <fieldset>
        <h1>Bejelentkezés</h1>

        <label for="username"><b>Felhasználónév vagy E-mail cím</b></label>
        <input type="text" placeholder="'jankópityu129' vagy 'jankopisti@valami.com'" name="username" required />

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Adj meg egy jelszót" name="psw" required />

        <button type="submit" class="login" name="login">Belépek</button>
        <?php echo "<p style='font-size:1rem;'>" . $uzenet . "</p>"; ?>
        <input class="rButton" type="reset" onclick="myFunction()" value="Törlés">
      </fieldset>
    </form>
  </main>

  <script>
    function myFunction() {
      document.getElementById("reset").reset();
    }
  </script>
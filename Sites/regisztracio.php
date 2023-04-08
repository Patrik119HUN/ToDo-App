  <?php
  include "./common.php";
  $fiokok =  loadFile("users.txt");
  $hibak = [];

  if (isset($_GET["register"])) {   // csak azután dolgozzuk fel az űrlapot, miután az el lett küldve

    if (!isset($_GET["id"]) && trim($_GET["id"]) === "")
      $hibak[] = "A felhasználó név megadása kötelező!";

    if (!isset($_GET["surname"]) && trim($_GET["surname"]) === "")
      $hibak[] = "A vezetéknév megadása kötelező!";

    if (!isset($_GET["forename"]) && trim($_GET["forename"]) === "")
      $hibak[] = "A keresztnév megadása kötelező!";

    if (!isset($_GET["email"]) && trim($_GET["email"]) === "")
      $hibak[] = "A e-mail cím megadása kötelező!";

    if (!isset($_GET["psw"]) || trim($_GET["psw"]) === "" || !isset($_GET["psw_n"]) || trim($_GET["psw_n"]) === "")
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_GET["birthday"]) || trim($_GET["birthday"]) === "")
      $hibak[] = "Az életkor megadása kötelező!";


    $id = $_GET["id"];
    $vezeteknev = $_GET["surname"];
    $keresztnev = $_GET["forename"];
    $email = $_GET["email"];
    $jelszo = $_GET["psw"];
    $jelszo2 = $_GET["psw_n"];
    $eletkor = $_GET["birthday"];
    // túl rövid jelszó

    if (strlen($jelszo) < 5)
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    // a két jelszó nem egyezik
    if ($jelszo !== $jelszo2)
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    // 18 év alatti életkor
    if ($eletkor < 18)
      $hibak[] = "Csak 18 éves kortól lehet regisztrálni!";

    foreach ($fiokok as $fiok) {
      if ($fiok["id"] === $id)
        $hibak[] = "A felhasználónév már foglalt!";
    }
    if (count($hibak) === 0) {
      $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
      $fiokok[] = ["id" => $id, "vezeteknev" => $vezeteknev, "keresztnev" => $keresztnev, "jelszo" => $jelszo, "eletkor" => $eletkor, "email" => $email];
      saveToFile("users.txt", $fiokok);
      $siker = TRUE;
      header("Location /bejelentkezes");
    } else {
      $siker = FALSE;
    }
  }
  ?>

  <main class="bg-signup" id="bejelentkezes">
    <form action="/regisztracio" class="form shadow" id="reset" method="GET">
      <fieldset style="padding:2rem; border:none">
        <h1>Regisztráció</h1>
        <div style="display:flex; gap:2rem">
          <div>
            <label for="surename"><b>Vezeték név</b></label>
            <input class="shadow" type="text" placeholder="Jankó" name="surname" value="<?php if (isset($_GET['surname'])) echo $_GET['surname']; ?>" />
          </div>
          <div>
            <label for="forename"><b>Kereszt név</b></label>
            <input class="shadow" type="text" placeholder="Pista" name="forename" value="<?php if (isset($_GET['forename'])) echo $_GET['forename']; ?>" />
          </div>
        </div>
        <label for="id"><b>Felhasználónév</b></label>
        <input class="shadow" type="text" placeholder="jankópityu129" name="id" value="<?php if (isset($_GET['id'])) echo $_GET['id']; ?>" />
        <label for="birthday"><b>Születési dátum: </b></label>
        <input class="shadow" type="date" id="birthday" name="birthday" value="<?php if (isset($_GET['birthday'])) echo $_GET['birthday']; ?>" />

        <label for="email"><b>Email</b></label>
        <input class="shadow" type="text" placeholder="jankopisti@valami.com" name="email" value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>" />

        <label for="psw"><b>Jelszó</b></label>
        <input class="shadow" type="password" placeholder="Adj meg egy jelszót" name="psw" />

        <label for="psw_n"><b>Jelszó újra</b></label>
        <input class="shadow" type="password" placeholder="Adj meg egy jelszót" name="psw_n" />

        <button type="submit" class="login" name="register">Regisztrálok</button>
        <?php
        if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
          echo "<p style='color:green; font-size:1rem;'>Sikeres regisztráció!</p>";
        } else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
          foreach ($hibak as $hiba) {
            echo "<p style='color:green; font-size:1rem;'>$hiba</p>";
          }
        }
        ?>
        <button type="reset" class="rButton" onclick="myFunction()"> Törlés </button>
      </fieldset>
    </form>

  </main>

  <script>
    function myFunction() {
      document.getElementById("reset").reset();
    }
  </script>
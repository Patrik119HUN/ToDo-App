  <?php
  include "./Components/common.php";
  $fiokok =  loadFile("users.txt");
  $hibak = [];

  if (isset($_POST["register"])) {   

    $id = $_POST["id"];
    $vezeteknev = $_POST["surname"];
    $keresztnev = $_POST["forname"];
    $email = $_POST["email"];
    $jelszo = $_POST["psw"];
    $jelszo2 = $_POST["psw_n"];
    $eletkor = $_POST["birthday"];
    
    if (!isset($vezeteknev) || trim($vezeteknev) === "")
      $hibak[] = "A vezetéknév megadása kötelező!";

    if (!isset($keresztnev) || trim($keresztnev) === "")
      $hibak[] = "A keresztnév megadása kötelező!";
    
    if (!isset($id) || trim($id) === "")
      $hibak[] = "A felhasználó név megadása kötelező!";

    if (!isset($eletkor) || trim($eletkor) === "")
      $hibak[] = "Az születési év megadása kötelező!"; 

    if (!isset($email) || trim($email) === ""){
      $hibak[] = "A e-mail cím megadása kötelező!";
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $hibak[] = "Érvénytelen e-mail cím";
    }

    if (!isset($jelszo) || trim($jelszo) === "" || !isset($jelszo2) || trim($jelszo2) === ""){
      $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";
    }else if (strlen($jelszo) < 5) {
      $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";
    }else if ($jelszo !== $jelszo2) {
      $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";
    }    

    foreach ($fiokok as $fiok) {
      if ($fiok["id"] === $id)
        $hibak[] = "A felhasználónév már foglalt!";
    }
    if (count($hibak) === 0) {
      $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
      array_push($fiokok, ["id" => $id, "vezeteknev" => $vezeteknev, "keresztnev" => $keresztnev, "jelszo" => $jelszo, "eletkor" => $eletkor, "email" => $email]);
      saveToFile("users.txt", $fiokok);
      $path = "users/" . $id . "/";
      mkdir($path);
      $siker = TRUE;
    } else {
      $siker = FALSE;
    }
  }
  ?>

  <main class="bg-signup" id="bejelentkezes">
    <form action="/regisztracio.php" class="form shadow" id="reset" method="POST">
      <fieldset style="padding:2rem; border:none">
        <h1>Regisztráció</h1>
        <div style="display:flex; gap:2rem">
          <div>
            <label for="surname"><b>Vezetéknév</b></label>
            <input class="shadow" type="text" placeholder="Jankó" name="surname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>" />
          </div>
          <div>
            <label for="forname"><b>Keresztnév</b></label>
            <input class="shadow" type="text" placeholder="Pista" name="forname" value="<?php if (isset($_POST['forname'])) echo $_POST['forname']; ?>" />
          </div>
        </div>
        <label for="id"><b>Felhasználónév</b></label>
        <input class="shadow" type="text" placeholder="jankópityu129" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id']; ?>" />
        <label for="birthday"><b>Születési dátum: </b></label>
        <input class="shadow" type="date" id="birthday" name="birthday" value="<?php if (isset($_POST['birthday'])) echo $_POST['birthday']; ?>" />
        <br>
        <label for="email"><b>Email</b></label>
        <input class="shadow" type="text" placeholder="jankopisti@valami.com" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />

        <label for="psw"><b>Jelszó (legalább 5 karakter)</b></label>
        <input class="shadow" type="password" placeholder="Adj meg egy jelszót" name="psw" />

        <label for="psw_n"><b>Jelszó újra</b></label>
        <input class="shadow" type="password" placeholder="Adj meg egy jelszót" name="psw_n" />

        <button type="submit" class="login shadow" name="register">Regisztrálok</button>
        <?php
        if (isset($siker) && $siker === TRUE) { 
          echo "<p style='color:green; font-size:1rem;'>Sikeres regisztráció!</p>";
        } else {                                
          foreach ($hibak as $hiba) {
            echo "<p style=' color:red; font-size:1.3rem;'>$hiba</p>";
          }
        }
        ?>
        <button type="reset" class="rButton shadow" onclick="myFunction()"> Törlés </button>
      </fieldset>
    </form>

  </main>

  <script>
    function myFunction() {
      document.getElementById("reset").reset();
    }
  </script>
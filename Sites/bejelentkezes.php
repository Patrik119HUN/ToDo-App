  <?php
  include "./common.php";
  $fiokok = loadFile("users.txt");

  $uzenet = "";                     

  if (isset($_GET["login"])) {    
    if (!isset($_GET["username"]) || trim($_GET["username"]) === "" || !isset($_GET["psw"]) || trim($_GET["psw"]) === "") {
      
      $uzenet = "<strong>Hiba:</strong> Adj meg minden adatot!";
    } else {
      
      $id = $_GET["username"];
      $jelszo = $_GET["psw"];

      
      $uzenet = "Sikertelen belépés! A belépési adatok nem megfelelők!";  

      foreach ($fiokok as $fiok) {              
        if (($fiok["id"] === $id || $fiok["email"] === $id) && password_verify($jelszo, $fiok["jelszo"])) {
          $uzenet = "Sikeres belépés!";        
          $_SESSION["user"] = $fiok;
          $_SESSION["Bejelentkezve"][1]["felhasznalo"] = $id;
          header("Location: /kezdolap");                              
        }
      }
    }
  }
  ?>
  <main class="bg-img" id="bejelentkezes">
    <form action="/bejelentkezes" class="form shadow" id="reset" method="GET">
    <fieldset style="padding:2rem; border:none">
        <h1>Bejelentkezés</h1>

        <label for="username"><b>Felhasználónév vagy E-mail cím</b></label>
        <input class="shadow" type="text" placeholder="'jankópityu129' vagy 'jankopisti@valami.com'" name="username" required />

        <label for="psw"><b>Password</b></label>
        <input class="shadow" type="password" placeholder="Adj meg egy jelszót" name="psw" required />

        <button type="submit" class="login shadow" name="login">Belépek</button>
        <?php echo "<p style='font-size:1rem;'>" . $uzenet . "</p>"; ?>
        <input class="rButton shadow" type="reset" onclick="myFunction()" value="Törlés">
      </fieldset>
    </form>
  </main>

  <script>
    function myFunction() {
      document.getElementById("reset").reset();
    }
  </script>
    <?php
    include "./common.php";
    $fiokok =  loadFile("users.txt");
    $hibak = [];

    if (isset($_GET["modosit"])) {   // csak azután dolgozzuk fel az űrlapot, miután az el lett küldve

        /*$id = $_GET["id"];
        $vezeteknev = $_GET["surname"];
        $keresztnev = $_GET["forname"];
        $email = $_GET["email"];
        $eletkor = $_GET["eletkor"];

        //if (!isset($id) || trim($id) === "")
          //  $hibak[] = "A felhasználó név megadása kötelező!";

        if (!isset($vezeteknev) || trim($vezeteknev) === "")
            $hibak[] = "A vezetéknév megadása kötelező!";

        if (!isset($keresztnev) || trim($keresztnev) === "")
            $hibak[] = "A keresztnév megadása kötelező!";

        if (!isset($email) || trim($email) === ""){
            $hibak[] = "A e-mail cím megadása kötelező!";
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hibak[] = "Érvénytelen e-mail cím";
        }
        if (!isset($eletkor) || trim($eletkor) === "")
            $hibak[] = "Az születésidátum megadása kötelező!";
        
        /*foreach ($fiokok as $fiok) {
            if ($fiok["id"] === $id)
                $hibak[] = "A felhasználónév már foglalt!";
        }

        $fajlfeltoltes_hiba = "";               // változó a fájlfeltöltés során adódó esetleges hibaüzenet tárolására
        uploadProfilePicture($_SESSION["user"]["id"]);  // a kozos.php-ban definiált profilkép feltöltést végző függvény meghívása
    
        if ($fajlfeltoltes_hiba !== "")
            $hibak[] = $fajlfeltoltes_hiba;

        /*if (count($hibak) === 0) {   // sikeres regisztráció
            $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
            $fiokok[] = ["id" => $id, "vezeteknev" => $vezeteknev, "keresztnev" => $keresztnev, "jelszo" => $jelszo,  "eletkor" => $eletkor, "email" => $email];
            saveToFile("users.txt", $fiokok);
            $siker = TRUE;
            header("Location: /felhasznalo");
            } else {                    // sikertelen regisztráció
                $siker = FALSE;
            }*/
    }
    ?>
    <section class="container">

        <?php
        // a profilkép elérési útvonalának eltárolása egy változóban

        $profilkep = "pics/ProfilPics/morgandefault.png";      // alapértelmezett kép, amit akkor jelenítünk meg, ha valakinek nincs feltöltött profilképe
        $utvonal = "pics/ProfilPics/" . $_SESSION["user"]["id"]; // a kép neve a felhasználó nevével egyezik meg

        $kiterjesztesek = ["png", "jpg", "jpeg"];     // a lehetséges kiterjesztések, amivel egy profilkép rendelkezhet

        foreach ($kiterjesztesek as $kiterjesztes) {  // minden kiterjesztésre megnézzük, hogy létezik-e adott kiterjesztéssel profilképe a felhasználónak
            if (file_exists($utvonal . "." . $kiterjesztes)) {
                $profilkep = $utvonal . "." . $kiterjesztes;  // ha megtaláltuk a felhasználó profilképét, eltároljuk annak az elérési útvonalát egy változóban
            }
        }
        ?>


        <ul>
            <h2>Adataid</h2>
        </ul>

        <ul class="input_row">
            <label for="id">Felhasználó neved:</label>
            <input type="text" name="id" value='<?php echo $_SESSION["user"]["id"] ?>' />
        </ul>

        <div class="name">
            <ul class="input_row">
                <label for="surname" id="label">Vezetékneved:</label><br>
                <input type="text" name="surname" value='<?php echo $_SESSION["user"]["vezeteknev"] ?>' />
            </ul>
            <ul class="input_row">
                <label for="forname" id="label">Keresztneved:</label><br>
                <input type="text" name="forname" value='<?php echo $_SESSION["user"]["keresztnev"] ?>'>
            </ul>
        </div>
        <ul class="input_row">
            <label for="email">E-mail címed:</label>
            <input type="text" name="email" value='<?php echo $_SESSION["user"]["email"] ?>' />
        </ul>
        <ul class="input_row">
            <label for="eletkor">Születési dátumod:</label>
            <input type="date" name="eletkor" value='<?php echo $_SESSION["user"]["eletkor"] ?>' />
        </ul>
        <form method="POST" enctype="multipart/form-data">
            <ul class="profilkep">
                <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="250" />
                <br><br>
                <label for="profile-pic">Töltsd fel a profilképed:</label>
                <input type="file" id="file-upload" name="profile-pic" accept="image/*" />
                <input type="submit" name="modosit" value="Adatok módosítása" />
            </ul>
            <?php
            if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
                echo "<p style='color:green; font-size:1rem;'>Adatok módosítva!</p>";
            } else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
                foreach ($hibak as $hiba) {
                    echo "<p style=' color:red; font-size:1.3rem;'>$hiba</p>";
                }
            }
            ?>
        </form>
        <?php
        // a profilkép módosítását elvégző PHP kód
        if (isset($_POST["modosit"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {  // ha töltöttek fel fájlt...
            $fajlfeltoltes_hiba = "";                                       // változó a fájlfeltöltés során adódó esetleges hibaüzenet tárolására
            uploadProfilePicture($_SESSION["user"]["id"]);      // a kozos.php-ban definiált profilkép feltöltést végző függvény meghívása

            $kit = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));    // a feltöltött profilkép kiterjesztése
            $utvonal = "pics/ProfilPics/" . $_SESSION["user"]["id"] . "." . $kit;            // a feltöltött profilkép teljes elérési útvonala

            // ha nem volt hiba a fájlfeltöltés során, akkor töröljük a régi profilképet, egyébként pedig kiírjuk a fájlfeltöltés során adódó hibát

            if ($fajlfeltoltes_hiba === "") {
                if ($utvonal !== $profilkep && $profilkep !== "pics/ProfilPics/default.png") {   // az ugyanolyan névvel feltöltött képet és a default.png-t nem töröljük
                    unlink($profilkep);                         // régi profilkép törlése
                }

                header("Location: /felhasznalo");              // weboldal újratöltése
            } else {
                echo "<p>" . $fajlfeltoltes_hiba . "</p>";
            }
        }
        ?>
    </section>
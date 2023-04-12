    <?php
    include "./common.php";
    $fiokok =  loadFile("users.txt");
    $hibak = [];
    
    if (isset($_POST["modosit"])) {   // csak azután dolgozzuk fel az űrlapot, miután az el lett küldve

        $id = $_POST["id"];
        $vezeteknev = $_POST["surname"];
        $keresztnev = $_POST["forname"];
        $email = $_POST["email"];
        $jelszo = $_POST["jelszo"];
        $jelszo2 = $_POST["jelszo2"];
        $eletkor = $_POST["eletkor"];

        if (!isset($id) || trim($id) === "")
            $hibak[] = "A felhasználó név megadása kötelező!";

        if (!isset($vezeteknev) || trim($vezeteknev) === "")
            $hibak[] = "A vezetéknév megadása kötelező!";

        if (!isset($keresztnev) || trim($keresztnev) === "")
            $hibak[] = "A keresztnév megadása kötelező!";

        if (!isset($email) || trim($email) === "")
            $hibak[] = "A e-mail cím megadása kötelező!";

        if (!isset($_POST["birthday"]) || trim($_POST["birthday"]) === "")
            $hibak[] = "Az születésidátum megadása kötelező!";
        
        $fajlfeltoltes_hiba = "";               // változó a fájlfeltöltés során adódó esetleges hibaüzenet tárolására
        uploadProfilePicture($felhasznalonev);  // a kozos.php-ban definiált profilkép feltöltést végző függvény meghívása
    
        if ($fajlfeltoltes_hiba !== "")
            $hibak[] = $fajlfeltoltes_hiba;

        if (count($hibak) === 0) {   // sikeres regisztráció
            $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
            $fiokok[] = ["felhasznalonev" => $felhasznalonev, "jelszo" => $jelszo, "eletkor" => $eletkor, "nem" => $nem, "hobbik" => $hobbik];
            saveToFile("users.txt", $fiokok);
            $siker = TRUE;
            header("Location: felhasznalo.php");
            } else {                    // sikertelen regisztráció
                $siker = FALSE;
            }
    }
    ?>
    <section class="container">

        <?php
        	// a profilkép elérési útvonalának eltárolása egy változóban

            $profilkep = "pics/default.png";      // alapértelmezett kép, amit akkor jelenítünk meg, ha valakinek nincs feltöltött profilképe
            $utvonal = "pics/" . $_SESSION["user"]["id"]; // a kép neve a felhasználó nevével egyezik meg

            $kiterjesztesek = ["png", "jpg", "jpeg"];     // a lehetséges kiterjesztések, amivel egy profilkép rendelkezhet

            foreach ($kiterjesztesek as $kiterjesztes) {  // minden kiterjesztésre megnézzük, hogy létezik-e adott kiterjesztéssel profilképe a felhasználónak
                if (file_exists($utvonal . "." . $kiterjesztes)) {
                    $profilkep = $utvonal . "." . $kiterjesztes;  // ha megtaláltuk a felhasználó profilképét, eltároljuk annak az elérési útvonalát egy változóban
                }
            }
        ?>

        <form action="felhasznalo" method="POST" enctype="multipart/form-data">
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
                <label for="birthday">Születési dátumod:</label>
                <input type="date" name="birthday" value='<?php echo $_SESSION["user"]["eletkor"] ?>' />
            </ul>
            <ul class="profilkep">
                <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200"/>
                <br><hr>
                <label for="file-upload">Töltsd fel a profilképed:</label>
                <span><input type="file" id="file-upload" name="profile-pic" accept="image/*" /></span> <br />
                <input type="submit" name="modosit" value="Feltöltés" />
            </ul>
            <?php
                if (isset($siker) && $siker === TRUE) {  // ha nem volt hiba, akkor a regisztráció sikeres
                    echo "<p style='color:green; font-size:1rem;'>Sikeres regisztráció!</p>";
                    } else {                                // az esetleges hibákat kiírjuk egy-egy bekezdésben
                        foreach ($hibak as $hiba) {
                            echo "<p style=' color:red; font-size:1.3rem;'>$hiba</p>";
                    }
                }
            ?>
        </form>
    </section>
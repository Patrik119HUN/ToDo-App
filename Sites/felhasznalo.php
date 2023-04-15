<?php
 include "./common.php";
$fiokok =  loadFile("users.txt");
$profil;
foreach($fiokok as $fiok){
    if($fiok["id"] === $_SESSION["user"]["id"]){
        $profil = $fiok;
    }
}
$hibak = [];

    if (isset($_POST["adatotModosit"])) {   
       
        $id = $_POST["id"];
        $vezeteknev = $_POST["surname"];
        $keresztnev = $_POST["forname"];
        $email = $_POST["email"];
        $eletkor = $_POST["dateOfBirth"];
        $jelszo = $_POST["password"];

        if (!isset($id) || trim($id) === "")
            $hibak[] = "A felhasználó név megadása kötelező!";
        
        if (!isset($vezeteknev) || trim($vezeteknev) === "")
            $hibak[] = "A vezetéknév megadása kötelező!";
        
        if (!isset($keresztnev) || trim($keresztnev) === "")
            $hibak[] = "A keresztnév megadása kötelező!";
        
        if (!isset($email) || trim($email) === ""){
            $hibak[] = "A e-mail cím megadása kötelező!";
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hibak[] = "Érvénytelen e-mail cím";
        }
        if (!isset($eletkor) || trim($eletkor) === ""){
            $hibak[] = "Az születésidátum megadása kötelező!";
        }
        if (!isset($jelszo) || trim($eletkor) === ""){
            $hibak[] = "Adj meg jelszót!";
        }else if (strlen($jelszo) < 5) {
            $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";
        }
        foreach ($fiokok as $fiok) {
            if ($fiok["id"] === $id && $_SESSION["user"]["id"] !== $id)
                $hibak[] = "A felhasználónév már foglalt!";
        }

        
        if (count($hibak) === 0) {   
            $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
            $modositottAdatok = array("id" => $id, "vezeteknev" => $vezeteknev, "keresztnev" => $keresztnev, "jelszo" => $jelszo,  "eletkor" => $eletkor, "email" => $email);
            for ($i=0; $i < count($fiokok); $i++){
                if ($fiokok[$i]["id"] === $_SESSION["user"]["id"]){
                    $fiokok[$i]=$modositottAdatok;
                }
            }
            
            saveToFile("users.txt", $fiokok);
            $siker = TRUE;
            header("Location: /felhasznalo");
            
        } else {                   
            $siker = FALSE;
        }
    }
    
    $profilPicture = "pics/ProfilPics/default.png";      
    $path = "pics/ProfilPics/" . $_SESSION["user"]["id"];

    $allowed_extensions = ["png", "jpg", "jpeg"];    

    foreach ($allowed_extensions as $ext) {  
        if (file_exists($path . "." . $ext)) {
            $profilPicture = $path . "." . $ext;  
        }
    }
    
    if (isset($_POST["modosit"]) && is_uploaded_file($_FILES["profile-pic"]["tmp_name"])) {  
        $fajlfeltoltes_hiba = "";                                      
        uploadProfilePicture($_SESSION["user"]["id"]);      

        $kit = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));    
        $path = "pics/ProfilPics/" . $_SESSION["user"]["id"] . "." . $kit;            

        if ($fajlfeltoltes_hiba === "") {
            if ($path !== $profilPicture && $profilPicture !== "pics/ProfilPics/default.png") {   
                unlink($profilPicture);                        
            }

            header("Location: /felhasznalo");
        } else {
            echo "<p>" . $fajlfeltoltes_hiba . "</p>";
        }
    }   
    ?>

    <section class="container">
        <ul>
            <h2>Adataid</h2>
        </ul>
        <form action="/felhasznalo" method="POST">
            <ul class="input_row">
                <label for="id">Felhasználó neved:</label>
                <input type="text" name="id" value='<?php echo $profil["id"]?>' readonly/>
            </ul> 
            <div class="name">
                <ul class="input_row">
                    <label for="surname" >Vezetékneved:</label><br>
                    <input type="text" name="surname" value='<?= $profil["vezeteknev"] ?>' />
                </ul>
                <ul class="input_row">
                    <label for="forname" >Keresztneved:</label><br>
                    <input type="text" name="forname" value='<?= $profil["keresztnev"] ?>'>
                </ul>
            </div>
            <ul class="input_row">
                <label for="email">E-mail címed:</label>
                <input type="text" name="email" value='<?= $profil["email"] ?>' />
            </ul>
            <ul class="input_row">
                <label for="eletkor">Születési dátumod:</label>
                <input type="date" name="dateOfBirth" value='<?= $profil["eletkor"] ?>' />
            </ul>
            <ul class="input_row">
                <label for="password">Jelszó módosítás (minimum 5 karakter):</label>
                <input type="password" name="password" />
            </ul> 
            <ul class="input_row">
                <input type="submit" id="submit" name="adatotModosit" value="Adatok módosítása" />
            </ul>
            <?php
            if (isset($siker) && $siker === TRUE) {  
                echo "<p style='color:green; font-size:1rem;'>Adatok módosítva!</p>";
            } else {                                
                foreach ($hibak as $hiba) {
                    echo "<p style=' color:red; font-size:1.3rem;'>$hiba</p>";
                }
            }
            ?>
        </form>
        <form method="POST" enctype="multipart/form-data">
            <ul class="profilkep">
                <img src="<?php echo $profilPicture; ?>" alt="Profilkép" height="250" />
                <br><br>
                <label for="profile-pic">Töltsd fel a profilképed:</label>
                <input type="file"  name="profile-pic" accept="image/*" />
                <input type="submit" id="submit" name="modosit" value="Profilkép feltöltés" />
            </ul>            
        </form>
        
    </section>
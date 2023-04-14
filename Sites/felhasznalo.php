<?php
 include "./common.php";
$fiokok =  loadFile("users.txt");
$hibak = [];

    if (isset($_GET["adatotModosit"])) {   
       
        $id = $_GET["id"];
        $vezeteknev = $_GET["surname"];
        $keresztnev = $_GET["forname"];
        $email = $_GET["email"];
        $eletkor = $_GET["dateOfBirth"];

        if (!isset($id) || trim($id) === ""){
            $hibak[] = "A felhasználó név megadása kötelező!";
        }else{
            echo $id."\n";
        }
        if (!isset($vezeteknev) || trim($vezeteknev) === ""){
            $hibak[] = "A vezetéknév megadása kötelező!";
        }else{
            echo $vezeteknev."\n";
        }
        if (!isset($keresztnev) || trim($keresztnev) === ""){
            $hibak[] = "A keresztnév megadása kötelező!";
        }else{
            echo $keresztnev."\n";
        }
        if (!isset($email) || trim($email) === ""){
            $hibak[] = "A e-mail cím megadása kötelező!";
        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $hibak[] = "Érvénytelen e-mail cím";
        }
        if (!isset($eletkor) || trim($eletkor) === "")
            $hibak[] = "Az születésidátum megadása kötelező!";
        
        foreach ($fiokok as $fiok) {
            if ($fiok["id"] === $id && $_SESSION["user"]["id"] !== $id)
                $hibak[] = "A felhasználónév már foglalt!";
        }

        
        if (count($hibak) === 0) {   
            $jelszo = password_hash($_SESSION["user"]["jelszo"], PASSWORD_DEFAULT);
            $modositottAdatok = array("id" => $id, "vezeteknev" => $vezeteknev, "keresztnev" => $keresztnev, "jelszo" => $jelszo,  "eletkor" => $eletkor, "email" => $email);
            foreach ($fiokok as $fiok){
                if ($fiok["id"] === $_SESSION["user"]["id"]){
                    $fiok = $modositottAdatok;
                }
            }
            saveToFile("users.txt", $fiokok);
            $siker = TRUE;
            //header("Location: /felhasznalo");
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
        <form action="/felhasznalo" method="GET">
            <ul class="input_row">
                <label for="id">Felhasználó neved:</label>
                <input type="text" name="id" value='<?php echo $_SESSION["user"]["id"] ?>' />
            </ul>
            <div class="name">
                <ul class="input_row">
                    <label for="surname" >Vezetékneved:</label><br>
                    <input type="text" name="surname" value='<?php echo $_SESSION["user"]["vezeteknev"] ?>' />
                </ul>
                <ul class="input_row">
                    <label for="forname" >Keresztneved:</label><br>
                    <input type="text" name="forname" value='<?php echo $_SESSION["user"]["keresztnev"] ?>'>
                </ul>
            </div>
            <ul class="input_row">
                <label for="email">E-mail címed:</label>
                <input type="text" name="email" value='<?php echo $_SESSION["user"]["email"] ?>' />
            </ul>
            <ul class="input_row">
                <label for="eletkor">Születési dátumod:</label>
                <input type="date" name="dateOfBirth" value='<?php echo $_SESSION["user"]["eletkor"] ?>' />
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
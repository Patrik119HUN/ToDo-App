<?php
if (isset($_FILES["profile-pic"])) {
    $engedelyezett_kiterjesztesek = ["jpg", "jpeg", "png"];

    $kiterjesztes = strtolower(pathinfo($_FILES["profile-pic"]["name"], PATHINFO_EXTENSION));
    
    if (in_array($kiterjesztes, $engedelyezett_kiterjesztesek)) {
        if ($_FILES["profile-pic"]["error"] === 0) {
            if ($_FILES["profile-pic"]["size"] <= 31457280) {
                $cel = "pics/ProfilPics/" . $_FILES["profile-pic"]["name"];
                if (file_exists($cel)) {
                    echo "<strong>Figyelem:</strong> A régebbi fájl felülírásra kerül! <br/>";
                }else if (move_uploaded_file($_FILES["profile-pic"]["tmp_name"], $cel)) {
                    echo "Sikeres fájlfeltöltés! <br/>";
                } else {
                    echo "<strong>Hiba:</strong> A fájl átmozgatása nem sikerült! <br/>";
                }
            } else {
                echo "<strong>Hiba:</strong> A fájl mérete túl nagy! <br/>";
            }
        } else {
            echo "<strong>Hiba:</strong> A fájlfeltöltés nem sikerült! <br/>";
        }
    } else {
        echo "<strong>Hiba:</strong> A fájl kiterjesztése nem megfelelő! <br/>";
    }
}
if (isset($_FILES["profile-pic"])) {
    echo "A fájl neve: " . $_FILES["profile-pic"]["name"] . "<br/>";
    echo "A fájl ideiglenes neve: " . $_FILES["profile-pic"]["tmp_name"] . "<br/>";
    echo "A fájl mérete (bájtokban): " . $_FILES["profile-pic"]["size"] . "<br/>";
    echo "A fájl típusa: " . $_FILES["profile-pic"]["type"] . "<br/>";
    echo "Hibakód: " . $_FILES["profile-pic"]["error"] . "<br/>";
}


?>

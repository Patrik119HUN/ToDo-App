<?php
include "./common.php";
$fiokok =  loadFile("users.txt");
$hibak = [];

if (isset($_POST["adatotModosit"])) {   
    echo "valamit irj mar ki";
    $id = $_POST["id"];
    $vezeteknev = $_POST["surname"];
    $keresztnev = $_POST["forname"];
    $email = $_POST["email"];
    $eletkor = $_POST["dateOfBirth"];

    if (!isset($id) || trim($id) === ""){
        $hibak[] = "A felhasználó név megadása kötelező!";
    }else{
        echo $id;
    }
    if (!isset($vezeteknev) || trim($vezeteknev) === ""){
        $hibak[] = "A vezetéknév megadása kötelező!";
        echo $vezeteknev;
    }
    if (!isset($keresztnev) || trim($keresztnev) === "")
        $hibak[] = "A keresztnév megadása kötelező!";

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
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
        $modositottAdatok[] = ["id" => $id, "vezeteknev" => $vezeteknev, "keresztnev" => $keresztnev, "jelszo" => $jelszo,  "eletkor" => $eletkor, "email" => $email];
        foreach ($fiokok as $fiok){
            if ($fiok["id"] === $_SESSION["user"]["id"]){
                echo $fiok;
            }
        }
        saveToFile("users.txt", $fiokok);
        $siker = TRUE;
        header("Location: /felhasznalo");
        } else {                   
            $siker = FALSE;
        }
}








?>
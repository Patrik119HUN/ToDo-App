<?php  
//a az allapot valtoztatast porbaltam megvalositani, hogy a maga a feladat allapota is megvaltozzon
require "../Components/feladat.php";
if(isset($_POST["submit"])){
    $feladat = new feladat("Séta", "Levinni a blökit", tipusok::Kesz, "2023-03-05");
    $state = $_POST["cars"];
    $feladat->setAllapot($state);
}
header("Location:../Sites/teendok.php");
?>
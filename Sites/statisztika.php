<?php
 include "./common.php";
$fiokok =  loadFile("users.txt");
$felhasznalokSzama = count($fiokok);
?>
<main>
<section class="container">
       
        <h1>Statisztika</h1>
        
        <div class="data">
            <p id="black">Jelenleg ennyien használják a ToDo Appot:</p>
            
        </div>
        <div class="circle"><?php echo $felhasznalokSzama?></div>

        
        
    </section>
</main>
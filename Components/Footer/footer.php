<link rel="stylesheet" href="../Styles/footer.css" />
<footer class="footer">
    <div class="name" style="margin-right:auto">
        <p>Made by Tukacs Patrik, Szegedi Bence</p>
        <ul style="list-style-type: none; color:yellow">
            <?php
            require 'links.php';

            $bejelentkezve = $_SESSION['Kijelentkezve'];
            foreach ($bejelentkezve as $linkek) {
                echo "<ul class='menu'>";
                foreach ($linkek as $url => $nev) {
                    FooterLink($url, $nev);
                }
                echo "</ul>";
            }
            ?>
        </ul>
    </div>
</footer>
<footer class='footer'>
    <div class='name' style='margin-right:auto'>
        <p>Made by Tukacs Patrik, Szegedi Bence</p>
        <ul style='list-style-type: none; color:yellow'>
            <?php foreach ($this->links as $links) {
                echo "<ul class='menu'>";
                foreach ($links as $url => $nev) {
                    $this->FooterLink($url, $nev);
                }
                echo "</ul>";
            } ?>
        </ul>
    </div>
</footer>
<footer class='footer'>
    <div class='name' >
        <ul style='list-style-type: none; color:yellow'>
            <?php foreach ($this->links as $links) {
                echo "<ul class='menu'>";
                foreach ($links as $url => $nev) {
                    $this->FooterLink($url, $nev);
                }
                echo "</ul>";
            } ?>
            <p id="copy">&copy;ToDo APP <br>by Tukacs Patrik, Szegedi Bence</p>
        </ul>
        
    </div>
    
</footer>
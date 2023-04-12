<nav class=topnav>
    <div>
        <a href='Sites/index.php' class='logo'>ToDo APP</a>
        <button class='ham' id='myBtn'>
            <img src='SVG/menu.svg' alt="Hamburger" style="width: 2rem"/>
        </button>
    </div>
    <?php isset($_SESSION["user"]) ? $this->loggedIn() : $this->base() ?>
</nav>
<script src='../JS/nav.js'></script>
<link rel="stylesheet" href="../Styles/nav.css" />
<nav class="topnav">
  <?php if (isset($_SESSION["user"])) {
    include 'NavBar/loggedin.php';
  } else {
    include 'NavBar/base.php';
  }
  ?>
</nav>

<script src="../JS/nav.js"></script>
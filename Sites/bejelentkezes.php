<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="author" content="Szegedi Bence, Tukacs Patrik" />
  <link rel="icon" type="image/x-icon" href="./képek/pipa favicon.ico" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bejelentkezés</title>
  <link rel="stylesheet" href="../Styles/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
  <?php include 'Modules/nav.php' ?>

  <main class="bg-img" id="bejelentkezes">
    <form action="/action_page.php" class="form" id="reset">
      <fieldset>
        <h1>Bejelentkezés</h1>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Add meg az email címed" name="email" required />

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Adj meg egy jelszót" name="psw" required />

        <button type="submit" class="login">Belépek</button>
        <input class="rButton" type="reset" onclick="myFunction()" value="Törlés">
      </fieldset>
    </form>
  </main>

  <?php include 'Modules/footer.php' ?>
  <script>
    function myFunction() {
      document.getElementById("reset").reset();
    }
  </script>
</body>
</html>
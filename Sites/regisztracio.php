<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="author" content="Szegedi Bence, Tukacs Patrik" />
  <link rel="icon" type="image/x-icon" href="./képek/pipa favicon.ico" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Regisztráció</title>
  <link rel="stylesheet" href="../Styles/style.css" />
  <link rel="stylesheet" href="../Styles/form.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

  <?php include 'Modules/nav.php' ?>


  <main class="bg-signup" id="bejelentkezes">
    <form action="/action_page.php" class="form" id="reset" method="POST">
      <fieldset>
        <h1>Regisztráció</h1>
        <div style="display:flex; gap:2rem">
          <div>
            <label for="email"><b>Vezeték név</b></label>
            <input type="text" placeholder="Jankó" name="email" required />
          </div>
          <div>
            <label for="email"><b>Kereszt név</b></label>
            <input type="text" placeholder="Pista" name="email" required />
          </div>
        </div>

        <label for="name"><b>Teljes név</b></label>
        <input type="text" placeholder="Add meg a teljes neved" name="name" required />

        <label for="birthday"><b>Születési dátum: </b></label>
        <input type="date" id="birthday" name="birthday" required />

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="jankopisti@valami.com" name="email" required />


        <label for="psw"><b>Születési dátum</b></label>
        <br>
        <input type="date" name="psw" required />
        <br>
        <label for="psw"><b>Jelszó</b></label>
        <input type="password" placeholder="Adj meg egy jelszót" name="psw" required />

        <label for="psw"><b>Jelszó újra</b></label>
        <input type="password" placeholder="Adj meg egy jelszót" name="psw" required />

        <button type="submit" class="login">Regisztrálok</button>

        <input  type="reset"  class="rButton" onclick="myFunction()" value="Törlés">

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
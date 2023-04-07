<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="Szegedi Bence, Tukacs Patrik" />
    <link rel="icon" type="image/x-icon" href="../pics/pipa%20favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teendők</title>
    <link rel="stylesheet" href="../Styles/style.css" />
    <link rel="stylesheet" href="../Components/TaskManager/Task/Task.css" />
    <link rel="stylesheet" href="../Components/TaskManager/TaskList/TaskList.css" />
    <link rel="stylesheet" href="../Styles/feladatok.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <?php include('Components/nav.php') ?>

    <div style="min-height:100vh;max-height:fit-content; background-color: yellow; padding: 1rem;padding-bottom: 5rem; display:flex;flex-direction: row; gap:1rem;justify-content: space-between;">
        <?php
        include 'Components/TaskManager/TaskManager.php';
        $taskManager = new TaskManager();
        $taskManager->render();
        ?>
    </div>

    <?php include 'Components/Footer/footer.php' ?>
</body>

</html>
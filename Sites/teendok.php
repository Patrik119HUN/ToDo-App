<div style="min-height:100vh;max-height:fit-content; background-color: yellow; padding: 1rem;padding-bottom: 5rem; display:flex;flex-direction: row; gap:1rem;justify-content: space-between;">
    <?php
    include 'Components/TaskManager/TaskManager.php';
    $taskManager = new TaskManager();
    $taskManager->render();
    ?>
</div>
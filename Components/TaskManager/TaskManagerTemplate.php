<div style='display:flex; flex-direction:row; width:min-content; margin-top: 2rem;gap:1.25rem;'>
    <?php
    foreach (TaskManager::$taskList as $tasks) {
        $tasks->render();
    }
    ?>
    <form method=get>
        <button type=submit name=add value=tasklist class=add>Hozzá adás</button>
    </form>
</div>
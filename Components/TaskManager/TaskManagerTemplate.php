<div class="TaskManager">
    <?php
    foreach (TaskManager::$taskList as $tasks) {
        $tasks->render();
    }
    ?>
    <form method=get>
        <button type=submit name=add value=tasklist class="add shadow">Hozzá adás</button>
    </form>
</div>
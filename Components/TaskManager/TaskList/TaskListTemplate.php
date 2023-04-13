<div class="container shadow">
    <form method=get style="margin-top:auto;">
        <button type=submit name=delete value=<?= $this->id ?> class=delete_button>X</button>
        <input type=hidden name=taskListId value=<?= $this->id ?>></input>
        <div style="display:flex;flex-direction:row; padding:1rem;">
            <input type=text name=taskName placeholder="Lista neve" value='<?= $this->thisName ?>'></input>
            <button type=submit name=change value=<?= $this->id ?> class="check">✓</button>
        </div>
    </form>
    <?php
    if ($this->TaskList == null) {
        echo "<h1>Nincs elem</h1>";
    } else {
        foreach ($this->TaskList as $feladat) {
            $feladat->render();
        }
    } ?>
    <form method=get style="margin-top:auto;">
        <button type=submit name=add value=<?= $this->id ?> class="add shadow">Hozzáadás</button>
    </form>
</div>
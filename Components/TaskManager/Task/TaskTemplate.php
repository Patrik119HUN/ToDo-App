 <div class="task shadow">
     <form action=/teendok method=get>
         <button type=submit name=delete value=<?= $this->id ?> class=delete_button style="background-color:blanchedalmond;">X</button>
         <input type=hidden name=taskId value=<?= $this->id ?>></input>
         <div class=inputs>
             <input type=text placeholder="Feladat neve" name=name value=<?= $this->name ?>></input>
             <input type=text placeholder="Leírása" id=leiras name=description value=<?= $this->description ?>></input>
             <input type=date name=date value=<?= $this->hatarIdo ?>></input>
         </div>
         <div style="display: flex; flex-direction: row;justify-content: space-between; ">
             <select name=state id=state>
                 <?php
                    foreach (TaskList::$name as $i) {
                        if ($i == $this->state) {
                            echo "<option value='$i' selected>$i</option>";
                        } else {
                            echo "<option value='$i'>$i</option>";
                        }
                    }
                    ?>
             </select>
             <div style="display:flex; flex-direction:row;gap:5px;">
                 <button type=submit name=change class="save_button">Mentés</button>
             </div>
         </div>
     </form>
 </div>
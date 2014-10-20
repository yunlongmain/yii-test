<div class="panel-main pd10">
    <table class="table table-striped">
        <caption><?=$tableTitle?></caption>
        <thead>
        <tr>
            <?php foreach($this->displayFields as $field) {?>
            <th><?=(empty($this->headDesc[$field]))?$field:$this->headDesc[$field] ?></th>
            <?php } ?>
        </tr>
        </thead>
        <tbody id="table_content">
        <?php foreach ($tableBody as $bodyItem) {
            echo "<tr>";
            foreach ($this->displayFields as $field) { ?>
                <td><?=$bodyItem[$field]?></td>
            <?php
            }
            echo "</tr>";
        }?>
        </tbody>
    </table>

</div>
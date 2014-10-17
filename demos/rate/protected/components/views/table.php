<div class="panel-main pd10">
    <table class="table table-striped" style="table-layout:fixed;word-wrap:break-word">
        <thead>
        <tr>
            <?php foreach($this->displayFields as $field) {?>
            <th><?=(empty($tableHead[$field]))?$field:$tableHead[$field] ?></th>
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
<!--    <div style="margin-top: 10px">-->
<!--        <a class="btn btn-primary" id="btn_choose_all">全选</a>-->
<!--        --><?php //if ($status != Appinfo_model::STATUS_PASSED) { ?>
<!--            <a class="btn btn-primary" id="btn_pass" style="margin-left: 100px">选中的通过,未选中的不通过</a>-->
<!--        --><?php //} else { ?>
<!--            <a class="btn btn-primary" id="btn_output_choose" style="margin-left: 100px">导出所选</a>-->
<!--            <a class="btn btn-primary" id="btn_output_all">导出所有</a>-->
<!--        --><?php //} ?>
<!--    </div>-->
<!--    <div class="list-page pd10">-->
<!--        <div class="i-total">共有相关信息 <b>--><?//= $totle_row ?><!--</b> 条</div>-->
<!--        <div class="i-pager">-->
<!--            --><?php
//            if ($isPagination) {
//                echo $this->pagination->create_links();
//            }
//            ?>
<!--        </div>-->
<!--    </div>-->

</div>
<?php
$this->breadcrumbs=array(
    '结果统计'=>array('admin'),
    $pageName,
);
    $this->widget('RankResult', array(
        'outputData'=>$data,
        'displayFields' => array('teamId','teamDisplayId','teamName','appName','rateValue','rank'),
        'headDesc' => array(
            'teamId' => 'id',
            'teamDisplayId' => '桌号',
            'teamName' => '团队名称',
            'appName' => '作品名称',
            'rateValue' => '总得分',
            'rank' => '排名',
        ),

    ));

?>
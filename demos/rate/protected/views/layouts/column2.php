<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            $configDataMenu = array(
                array('label'=>'比赛', 'url'=>array('contest/admin')),
                array('label'=>'评委', 'url'=>array('rater/admin')),
                array('label'=>'团队', 'url'=>array('team/admin')),
                array('label'=>'评分规则', 'url'=>array('rate/admin')),
            );

            $rateDataMenu = array(
                array('label'=>'结果统计', 'url'=>array('userrate/admin')),
            );

            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'配置数据',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$configDataMenu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();

            $this->beginWidget('zii.widgets.CPortlet', array(
                'title'=>'评分结果',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$rateDataMenu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
    </div>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
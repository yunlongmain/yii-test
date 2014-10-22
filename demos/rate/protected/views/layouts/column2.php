<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="span-18 ">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-6 last">
        <div id="sidebar">
            <?php
            $configDataMenu = array(
                array('label'=>'比赛', 'url'=>array('contest/admin')),
                array('label'=>'评委', 'url'=>array('rater/admin')),
                array('label'=>'团队', 'url'=>array('team/admin')),
                array('label'=>'评分规则', 'url'=>array('rate/admin')),
            );

            $contestsData =Yii::app()->db->createCommand()
                            ->select('id,name')
                            ->from(Contest::model()->tableName())
                            ->queryAll();

            $contestRankLinkItems = array();
            foreach($contestsData as $contest){
                $contestRankLinkItem = array();
                $contestRankLinkItem['label'] = $contest['name'];
                $contestRankLinkItem['url'] = array('rserRate/rank/'.$contest['id']);

                $contestRankLinkItems[] = $contestRankLinkItem;
            }

            $rateDataMenu = array(
                array('label'=>'所有比分', 'url'=>array('userRate/admin')),
                array('label'=>'结果统计', 'items'=>$contestRankLinkItems),
            );

            $this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    array('label' => '配置数据','items' => $configDataMenu),
                    array('label' => '评分结果','items' => $rateDataMenu),
                ),
            ));
            ?>
        </div><!-- sidebar -->
    </div>
<?php $this->endContent(); ?>
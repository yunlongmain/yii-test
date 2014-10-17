<?php

Yii::import('zii.widgets.CPortlet');
Yii::import('application.extensions.array_help',true);


class RankResult extends CPortlet
{
	public $headDesc;
    public $displayFields;
	public $data;
    public $contestId;
    public $outputData;

    public function init(){
        parent::init();

        $this->displayFields = array(
            'teamId','rateValue','rank'
        );

        $this->headDesc = array(
            'teamId' => '团队号',
            'rateValue' => '总得分',
            'rank' => '排名',
        );

        $this->_loadData();
    }

    private function _loadData() {
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('contestId'=>$this->contestId));
        $rateModels = UserRate::model()->findAll($criteria);

        $contestModel = Contest::model()->findByPk($this->contestId);
        $rateRuleArr = explode(",",$contestModel->rateRule);

        $filterSubRateRule = array();//子项的已被加到它的归属项里，所以过滤子项
        $this->outputData = array();

        foreach($rateRuleArr as $rateRuleId)
        {
            $head = array();
            $body = array();

            if(!empty($filterSubRateRule[$rateRuleId])) {
                continue;
            }

            //解析单项评分数据
            $allRateData = array();
            foreach($rateModels as $rateModel) {
                $rateDetail = json_decode($rateModel->rateDetail,true);
                if(!isset($rateDetail[$rateRuleId])){
                    throw new CException('评分id'.$rateRuleId.'在评委id'.$rateModel->raterId.'团队id'.$rateModel->teamId.'中不存在');
                }

                $attributes = $rateModel->attributes;
                $attributes['rateValue'] = $rateDetail[$rateRuleId];

                $subId = Rate::getItem($rateRuleId)->subId;
                if($subId != 0) {
                    if(!isset($rateDetail[$subId])) {
                        throw new CException('子评分id'.$subId.'在评委id'.$rateModel->raterId.'团队id'.$rateModel->teamId.'中不存在');
                    }

                    $attributes['rateValue'] += $rateDetail[$subId];
                }
                $allRateData[] = $attributes;
            }

            //按团队整理分组评分
            $rateDataGroupByTeam = array();
            foreach($allRateData as $rateInfo) {
                $teamId = $rateInfo['teamId'];

                if(empty($rateDataGroupByTeam[$teamId])) {
                    $rateDataGroupByTeam[$teamId] = $rateInfo;
                }else {
                    $rateDataGroupByTeam[$teamId]['rateValue'] += $rateInfo['rateValue'];
                }
            }

            //sort by rate value
            $sort = array();
            foreach($rateDataGroupByTeam as $k=>$v)
            {
                $sort[$k] = $v['rateValue'];
            }
            array_multisort($sort,SORT_DESC,$rateDataGroupByTeam);

            $rateDataGroupByTeam = array_add_rank($rateDataGroupByTeam);

            foreach($this->displayFields as $field){
                $head[$field] = $this->headDesc[$field];
            }

//            var_dump($rateDataGroupByTeam);
//            die('over');

            $this->outputData[] = array(
                'head' => $head,
                'body' => $rateDataGroupByTeam,
            );
        }


//        Yii::log($allData,"info","yl-db");
    }

	protected function renderContent()
	{
        foreach($this->outputData as $data){
            $this->render('table',array(
                'tableHead' => $data['head'],
                'tableBody' => $data['body'],
            ));
        }
	}
}
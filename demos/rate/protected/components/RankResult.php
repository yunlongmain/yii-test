<?php

Yii::import('zii.widgets.CPortlet');


class RankResult extends CPortlet
{
	public $headDesc;
    public $displayFields;
    public $outputData;

	protected function renderContent()
	{
        foreach($this->outputData as $data){
            $this->render('table',array(
                'tableTitle' => $data['title'],
                'tableHead' => $data['head'],
                'tableBody' => $data['body'],
            ));
        }
	}
}
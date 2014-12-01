<?php

class TestController extends Controller
{
	public function actionIndex()
	{
        $this->render('index');
	}

    public function actionInitRbac(){
        Yii::app()->authManager->clearAll();

        Yii::app()->authManager->createRole('rater','评委');
        $role = Yii::app()->authManager->createRole('admin','管理员');
        $role->addChild('rater');
        $role = Yii::app()->authManager->createRole('super_admin','超级管理员');
        $role->addChild('admin');

    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
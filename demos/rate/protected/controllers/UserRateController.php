<?php

Yii::import('application.extensions.array_help',true);

class UserRateController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index','view','update','admin','rank'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('delete'),
                'roles'=>array('super_admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new UserRate;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserRate']))
		{
			$model->attributes=$_POST['UserRate'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['UserRate']))
		{
			$model->attributes=$_POST['UserRate'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('UserRate');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

    public function actionRank($id)
    {
        $criteria = new CDbCriteria();
        $criteria->addColumnCondition(array('contestId'=>$id));
        $rateModels = UserRate::model()->findAll($criteria);
        $criteria->index = "id";
        $teamModels = Team::model()->findAll($criteria);

        $contestModel = Contest::model()->findByPk($id);
        $rateRuleArr = explode(",",$contestModel->rateRule);

        $filterSubRateRule = array();//子项的已被加到它的归属项里，所以过滤子项
        $Data = array();

        foreach($rateRuleArr as $rateRuleId)
        {
            $head = array();

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
                    $filterSubRateRule[$subId] = true;
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

//            add team attribute
            foreach($rateDataGroupByTeam as &$teamRate){
                if(!isset($teamModels[$teamRate['teamId']])) {
                    throw new CException('add team attribute中,teamId'.$teamRate['teamId'].'在teamModel中不存在');
                }
                $teamRate['teamName'] = $teamModels[$teamRate['teamId']]->name;
                $teamRate['appName'] = $teamModels[$teamRate['teamId']]->appName;
                $teamRate['teamDisplayId'] = $teamModels[$teamRate['teamId']]->teamDisplayId;
            }
            unset($teamRate);

            $data[] = array(
                'title' => Rate::getItem($rateRuleId)->name,
                'head' => $head,
                'body' => $rateDataGroupByTeam,
            );
        }


        $this->render('rankResult',array(
            'data' => $data,
            'pageName' => $contestModel->name,
        ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $model=new UserRate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['UserRate']))
			$model->attributes=$_GET['UserRate'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return UserRate the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=UserRate::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param UserRate $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-rate-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php
/* @var $this UserRateController */
/* @var $model UserRate */

$this->breadcrumbs=array(
	'User Rates'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserRate', 'url'=>array('index')),
	array('label'=>'Manage UserRate', 'url'=>array('admin')),
);
?>

<h1>Create UserRate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
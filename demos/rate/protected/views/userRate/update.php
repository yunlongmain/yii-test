<?php
/* @var $this UserRateController */
/* @var $model UserRate */

$this->breadcrumbs=array(
	'User Rates'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserRate', 'url'=>array('index')),
	array('label'=>'Create UserRate', 'url'=>array('create')),
	array('label'=>'View UserRate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserRate', 'url'=>array('admin')),
);
?>

<h1>Update UserRate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
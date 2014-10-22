<?php
/* @var $this UserRateController */
/* @var $model UserRate */

$this->breadcrumbs=array(
	'User Rates'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserRate', 'url'=>array('index')),
	array('label'=>'Create UserRate', 'url'=>array('create')),
	array('label'=>'Update UserRate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserRate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserRate', 'url'=>array('admin')),
);
?>

<h1>View UserRate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'teamId',
		'contestId',
		'raterId',
		'rateDetail',
		'score',
		'valid',
		'ctime',
		'utime',
		'id',
	),
)); ?>

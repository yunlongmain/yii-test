<?php
/* @var $this RaterController */
/* @var $model Rater */

$this->breadcrumbs=array(
	'Raters'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Rater', 'url'=>array('index')),
	array('label'=>'Create Rater', 'url'=>array('create')),
	array('label'=>'Update Rater', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Rater', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rater', 'url'=>array('admin')),
);
?>

<h1>View Rater #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'username',
		'password',
		'role',
		'contestAuth',
		'description',
	),
)); ?>

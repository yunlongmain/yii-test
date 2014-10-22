<?php
/* @var $this RaterController */
/* @var $model Rater */

$this->breadcrumbs=array(
	'Raters'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rater', 'url'=>array('index')),
	array('label'=>'Create Rater', 'url'=>array('create')),
	array('label'=>'View Rater', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Rater', 'url'=>array('admin')),
);
?>

<h1>Update Rater <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
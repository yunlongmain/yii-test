<?php
/* @var $this ContestController */
/* @var $model Contest */

$this->breadcrumbs=array(
	'Contests'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contest', 'url'=>array('index')),
	array('label'=>'Create Contest', 'url'=>array('create')),
	array('label'=>'View Contest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Contest', 'url'=>array('admin')),
);
?>

<h1>Update Contest <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
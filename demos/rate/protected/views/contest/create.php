<?php
/* @var $this ContestController */
/* @var $model Contest */

$this->breadcrumbs=array(
	'Contests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Contest', 'url'=>array('index')),
	array('label'=>'Manage Contest', 'url'=>array('admin')),
);
?>

<h1>Create Contest</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
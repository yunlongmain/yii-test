<?php
/* @var $this RaterController */
/* @var $model Rater */

$this->breadcrumbs=array(
	'Raters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rater', 'url'=>array('index')),
	array('label'=>'Manage Rater', 'url'=>array('admin')),
);
?>

<h1>Create Rater</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
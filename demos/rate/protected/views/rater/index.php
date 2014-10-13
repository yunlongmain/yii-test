<?php
/* @var $this RaterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Raters',
);

$this->menu=array(
	array('label'=>'Create Rater', 'url'=>array('create')),
	array('label'=>'Manage Rater', 'url'=>array('admin')),
);
?>

<h1>Raters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

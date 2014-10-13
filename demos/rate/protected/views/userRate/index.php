<?php
/* @var $this UserRateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Rates',
);

$this->menu=array(
	array('label'=>'Create UserRate', 'url'=>array('create')),
	array('label'=>'Manage UserRate', 'url'=>array('admin')),
);
?>

<h1>User Rates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

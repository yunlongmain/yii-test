<?php
/* @var $this ContestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contests',
);

$this->menu=array(
	array('label'=>'Create Contest', 'url'=>array('create')),
	array('label'=>'Manage Contest', 'url'=>array('admin')),
);
?>

<h1>Contests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

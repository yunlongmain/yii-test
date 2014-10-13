<?php
/* @var $this ContestController */
/* @var $data Contest */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rateRule')); ?>:</b>
	<?php echo CHtml::encode($data->rateRule); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('online')); ?>:</b>
	<?php echo CHtml::encode($data->online); ?>
	<br />


</div>
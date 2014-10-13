<?php
/* @var $this TeamController */
/* @var $data Team */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contestId')); ?>:</b>
	<?php echo CHtml::encode($data->contestId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamDisplayId')); ?>:</b>
	<?php echo CHtml::encode($data->teamDisplayId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appName')); ?>:</b>
	<?php echo CHtml::encode($data->appName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('appDesc')); ?>:</b>
	<?php echo CHtml::encode($data->appDesc); ?>
	<br />


</div>
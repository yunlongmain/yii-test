<?php
/* @var $this UserRateController */
/* @var $data UserRate */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teamId')); ?>:</b>
	<?php echo CHtml::encode($data->teamId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contestId')); ?>:</b>
	<?php echo CHtml::encode($data->contestId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raterId')); ?>:</b>
	<?php echo CHtml::encode($data->raterId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rateDetail')); ?>:</b>
	<?php echo CHtml::encode($data->rateDetail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('score')); ?>:</b>
	<?php echo CHtml::encode($data->score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valid')); ?>:</b>
	<?php echo CHtml::encode($data->valid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ctime')); ?>:</b>
	<?php echo CHtml::encode($data->ctime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('utime')); ?>:</b>
	<?php echo CHtml::encode($data->utime); ?>
	<br />

	*/ ?>

</div>
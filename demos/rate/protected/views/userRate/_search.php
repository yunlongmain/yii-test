<?php
/* @var $this UserRateController */
/* @var $model UserRate */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'teamId'); ?>
		<?php echo $form->textField($model,'teamId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contestId'); ?>
		<?php echo $form->textField($model,'contestId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'raterId'); ?>
		<?php echo $form->textField($model,'raterId',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rateDetail'); ?>
		<?php echo $form->textField($model,'rateDetail',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valid'); ?>
		<?php echo $form->textField($model,'valid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ctime'); ?>
		<?php echo $form->textField($model,'ctime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'utime'); ?>
		<?php echo $form->textField($model,'utime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
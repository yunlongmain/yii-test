<?php
/* @var $this UserRateController */
/* @var $model UserRate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-rate-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'teamId'); ?>
		<?php echo $form->textField($model,'teamId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'teamId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contestId'); ?>
		<?php echo $form->textField($model,'contestId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'contestId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'raterId'); ?>
		<?php echo $form->textField($model,'raterId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'raterId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rateDetail'); ?>
		<?php echo $form->textField($model,'rateDetail',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rateDetail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'score'); ?>
		<?php echo $form->textField($model,'score'); ?>
		<?php echo $form->error($model,'score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valid'); ?>
		<?php echo $form->textField($model,'valid'); ?>
		<?php echo $form->error($model,'valid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ctime'); ?>
		<?php echo $form->textField($model,'ctime'); ?>
		<?php echo $form->error($model,'ctime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'utime'); ?>
		<?php echo $form->textField($model,'utime'); ?>
		<?php echo $form->error($model,'utime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
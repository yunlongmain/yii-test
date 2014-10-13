<?php
/* @var $this TeamController */
/* @var $model Team */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'team-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'contestId'); ?>
		<?php echo $form->textField($model,'contestId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'contestId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'teamDisplayId'); ?>
		<?php echo $form->textField($model,'teamDisplayId',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'teamDisplayId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'appName'); ?>
		<?php echo $form->textField($model,'appName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'appName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'appDesc'); ?>
		<?php echo $form->textField($model,'appDesc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'appDesc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
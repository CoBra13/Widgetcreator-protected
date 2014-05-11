<?php
/* @var $this GroupsController */
/* @var $model Groups */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'groups-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'project_id'); ?>
		<?php echo $form->textField($model,'project_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'project_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_nr'); ?>
		<?php echo $form->textField($model,'group_nr',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'group_nr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'group_name'); ?>
		<?php echo $form->textField($model,'group_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'group_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
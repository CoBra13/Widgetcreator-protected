<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'milestone-set',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->dropDownList($model,'percent', array(0 => '0%', 20 => '20%', 40 => '40%', 60 => '60%', 80 => '80%', 100 => '100%'),array('onchange'=>'this.form.submit()')); ?>
	</div>

	<div class="row buttons" style='display:none'>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --> 

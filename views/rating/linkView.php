<div class="form">


<?php 
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'rating-linkView',
	'enableAjaxValidation'=>false,
	)); 
?>


	<div class="row">
		<?php
		echo CHtml::TextArea('Inline_Link',$link,array(
								'id'=>'idTextarea1',
								'onclick'=>'this.select();',
								'rows'=>2,
								'cols'=>80));
		?>
	
	</div>


	<div class="row buttons">
		<?php 
		echo (CHtml::Button('Close Window', array(
											'id'=>'idButton01',
											'onclick'=>'window.close();')));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

	
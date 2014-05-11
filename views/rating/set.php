<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wrating-set',
	'enableAjaxValidation'=>false,
)); ?>
    

	<div class=row>
	
    	<?php 

		//corresponding group_id to the id
		$group=$model->group_id; 
			
		//corresponding type to the id
		$type=$model->type;      
			
		//all relevant ratings are searched
		//returns an array: array[0]=number of votes; array[1]=average of votes
		$ratings=$this->getRatings($group,$type);	
		
		//CStarRating is a widget from the internet	
          	$this->widget('CStarRating',array(
			    'name'=>'rating'.$model->id,
                'starCount'=>5,
                'readOnly'=>false,
				'allowEmpty'=>false,
                'resetText'=>'',
				'callback'=>'
				 // updates the div with the new rating info, displays a message for 5 seconds and makes the //widget readonly
                   function(){
                   url = "/index.php/Rating/rating";
                   jQuery.getJSON(url, {group_id: '.$model->group_id.',type: '.$model->type.', val: $(this).val()}, function(data) {
                   if (data.status == "success"){
										
                                        $("#rating_success_'.$model->id.'").html(data.div);
                                        $("#rating_success_'.$model->id.'").fadeIn("slow");               
                                        var pause = setTimeout("$(\"#rating_success_'.$model->id.'\").fadeOut(\"slow\")",5000);
                                        $("#rating_info_'.$model->id.'").html(data.info);
                                        $("input[id*='.$model->id.'_]").rating("readOnly",true);
										
                                        }
                                });}',
				
            ));
         ?>
        
    </div>
	
	
	<?php echo('<div style="font-family:Arial;font-size:small" id="rating_info_'.$model->id.'"/div>'); ?>
        <?php 



//this is the shown message below the starrating
		$a=$this->getRatings($group,$type);
		echo ('<span style="font-family:Arial;font-size:small"><br>&nbsp&nbsp&nbsp&nbsp'. $a[0] .' votes</span>');
		//echo ("<br>Rating: <b>" . $ratings[1] ."</b> (" . $ratings[0] . " votes)");
		

		 ?>
    </div>
	<?php echo('<div style="font-family:Arial;font-size:small" id="rating_success_'.$model->id.'"/div>'); ?></div> <!-- the div in which the confirmation message is shown-->

	<div class="row buttons"style='display:none'>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form --> 


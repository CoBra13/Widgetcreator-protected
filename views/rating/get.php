<div class="form">

<style type="text/css">
body {
  cursor: default;
}
</style>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rating-get',
	'enableAjaxValidation'=>false,
)); ?>
    

		
		<?php 

// Every rating is saved as a new post in the database. So if we want to show the rating of a group, we have to search all relevant ratings in the database. 
        
	
		//corresponding group_id to the id
		$group=$model->group_id; 
			
		//corresponding type to the id
		$type=$model->type;      
			
		//all relevant ratings are searched
		$ratings=$this->getRatings($group,$type);
			
		//all relevant ratings are searched
		//returns an array: array[0]=number of votes; array[1]=average of votes
		$ratings=$this->getRatings($group,$type);	
		
			
		//CStarRating is a widget from the internet				
		$this->widget('CStarRating',array(
			'name'=>'rating'.$model->id,
            'readOnly'=>true,
			'value'=>$ratings[1],
            'resetText'=>'',
										 ));				
         ?>
        


   
		
	    <?php 
		//this is the shown message below the starrating
		$a=$this->getRatings($group,$type);
		echo ('<span style="font-family:Arial;font-size:small"><br>&nbsp&nbsp&nbsp&nbsp'. $a[0] . ' votes</span>' );
		?>

<?php $this->endWidget(); ?>

</div><!-- form --> 


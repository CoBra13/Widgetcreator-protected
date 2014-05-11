<div class="form">
<style type="text/css">
.mytable {
  font-family:"Arial";
  border:1px #000 solid;
  border-collapse:collapse;
  table-layout:auto;
  padding:5px;
}
.tcol1 { background-color:#CCCCCC; text-align:center;font-weight:bold;}
.tcol2 { background-color:#DDDDDD; text-align:center;font-weight:normal;}
.tcol3 { background-color:#FFFFFF; text-align:center; font-size:small;font-weight:normal;}
</style>


<?php 
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-arrlview',
	'enableAjaxValidation'=>false,
	)); 
 
	//read data from Database
	$Daten = $this->getData($model->id);

	//sort data 
	usort($Daten,"custom_sort");
		function custom_sort($a,$b)
		{
		return $a['milestone0']<$b['milestone0'];
		}
?>
	
	
<table class="mytable">
	<?php
	if ($model->poscount == 4)
	{
		echo('<tr><th colspan=7 class="tcol1 mytable">'.$model->name.'</th></tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Bereich</td>');
		echo('    <th           class="tcol2 mytable">Konzept</td>');
		echo('    <th           class="tcol2 mytable">Konzept</td>');
		echo('    <th           class="tcol2 mytable">Konzept</td>');
		echo('    <th           class="tcol2 mytable">Projekt</td>');
		echo('    <th           class="tcol2 mytable">Projekt</td>');
		echo('    <th           class="tcol2 mytable">Projekt</td>');
		echo('</tr>');
		
		//hardcoded
		echo('<tr>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Gruppe', array('submit' => array('projects/sortable_names/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Bewertung', array('submit' => array('projects/sortable_r0/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Meilenstein', array('submit' => array('projects/sortable_m0/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Link', array('submit' => array('projects/sortable_names/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Bewertung', array('submit' => array('projects/sortable_r1/'.(($model->id)),))); 
		echo('</td>');
	
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Meilenstein', array('submit' => array('projects/sortable_m1/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Link', array('submit' => array('projects/sortable_names/'.(($model->id)),))); 
		echo('</td>');
		
		echo('</tr>');
		
		for($i=0; $i < $model->groupcount ; $i++)
		{
		echo('<tr>');
		echo('<th class="tcol2 mytable">'.$Daten[$i]['names'].'</td>');
		
		echo('<th class="tcol3 mytable">');
		echo($Daten[$i]['rating0'].' /10');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo($Daten[$i]['milestone0'].' %');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo('<a href='.$Daten[$i]['link0'].$Daten[$i]['names'].'>Link</a>');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo($Daten[$i]['rating1'].' /10');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo($Daten[$i]['milestone1'].' %');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo('<a href='.$Daten[$i]['link1'].$Daten[$i]['names'].'>Link</a>');
		
		echo('</th>');
		echo('</tr>');
		
		}
	}
	else
	{
		echo('<tr><th colspan=5 class="tcol1 mytable">'.$model->name.'</th></tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Bereich</td>');
		echo('    <th           class="tcol2 mytable">Konzept</td>');
		echo('    <th           class="tcol2 mytable">Konzept</td>');
		echo('    <th           class="tcol2 mytable">Projekt</td>');
		echo('    <th           class="tcol2 mytable">Projekt</td>');
		echo('</tr>');
		
		//hardcoded
		echo('<tr>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Gruppe', array('submit' => array('projects/sortable_names/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Bewertung', array('submit' => array('projects/sortable_r0/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Link', array('submit' => array('projects/sortable_names/'.(($model->id)),))); 
		echo('</td>');
		
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Bewertung', array('submit' => array('projects/sortable_r1/'.(($model->id)),))); 
		echo('</td>');
	
		echo('<th class="tcol2 mytable">');
		echo CHtml::button('Link', array('submit' => array('projects/sortable_names/'.(($model->id)),))); 
		echo('</td>');
		
		echo('</tr>');
		
		for($i=0; $i < $model->groupcount ; $i++)
		{
		echo('<tr>');
		echo('<th class="tcol2 mytable">'.$Daten[$i]['names'].'</td>');
		
		echo('<th class="tcol3 mytable">');
		echo($Daten[$i]['rating0'].' /10');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo('<a href='.$Daten[$i]['link0'].$Daten[$i]['names'].'>Link</a>');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo($Daten[$i]['rating1'].' /10');
		
		echo('</th>');
		echo('<th class="tcol3 mytable">');
		echo('<a href='.$Daten[$i]['link1'].$Daten[$i]['names'].'>Link</a>');
		
		echo('</th>');
		echo('</tr>');
		
		}
	}
	?>
	

<?php $this->endWidget(); ?>

</div><!-- form -->

	
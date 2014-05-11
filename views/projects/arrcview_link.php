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
?>


<?php 
	$groups=$this->getGroups($model->id);
	$names=$this->getNames($model->id);
	$ratings_0=$this->getAverage0($groups,$model->id);
	$milestone_0=$this->getMilestone0($groups,$model->id);
	$ratings_1=$this->getAverage1($groups,$model->id);
	$milestone_1=$this->getMilestone1($groups,$model->id);
	$medpaed[0]="http://phbern-is1-medpaed.wikispaces.com/Konzept+";
	$medpaed[1]="http://phbern-is1-medpaed.wikispaces.com/Projekt+";
?>


	<table class="mytable">
	<?php
	if ($model->poscount == 4)
	{
		echo('<tr><th colspan=7 class="tcol1 mytable">'.$model->name.'</th></tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Bereich</th>');
		echo('    <th           class="tcol2 mytable">Konzept</th>');
		echo('    <th           class="tcol2 mytable">Konzept</th>');
		echo('    <th           class="tcol2 mytable">Konzept</th>');
		echo('    <th           class="tcol2 mytable">Projekt</th>');
		echo('    <th           class="tcol2 mytable">Projekt</th>');
		echo('    <th           class="tcol2 mytable">Projekt</th>');
		echo('</tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Typ</th>');
		echo('    <th           class="tcol2 mytable">Bewertung</th>');
		echo('    <th           class="tcol2 mytable">Meilenstein</th>');
		echo('    <th           class="tcol2 mytable">Link</th>');
		echo('    <th           class="tcol2 mytable">Bewertung</th>');
		echo('    <th           class="tcol2 mytable">Meilenstein</th>');
		echo('    <th           class="tcol2 mytable">Link</th>');
		echo('</tr>');
		
		for($i=0; $i < $model->groupcount ; $i++)
		{
		echo('<tr>');
		echo('<td class="tcol2 mytable">'.$names[$i]['group_name'].'</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($ratings_0[$i]['rating_0'].' /10');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($milestone_0[$i]['percent'].' %');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo('<a href='.$medpaed[0].$names[$i]['group_name'].'>Link</a>');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($ratings_1[$i]['rating_1'].' /10');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($milestone_1[$i]['percent'].' %');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo('<a href='.$medpaed[1].$names[$i]['group_name'].'>Link</a>');
		echo('</td>');
		
		echo('</tr>');
		
		}
	}
	else
	{
		echo('<tr><th colspan=5 class="tcol1 mytable">'.$model->name.'</th></tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Bereich</th>');
		echo('    <th           class="tcol2 mytable">Konzept</th>');
		echo('    <th           class="tcol2 mytable">Konzept</th>');
		echo('    <th           class="tcol2 mytable">Projekt</th>');
		echo('    <th           class="tcol2 mytable">Projekt</th>');
		echo('</tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Typ</th>');
		echo('    <th           class="tcol2 mytable">Bewertung</th>');
		echo('    <th           class="tcol2 mytable">Link</th>');
		echo('    <th           class="tcol2 mytable">Bewertung</th>');
		echo('    <th           class="tcol2 mytable">Link</th>');
		echo('</tr>');
		
		for($i=0; $i < $model->groupcount ; $i++)
		{
		echo('<tr>');
		echo('<td class="tcol2 mytable">'.$names[$i]['group_name'].'</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($ratings_0[$i]['rating_0'].' /10');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo('<a href='.$medpaed[0].$names[$i]['group_name'].'>Link</a>');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($ratings_1[$i]['rating_1'].' /10');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo('<a href='.$medpaed[1].$names[$i]['group_name'].'>Link</a>');
		echo('</td>');
		
		echo('</tr>');
		
		}
	}
	?>


<?php $this->endWidget(); ?>

</div><!-- form -->

	
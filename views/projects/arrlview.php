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
?>


	<table class="mytable">
	<?php
	if ($model->poscount == 4)
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
		echo('    <th           class="tcol2 mytable">Typ			</th>');
		echo('    <th           class="tcol2 mytable">Bewertung		</th>');
		echo('    <th           class="tcol2 mytable">Meilenstein	</th>');
		echo('    <th           class="tcol2 mytable">Bewertung		</th>');
		echo('    <th           class="tcol2 mytable">Meilenstein	</th>');
		echo('</tr>');
		
		for($i=0; $i < $model->groupcount ; $i++)
		{
		echo('<tr>');
		echo('<td class="tcol2 mytable">'.$names[$i]['group_name'].'</td>');
		
		echo('<td class="tcol3 mytable">');
		echo(CHtml::link('Link',array('rating/linkView/'.($groups[$i]*2-1)),array('target'=>'_blank')));
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo(CHtml::link('Link',array('milestone/linkView/'.($groups[$i]*2-1)),array('target'=>'_blank')));
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo(CHtml::link('Link',array('rating/linkView/'.($groups[$i]*2)),array('target'=>'_blank')));
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo(CHtml::link('Link',array('milestone/linkView/'.($groups[$i]*2)),array('target'=>'_blank')));
		echo('</td>');

		echo('</tr>');
		}
	}
	else
	{
		echo('<tr><th colspan=3 class="tcol1 mytable">'.$model->name.'</th></tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Bereich</th>');
		echo('    <th           class="tcol2 mytable">Konzept</th>');
		echo('    <th           class="tcol2 mytable">Projekt</th>');
		echo('</tr>');
		
		//hardcoded
		echo('<tr>');
		echo('    <th           class="tcol2 mytable">Typ</th>');
		echo('    <th           class="tcol2 mytable">Bewertung</th>');
		echo('    <th           class="tcol2 mytable">Bewertung</th>');
		echo('</tr>');
		
		for($i=0; $i < $model->groupcount ; $i++)
		{
		echo('<tr>');
		echo('<td class="tcol2 mytable">'.$names[$i]['group_name'].'</td>');
		
		echo('<td class="tcol3 mytable">');
		echo(CHtml::link('Link',array('rating/linkView/'.($groups[$i]*2-1)),array('target'=>'_blank')));
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo(CHtml::link('Link',array('rating/linkView/'.($groups[$i]*2)),array('target'=>'_blank')));
		echo('</td>');

		echo('</tr>');
		}
	}
	?>	

<?php $this->endWidget(); ?>


<?php 
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-arrlview',
	'enableAjaxValidation'=>false,
	)); 
?>
<?php

echo ('<h1 style="color:purple"> iFrame-Angabe f&uumlr das Metawidget </h1>');

	
	$iFrame = $this->getiFrame($model->id);
	
	echo CHtml::TextArea('Inline_Link',$iFrame,array(
								'id'=>'idTextarea1',
								'onclick'=>'this.select();',
								'rows'=>2,
								'cols'=>80));
	echo('<br><br><br>');
	

	 $this->endWidget(); ?>

</div><!-- form -->

<div>
<?php 

?>
</div>



	
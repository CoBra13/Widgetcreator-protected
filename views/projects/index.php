<?php
/* @var $this ProjectsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Projects',
);

$this->menu=array(
	array('label'=>'Create Projects', 'url'=>array('create')),
	array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>
<br><br>
<h2>iFrame-Angaben f&uumlr die &Uumlbersicht </h2>

<?php
//read data from Database
	
	$Daten1 = $this->loadModel(1)->groupcount;
	$Daten2 = $this->loadModel(2)->groupcount;
	$Daten3 = $this->loadModel(3)->groupcount;
	$Daten4 = $this->loadModel(4)->groupcount;
	$Daten5 = $this->loadModel(5)->groupcount;
	$Anzahl =  $Daten1 + $Daten2 + $Daten3 + $Daten4 + $Daten5;
	$width= (123 + ((4)*143));
	$height = (122 + (($Anzahl)*57));
		
echo CHtml::TextArea('Inline_Link','<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable_all/1" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>',array(
								'id'=>'idTextarea1',
								'onclick'=>'this.select();',
								'rows'=>2,
								'cols'=>80));

?>
<br><br><br><br>
<h1> Ansicht 100 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(1.0); transform-origin: 0 0; -ms-transform: scale(1.0); -ms-transform-origin: 0 0; -webkit-transform: scale(1.0); -webkit-transform-origin: 0 0;"></iframe>
<br><br>
<h1> Ansicht 95 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(0.95); transform-origin: 0 0; -ms-transform: scale(0.95); -ms-transform-origin: 0 0; -webkit-transform: scale(0.95); -webkit-transform-origin: 0 0;"></iframe>
<br><br>
<h1> Ansicht 90 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(0.9); transform-origin: 0 0; -ms-transform: scale(0.9); -ms-transform-origin: 0 0; -webkit-transform: scale(0.9); -webkit-transform-origin: 0 0;"></iframe>
<br><br>
<h1> Ansicht 85 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(0.85); transform-origin: 0 0; -ms-transform: scale(0.85); -ms-transform-origin: 0 0; -webkit-transform: scale(0.85); -webkit-transform-origin: 0 0;"></iframe>
<br><br>
<h1> Ansicht 80 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(0.8); transform-origin: 0 0; -ms-transform: scale(0.8); -ms-transform-origin: 0 0; -webkit-transform: scale(0.8); -webkit-transform-origin: 0 0;"></iframe>
<br><br>
<h1> Ansicht 75 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(0.75); transform-origin: 0 0; -ms-transform: scale(0.75); -ms-transform-origin: 0 0; -webkit-transform: scale(0.75); -webkit-transform-origin: 0 0;"></iframe>
<br><br>
<h1> Ansicht 70 % </h1>
<iframe src="http://www.phwidgets.acht04.ch/index.php/projects/sortable/1" style="width:695px ; height:521px ; frameborder:1; transform: scale(0.7); transform-origin: 0 0; -ms-transform: scale(0.7); -ms-transform-origin: 0 0; -webkit-transform: scale(0.7); -webkit-transform-origin: 0 0;"></iframe>
<br><br>




<h1>Projects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<div class="form">
<style type="text/css">
.mytable {
  font-family:"Arial";
  border:1px #000 solid;
  border-collapse:collapse;
  table-layout:auto;
  cursor: default;
}
.tcol1 { background-color:#CCCCCC; text-align:center;font-weight:bold; padding:5px}
.tcol2 { background-color:#DDDDDD; text-align:center;font-weight:normal;font-size:15px;padding:5px}
.tcol3 { background-color:#FFFFFF; text-align:center; font-size:small;font-weight:normal;padding:0px}



.myButton {
        
        background-color:#DDDDDD;
        border:0px solid #DDDDDD;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
        
        display:inline-block;
        font-family:arial;
        font-size:15px;
        font-weight:normal;
        padding:2px 5px;
        text-decoration:none;

    }

.myButton:hover {
        
        background-color:#f6f6f6;
    }

</style>

	
<?php 
	$form=$this->beginWidget('CActiveForm', array(
	'id'=>'projects-arrlview',
	'enableAjaxValidation'=>false,
	)); 
?>
<form action="sortable.php" method="post">
<?php 

	
	//read data from Database
	$Daten1 = $this->getData($model->id);
	$Daten2 = $this->getData(($model->id)+1);
	$Daten3 = $this->getData(($model->id)+2);
	$Daten4 = $this->getData(($model->id)+3);
	$Daten5 = $this->getData(($model->id)+4);
	$Daten = array_merge($Daten1, $Daten2,$Daten3,$Daten4,$Daten5);
	$Anzahl = count($Daten);
	

	//sort_column is a variable, saying what should be sorted
	$sort_column = 0;
	if(isset($_POST['foo']))
		$sort_column = $_POST['foo'];	
		
	//sort data
	if($sort_column == 0)
	{
	function custom_sort($a,$b)
		{
		return $a['names']>$b['names'];
		}
	}
	
	if($sort_column == 1)
	{
	function custom_sort($a,$b)
		{
		return $a['names']>$b['names'];
		}
	}
	
	else if($sort_column == 2)
	{
		function custom_sort($a,$b)
			{
			$retval = strnatcmp($b['rating0'],$a['rating0']);
			if(!$retval) return strnatcmp($b['rating0_number'],$a['rating0_number']);
			return $retval;
			}
	}
	
	else if($sort_column == 3)
	{
	function custom_sort($a,$b)
		{
			$retval = strnatcmp($b['milestone0'],$a['milestone0']);
			if(!$retval)
				{
				$retval1=strnatcmp($b['rating0'],$a['rating0']);
				if(!$retval1) return strnatcmp($b['rating0_number'],$a['rating0_number']);
				return $retval1;
				}
			return $retval;

		}
	}
	
		
	else if($sort_column == 5)
	{
	function custom_sort($a,$b)
			{
			$retval = strnatcmp($b['rating1'],$a['rating1']);
			if(!$retval) return strnatcmp($b['rating1_number'],$a['rating1_number']);
			return $retval;
			}

	}
	
	else if($sort_column == 6)
	{
	function custom_sort($a,$b)
		{
			$retval = strnatcmp($b['milestone1'],$a['milestone1']);
			if(!$retval)
				{
				$retval1=strnatcmp($b['rating1'],$a['rating1']);
				if(!$retval1) return strnatcmp($b['rating1_number'],$a['rating1_number']);
				return $retval1;
				}
			return $retval;

		}
	}
	
	
	//sort $Daten
	usort($Daten,"custom_sort");
	
?>
	
	<table class="mytable">
	<?php
	
		echo('<tr><th colspan=7 class="tcol1 mytable">&Uumlbersicht</th></tr>');
		
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
		
		echo('<th class="tcol2 mytable">');
		echo('<button class="mybutton" type="submit" name="foo" value="1" >Gruppe</button>');
		echo('</th>');
		
		echo('<th class="tcol2 mytable">');
		echo('<button class="mybutton" type="submit" name="foo" value="2" >Bewertung</button>');
		echo('</th>');
		
		echo('<th class="tcol2 mytable">');
		echo('<button class="mybutton" type="submit" name="foo" value="3" >Fortschritt</button>');
		echo('</th>');
		
		echo('<th class="tcol2 mytable">');
		echo('Link');
		echo('</th>');
		
		echo('<th class="tcol2 mytable">');
		echo('<button class="mybutton" type="submit" name="foo" value="5" >Bewertung</button>');
		echo('</th>');
	
		echo('<th class="tcol2 mytable">');
		echo('<button class="mybutton" type="submit" name="foo" value="6" >Fortschritt</button>');
		echo('</th>');
		
		echo('<th class="tcol2 mytable">');
		echo('Link');
		echo('</th>');
		
		echo('</tr>');
		
		for($i=0; $i < $Anzahl ; $i++)
		{
		echo('<tr>');
		echo('<td class="tcol2 mytable">'.$Daten[$i]['names'].'</td>');
		
		echo('<td class="tcol3 mytable">');
		//URL automatisch erstellen & rating/get & Nr. anhand von $Daten[$i]['group_nr']*2-1
		echo('<iframe src="'.$this->getLink0($Daten[$i]['group_nr']).'" width="110" height="56" frameborder="0"></iframe>');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($Daten[$i]['milestone0'].' %');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo('<a style="text-decoration:none" target="_blank" 
				href='.$Daten[$i]['link0'].$Daten[$i]['names'].'>&nbsp&nbsp Konzept &#x25BA &nbsp&nbsp</a>');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		//URL automatisch erstellen & rating/get & Nr. anhand von $Daten[$i]['group_nr']*2
		echo('<iframe src="'.$this->getLink1($Daten[$i]['group_nr']).'" width="110" height="56" frameborder="0"></iframe>');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo($Daten[$i]['milestone1'].' %');
		echo('</td>');
		
		echo('<td class="tcol3 mytable">');
		echo('<a style="text-decoration:none" target="_blank" 
				href='.$Daten[$i]['link1'].$Daten[$i]['names'].'>&nbsp&nbsp Projekt &#x25BA &nbsp&nbsp</a>');
		echo('</td>');
		
		echo('</tr>');
		
		}
	
	
	?>
	</form>
	
<?php $this->endWidget(); ?>

</div><!-- form -->

	
<div class="view">
<?php $height=50; $width=40; $top=5; $left=5; $borderradius=5; ?>
<style type="text/css">
<!--
div.box_frame {
  position: absolute;
  left: <?php echo $left."px;";  ?>
  top:  <?php echo $top."px;";  ?>
  width:  <?php echo $width."px;";  ?>
  height:  <?php echo $height."px;";  ?>
  border-radius:  <?php echo $borderradius."px;";  ?>
  border: 1px solid #000000;
  text-align: center;
  font-family:"Arial"
  font-size:0.875em;
}
div.box_bar {
  position: absolute;
  left: <?php echo $left."px;";  ?>
  top: <?php echo ($height+$top-($model->percent/100*$height))."px;";  ?>
  width: <?php echo $width."px;";  ?>
  height: <?php echo ($model->percent/100*$height)."px;";  ?>
  border-radius:  <?php echo $borderradius."px;";  ?>
  background-color: #00ff00;
  border: 1px solid #000000;
}
-->
</style>
<div class="box_bar"></div>
<div class="box_frame"><?php echo $model->percent." %"; ?></div>
</div><!-- form --> 

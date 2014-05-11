<?php

class ProjectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','arrlview','arrcview','arrcview_link','sortable','sortable_all'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}







	/* selfdefined function to find all correspondig groups to a project */
	public function getGroups($id)
	{
	$model=$this->loadModel($id);
	$pre_groups = Yii::app()->db->createCommand()
		->select('id')
		->from('tbl_groups')
		->where("project_id='$id'")
		->queryAll();
	for ($i=0; $i < $model->groupcount ; $i++)
		$groups[$i]=$pre_groups[$i]['id'];
	return $groups;
	}
	
	/* selfdefined function to find all corresponding groupnames to a project */
	public function getNames($id)
	{
	$names = Yii::app()->db->createCommand()
		->select('group_name')
		->from('tbl_groups')
		->where("project_id='$id'")
		->queryAll();
	return $names;
	}
	
	/* selfdefined */
	/* fuction to find all correspondig average ratings to a project */
	public function getAverage0($groups,$id)
	{
		$model=$this->loadModel($id);
	//	$average_0=array();
		for($i=0; $i < $model->groupcount ; $i++)
		{
			$group_id=$groups[$i];
			//$ratings=array();
			$ratings = Yii::app()->db->createCommand()
				->select('rating')
				->from('tbl_rating')
				->where("group_id='$group_id' AND type='0'")
				->queryAll();
			//number of ratings (1 rating with value 0 is set by default)
			$number=count($ratings)-1;
			//total of all ratings
			$total=0;
			for($j=0; $j < count($ratings) ; $j++) {
				$total=$total+$ratings[$j]['rating'];
			}
			
			//value of the average rating 
			$average=0;
			if ($number==0)
				$average=0;
			else
				$average=round($total/$number,0);
			$ratings_0[$i]=array('rating_0'=>$average);
		}
		return $ratings_0;
	}


	/* selfdefined */
	/* function to find all correspondig milestone to a project */
	public function getMilestone0($groups,$id)
	{
		$model=$this->loadModel($id);
		for($i=0; $i < $model->groupcount ; $i++)
		{
			$group_id=$groups[$i];
			$milestone = Yii::app()->db->createCommand()
				->select('percent')
				->from('tbl_milestone')
				->where("group_id='$group_id' AND type='0'")
				->queryAll();
			$milestone_0[$i]=$milestone[0];
		}
		return $milestone_0;			
	}


	/* selfdefined */
	/* fuction to find all correspondig average ratings to a project */
	public function getAverage1($groups,$id)
	{
		$model=$this->loadModel($id);
		//$average_1=array();
		for($i=0; $i < $model->groupcount ; $i++)
		{
			$group_id=$groups[$i];
			//$ratings=array();
			$ratings = Yii::app()->db->createCommand()
				->select('rating')
				->from('tbl_rating')
				->where("group_id='$group_id' AND type='1'")
				->queryAll();
			//number of ratings (1 rating with value 0 is set by default)
			$number=count($ratings)-1;
			//total of all ratings
			$total=0;
			for($j=0; $j < count($ratings) ; $j++) {
				$total=$total+$ratings[$j]['rating'];
			}
			
			//value of the average rating 
			$average=0;
			if ($number==0)
				$average=0;
			else
				$average=round($total/$number,0);
			$ratings_1[$i]=array('rating_1'=>$average);
		}
		return $ratings_1;
	}


	/* selfdefined */
	/* function to find all correspondig milestone to a project */
	public function getMilestone1($groups,$id)
	{
		$model=$this->loadModel($id);
		for($i=0; $i < $model->groupcount ; $i++)
		{
			$group_id=$groups[$i];
			$milestone = Yii::app()->db->createCommand()
				->select('percent')
				->from('tbl_milestone')
				->where("group_id='$group_id' AND type='1'")
				->queryAll();
			$milestone_1[$i]=$milestone[0];
		}
		return $milestone_1;			
	}
	
	
	/* selfdefined */
	/* fuction to find number of ratings to a Konzept=0, or a Projekt=1 */
	public function getNumber($groups,$id,$widget_id)
	{
		$model=$this->loadModel($id);
		//$average_1=array();
		for($i=0; $i < $model->groupcount ; $i++)
		{
			$group_id=$groups[$i];
			//$ratings=array();
			$ratings = Yii::app()->db->createCommand()
				->select('rating')
				->from('tbl_rating')
				->where("group_id='$group_id' AND type=".$widget_id."")
				->queryAll();
			//number of ratings (1 rating with value 0 is set by default)
			$number[$i]=array('number'=> (count($ratings)-1));
		}
		return $number;
	}

	
	
	/* selfdefined */
	public function actionArrlview($id)
	{
		$model=$this->loadModel($id);
		$this->renderpartial('arrlview',array('model'=>$model),false,true);
	}	


	/* selfdefined */
	public function actionArrcview($id)
	{
		$model=$this->loadModel($id);
		$this->renderpartial('arrcview',array('model'=>$model),false,true);
	}

	/* selfdefined */
	public function actionArrcview_link($id)
	{
		$model=$this->loadModel($id);
		$this->renderpartial('arrcview_link',array('model'=>$model),false,true);
	}
	
	/* selfdefined */
	public function actionSortable($id)
	{
		$model=$this->loadModel($id);
		$this->renderpartial('sortable',array('model'=>$model),false,true);
	}
	
	/* selfdefined */
	public function actionSortable_all($id)
	{
		$model=$this->loadModel($id);
		$this->renderpartial('sortable_all',array('model'=>$model),false,true);
	}
		
	/* selfdefined */
	public function getData($id)
	{
	$model=$this->loadModel($id);
	$groups=$this->getGroups($model->id);
	$names=$this->getNames($model->id);
	$ratings_0=$this->getAverage0($groups,$model->id);
	$milestone_0=$this->getMilestone0($groups,$model->id);
	$ratings_1=$this->getAverage1($groups,$model->id);
	$milestone_1=$this->getMilestone1($groups,$model->id);
	$medpaed[0]="http://phbern-is1-medpaed.wikispaces.com/Konzept+";
	$medpaed[1]="http://phbern-is1-medpaed.wikispaces.com/Projekt+";
	$rating0_number=$this->getNumber($groups,$model->id,0);
	$rating1_number=$this->getNumber($groups,$model->id,1);
	
	for( $i=0; $i < $model->groupcount ; $i++)
	{
	$Daten[$i]['names']=$names[$i]['group_name'];
	$Daten[$i]['rating0']=$ratings_0[$i]['rating_0'];
	$Daten[$i]['milestone0']=$milestone_0[$i]['percent'];
	$Daten[$i]['link0']=$medpaed[0];
	$Daten[$i]['rating1']=$ratings_1[$i]['rating_1'];
	$Daten[$i]['milestone1']=$milestone_1[$i]['percent'];
	$Daten[$i]['link1']=$medpaed[1];
	$Daten[$i]['group_nr']=$groups[$i];
	$Daten[$i]['rating0_number']=$rating0_number[$i]['number'];
	$Daten[$i]['rating1_number']=$rating1_number[$i]['number'];
	}
	
	return $Daten;
	}
	
	/* selfdefined */
	/* function to greate a link to the rating/get site */
	function getLink0($var)
	{
		$_link = Yii::app()->createAbsoluteUrl(
					"rating/get/".(($var*2)-1));
		return $_link;
	}
	
	/* selfdefined */
	/* function to create a link to the rating/get site */
	function getLink1($var)
	{
		$_link = Yii::app()->createAbsoluteUrl(
					"rating/get/".($var*2));
		return $_link;
	}

	/* selfdefined */
	/* function to create the iframe code for the metawidget */
	function getiFrame($id)
	{
		$model=$this->loadModel($id);
		$_link = Yii::app()->createAbsoluteUrl("projects/sortable/".$id);
		if (($model->poscount)==2)
		{
		$width= (80 + (($model->poscount)*195));
		}
		else
		$width= (123 + (($model->poscount)*143));
		$height = (122 + (($model->groupcount)*57));
		$link = '<iframe src="'.$_link.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
		return $link;
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Projects;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Projects']))
		{
			$model->attributes=$_POST['Projects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Projects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Projects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Projects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

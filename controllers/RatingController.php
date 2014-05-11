<?php

class RatingController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	* The function getRatings(....) searches to a given rating_ID all corresponding rows in
	* tbl_rating (rows with same group_id and same type)
	* The function calculates the number of ratings and the average rating.
	*/
	
		
	public function getRatings($group_id,$type)
	{
	$ratings = Yii::app()->db->createCommand()
		->select('rating')
		->from('tbl_rating')
		->where("group_id='$group_id' AND type='$type'")
		->queryAll();
	
		//number of ratings (1 rating with value 0 is set by default)
		$number=count($ratings)-1;
			
		//total of all ratings
		$total=0;
		for($i=0; $i < count($ratings) ; $i++) {
		$total=$total+$ratings[$i]['rating'];
		}
			
		//value of the average rating 
		$average=0;
		if ($number==0)
			$average=0;
		else
			$average=round($total/$number,0);
			
		return array($number,$average);

	}
	
	
	
	

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
				'actions'=>array('index','view','get','set','rating','linkView'),
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

	/* selfdefined function */
	public function actionGet($id)
	{
		$model=$this->loadModel($id);
		$this->renderpartial('get',array('model'=>$model),false,true);
	}
	
	/*selfdefined function */
	public function actionSet($id)
	{
		$model=$this->loadModel($id);
		$this->renderPartial('set',array('model'=>$model),false,true);
	}

	/*selfdefined function */
	public function actionRating()
		{
			if ( Yii::app()->request->isAjaxRequest )
			{	
			$model= new Rating;
			$group_id=$model->group_id= $_GET['group_id'];
			$model->rating= $_GET['val'];
			$type=$model->type= $_GET['type'];
			$model->insert();	
			
			//with this new data in the database, the values of $average and $number have changed 
			//recalculating them
				$ratings = Yii::app()->db->createCommand()
				->select('rating')
				->from('tbl_rating')
				->where("group_id='$group_id' AND type='$type'")
				->queryAll();
	
				//number of ratings (1 rating with value 0 is set by default)
				$number=count($ratings)-1;
			
				//total of all ratings
				$total=0;
				for($i=0; $i < count($ratings) ; $i++) {
				$total=$total+$ratings[$i]['rating'];
				}
			
				//value of the average rating 
				$average=0;
				if ($number==0)
					$average=0;
				else
					$average=round($total/$number,0);

			
			echo CJSON::encode( array (
                        'status'=>'success', 
                        'div'=>'Thank you for voting!',
						'info'=> '<br>&nbsp&nbsp&nbsp&nbsp'. $number . ' votes',
							  		  )
							  ); 
			}
}


	/* selfdefinded function */
	public function actionLinkView($id)
	{
		$model = $this->loadModel($id);
		$_link = Yii::app()->createAbsoluteUrl(
					"rating/set/".$id);
		$link= '<iframe src="'.$_link.'" width="180" height="90" frameborder="0"></iframe>'; 
		
		
		$this->renderpartial('linkView',array(
										'model'=>$model,
										'link'=>$link
							));
	}
	



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Rating;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rating']))
		{
			$model->attributes=$_POST['Rating'];
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

		if(isset($_POST['Rating']))
		{
			$model->attributes=$_POST['Rating'];
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
		$dataProvider=new CActiveDataProvider('Rating');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Rating('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rating']))
			$model->attributes=$_GET['Rating'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Rating the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Rating::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Rating $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rating-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

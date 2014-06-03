<?php

class ImportPartController extends Controller
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
				'actions'=>array('index','view'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ImportPart;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ImportPart']))
		{
			$model->attributes=$_POST['ImportPart'];
			if($model->save())
            {
                $this->import($model->file);
                $this->redirect(array('view','id'=>$model->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

    protected function import($file)
    {
        /*
        $delim=',';  		// Разделитель полей в CSV файле
        $enclosed='"';  	// Кавычки для содержимого полей
        $escaped='\\'; 	 	// Ставится перед специальными символами
        $lineend='\\n';
        $dir = YiiBase::getPathOfAlias(ImportPart::FILE_IMPORT_PATH);
        //$files = CFileHelper::findFiles($dir, array('level'=>0));
        $files = array( $dir . DIRECTORY_SEPARATOR . $file);

        $ignore = "IGNORE 1 LINES ";
        ini_set('max_execution_time', 0);
        foreach ($files as $file) {
            $q_import =
                "LOAD DATA INFILE '".
                $file."' INTO TABLE {{temp_import_part}} ".
                "FIELDS TERMINATED BY '".$delim."' ENCLOSED BY '".$enclosed."' ".
                "LINES TERMINATED BY '".$lineend."' ".
                $ignore;
            Yii::app()->db->createCommand($q_import)->execute();
        }
        */

        $delim=',';  		// Разделитель полей в CSV файле
        $enclosed='"';  	// Кавычки для содержимого полей
        $escaped='\\'; 	 	// Ставится перед специальными символами
        $lineend='\\n';
        $dir = YiiBase::getPathOfAlias(ImportPart::FILE_IMPORT_PATH);
        //$files = CFileHelper::findFiles($dir, array('level'=>0));
        $files = array( $dir . DIRECTORY_SEPARATOR . $file);

        $f = fopen(current($files), 'r');
        $data = fgetcsv($f,1000, $delim, $enclosed, $escaped);
        while(!feof($f)){
            $data = fgetcsv($f,1000, $delim, $enclosed, $escaped);

            $part = new TempImportPart();
            $part->category_id = $data['1'];
            $part->name = $data['2'];
            $part->description = $data['3'];
            $part->text = $data['4'];
            $part->image = $data['5'];
            $part->price = $data['6'];
            $part->is_active = $data['7'];
            $part->is_deleted = $data['8'];
            $part->car_list = $data['9'];
            $part->save();
        }

        $this->redirect(array('/admin/tempImportPart/admin'));

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

		if(isset($_POST['ImportPart']))
		{
			$model->attributes=$_POST['ImportPart'];
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
		$dataProvider=new CActiveDataProvider('ImportPart');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ImportPart('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ImportPart']))
			$model->attributes=$_GET['ImportPart'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ImportPart the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ImportPart::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ImportPart $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='import-part-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

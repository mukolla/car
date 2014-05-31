<?php

class PartController extends Controller
{
    public $layout='//layouts/column_left';

    public $menu = array(
        array(
            'label' => 'ddddddd',
            'url' => array('create'),
        ),
        array(
            'label' => 'ddddddd',
            'url' => array('create'),
        ),
        array(
            'label' => 'ddddddd',
            'url' => array('create'),
        ),
    );


    public function actionIndex()
	{
		$this->render('index');
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Part the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Part::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
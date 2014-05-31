<?php

class SearchController extends Controller
{
    public $layout='//layouts/column_left';

    public function actionIndex()
	{
		$this->render('index');
	}

    //получить автомобили для которых есть запчасти данной категории
    //сформировать для этих автомобилей меню
    public function actionFilter()
    {
        /*$menu_list = array();
        foreach ($car_list as $car) {
            $menu_list[] = array(
                'label'=>$car->name,
                'url' => Yii::app()->createUrl('/search/filter',array('category_id'=>$category_id, 'car_id'=>$car->id))
            );
        }
        $this->menu = $menu_list;*/

        $car_list = Yii::app()->getRequest()->getParam('car_list');
        $category_list = Yii::app()->getRequest()->getParam('category_list');

        $criteria = new CDbCriteria();

        //условия по автомобилям
        if($car_list !== null){
            $criteria->with = array('cars');
            $criteria->together = true;

            $criteria->addInCondition('cars.id', $car_list);
        }

        //условия по запчастям
        if($category_list !== null)
            $criteria->addInCondition('t.category_id', $category_list);

        $partProvider=new CActiveDataProvider('Part',
            array(
                'criteria' => $criteria,
                'pagination'=>array(
                    'pageSize'=>5,
                    'pageVar'=>'page',
                ),
            )
        );

        $this->render('index',
            array(
                'partProvider' => $partProvider,
            )
        );
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
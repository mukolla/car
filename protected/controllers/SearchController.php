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

        $category_id = Yii::app()->getRequest()->getParam('category_id');
        $car_id = Yii::app()->getRequest()->getParam('car_id');

        $car_list = Car::getModelCarListByCategoryId($category_id,$car_id);
        $part_list = Part::getPartListByCarId($car_id);

        $menu_list = array();
        foreach ($car_list as $car) {
            $menu_list[] = array(
                'label'=>$car->name,
                'url' => Yii::app()->createUrl('/search/filter',array('category_id'=>$category_id, 'car_id'=>$car->id))
            );
        }
        $this->menu = $menu_list;


        $criteria = new CDbCriteria();
        $criteria->with = array('cars');
        $criteria->params = array(
            ':category_id' => $category_id,
        );
        $criteria->addCondition('category_id=:category_id');

        if($car_id !== null)
            $criteria->addInCondition('t.id',$part_list);
        //$criteria->join = 'LEFT JOIN {{car}} as car ON car.id = cars_cars.car_id ';

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
                'category' => Category::model()->findByPk($category_id),
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
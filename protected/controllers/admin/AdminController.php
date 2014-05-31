<?php

class AdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    public $menu = array(
        array(
            'label' => 'Категории',
            'url' => array('admin/category/admin'),
        ),
        array(
            'label' => 'Запчасти',
            'url' => array('admin/part/admin'),
        ),
        array(
            'label' => 'Автомобили',
            'url' => array('admin/car/admin'),
        ),
    );


    public function actionIndex()
    {
        $this->render('index');
    }
}

<?php
/* @var $this CarController */
/* @var $model Car */

$this->breadcrumbs=array(
	'Автомобили'=>array('admin'),
	'Новый автомобиль',
);

$this->menu=array(
	//array('label'=>'List Car', 'url'=>array('index')),
	array('label'=>'Автомобили', 'url'=>array('admin')),
);
?>

<h1>Добавить автомобиль</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Автомобили',
);

$this->menu=array(
    array('label'=>'Автомобили', 'url'=>array('admin')),
    array('label'=>'Добавить Автомобиль', 'url'=>array('create')),
);
?>

<h1>Автомобили</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

<?php
/* @var $this CarController */
/* @var $model Car */

$this->breadcrumbs=array(
	'Автомобили'=>array('admin'),
	'Управление',
);

$this->menu=array(
	//array('label'=>'List Car', 'url'=>array('index')),
	array('label'=>'Добавить автомобиль', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#car-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление автомобилями</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'car-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'description',
		'image',
		'text',
		'fuel_type',
		/*
		'year_start',
		'year_end',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

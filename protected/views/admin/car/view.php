<?php
/* @var $this CarController */
/* @var $model Car */

$this->breadcrumbs=array(
	'Автомобили'=>array('admin'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Автомобили', 'url'=>array('admin')),
    //array('label'=>'List Car', 'url'=>array('index')),
    array('label'=>'Добавить автомобиль', 'url'=>array('create')),
    array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Автомобиль: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'image',
		'text',
		'fuel_type',
		'year_start',
		'year_end',
	),
)); ?>

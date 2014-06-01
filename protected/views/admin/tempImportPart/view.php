<?php
/* @var $this TempImportPartController */
/* @var $model TempImportPart */

$this->breadcrumbs=array(
    'Запчасти для импорта'=>array('admin'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Запчасти для импорта', 'url'=>array('admin')),
    array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр запчасти для импорта<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'name',
		'description',
		'text',
		'image',
		'price',
		'is_active',
		'is_deleted',
		'car_list',
	),
)); ?>

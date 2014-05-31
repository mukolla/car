<?php
/* @var $this PartController */
/* @var $model Part */

$this->breadcrumbs=array(
	'Запчасти'=>array('index'),
	$model->name,
);

$this->menu=array(
    array('label'=>'Запчасти', 'url'=>array('admin')),
    array('label'=>'Добавить', 'url'=>array('create')),
    array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр запчасти: <?php echo $model->name; ?></h1>

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
	),
)); ?>
